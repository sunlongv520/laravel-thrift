@extends('layouts.master')

@section('static_f')
    @parent
    <script>
        // $('input.typeahead').typeahead({
        //         ajax: '/api/auto/board',
        //         onSelect: function(item) {
        //             console.log(item.value);
        //         }
        // });

        $('#test').tagsinput({
            itemValue: 'id',
            itemText: 'name',
            typeahead: {
                displayKey: 'name',
                source: function(query) {
                    return $.get('/api/auto/board?query=' + query);
                }
            }
        });
    </script>
@stop
@section('content')
    <!-- page start-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Tags Input</h3>
        </div>

        <div class="panel-body">
                <input id="test" type="text" class="tags tagsinput">
        </div>
    </div>

@stop
