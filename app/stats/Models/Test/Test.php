<?php
namespace  Stats\Models\Test;
use Entry\Model as BaseModel;
use Entry\User;
class Test extends BaseModel{
    protected $table = 'test';
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}