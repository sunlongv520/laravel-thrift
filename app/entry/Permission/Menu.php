<?php

namespace Entry\Permission;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Collective\Html\HtmlFacade;


class Menu
{
    protected $items;
    protected $current;
    protected $currentKey;

    public function __construct()
    {
        $this->current = Request::path();
        $key = explode('/', trim($this->current, '/'));
        $this->currentKey = $key ? $key[0] : 'dashboard';

        $this->items = collect();
    }

    /*
     * 创建父分类
     */
    public function create($key, $attributes)
    {
        if ($this->items->where('key', $key)->first()) {
            // exist
        } else {
            $this->items->put($key, array_merge([
                'sort' => 10,
                'icon' => '',
                'children' => collect()
            ], $attributes));
        }
    }

    /*
     * 添加子菜单
     */
    public function add($key, $attributes)
    {
        list($key, $key2) = explode('.', $key);

        $item = array_merge([
            'params' => [],
            'sort' => 10,
            'icon' => 'fa-table'
        ], $attributes);
        $this->items[$key]['children']->put($key2, $item);
    }

    public function render($template='')
    {
        $user= auth()->user();

        $items = [];
        foreach ($this->items->sortByDesc('sort') as $key => $menu) {
            $menu['group'] = $key;
            foreach ($menu['children'] as $key => &$value) {
                if ($user  && !$user->is_super && !$user->userHasPermission($value['action'])) {
                    $menu['children']->forget($key);
                }
            }
            $items[] = $menu;
        }
        $html = View::make($template ? $template : 'menu', [
            'items' => $items
        ])->render();
        return $html;
    }

}
