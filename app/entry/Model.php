<?php namespace Entry;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    protected static $revisionAble = false;
    protected static $revisionAttributes = ['*'];

    public static function boot()
    {
        parent::boot();

        # Model 变动日志记录
        if (static::$revisionAble) {
            static::created(function ($obj) {
//                $obj->revisionRecord();
            });
            static::updating(function ($obj) {
                $obj->revisionRecord();
            });
        }
    }

    /*
     * 支持 a.b 格式获取属性
     */
    public function getRelationValue($key)
    {
        $keys = explode('.', $key);
        $ret = $this;
        foreach ($keys as $key) {
            if ($ret == null) {
                return $ret;
            }
            if (is_array($ret)) {
                $ret = array_get($ret, $key, []);
                continue;
            }
            if ($ret->relationLoaded($key)) {
                $ret = $ret->relations[$key];
                continue;
            }

            if (method_exists($ret, $key)) {
                $ret = $ret->getRelationshipFromMethod($key);
                continue;
            }

            $ret = $ret->getAttributeValue($key);
        }

        return $ret;
    }

    /*
     * 日志记录
     */
    protected function revisionRecord()
    {
        try {
            $user = auth()->user();
            $table = $this->getTable();
            $index = $this->getAttribute($this->getKeyName());
            $data = $this->getRevisionAttributes($this->getDirtyRaw());
            $dirty = $this->getRevisionAttributes($this->getDirty());

            if (!$dirty) {
                return false;
            }
            DB::table('revision')->insert([
                'table' => $table,
                'index' => $index,
                'data' => json_encode($data),
                'dirty' => json_encode($dirty),
                'username' => $user ? $user->username : 'artisan',
            ]);
        } catch (\Exception $e) {
            Log::warning('revision error '. $e);
        }
    }

    /*
     * 返回变动前原始值
     */
    protected function getDirtyRaw()
    {
        $raw = [];

        foreach ($this->attributes as $key => $value) {
            if (! array_key_exists($key, $this->original)) {
                $raw[$key] = '';
            } elseif ($value !== $this->original[$key] &&
                ! $this->originalIsNumericallyEquivalent($key)) {
                $raw[$key] = $this->original[$key];
            }
        }

        return $raw;
    }

    protected function getRevisionAttributes($data)
    {
        if (static::$revisionAttributes == ['*']) {
            return $data;
        }

        return array_only($data, static::$revisionAttributes);
    }
}
