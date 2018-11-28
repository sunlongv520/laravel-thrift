@extends('layouts.master')
@section('static_f')
    @include('snippet.js_update_field')
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ $item->name  }} 权限设置
                    <span class="tools pull-right">
                        <a tyle="button" class="btn btn-danger btn-sm" onclick="save()">保存</a>
                     </span>
                </header>
                <div class="panel-body">
                    <?php $prefix = 'admin'; ?>
                    <ul class="list-unstyled row">
                        @foreach($permissions as $permission)
                            <?php $_prefix = explode('.', $permission->name)[0]; if ($prefix !== $_prefix) {  print "<div class='clearfix'></div><hr/>"; }  $prefix =  $_prefix; ?>
                            <li class="col-md-4"><input type="checkbox" data-id="{{ $permission->id }}" {{ $permission->checked ? 'checked': '' }}>{{ $permission->verbose  }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>

    <script>
        function save()
        {
            var ids = $( "input:checked").map(function(){
                return parseInt($(this).data('id'));
            }).get();
            updateData('{{ route('admin.group.update', ['id' => $item->id]) }}', {'ids': ids}, 'put');
        }
    </script>
@stop
