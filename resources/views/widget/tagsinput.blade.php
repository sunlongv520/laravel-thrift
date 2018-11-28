$(document).ready(function(){
       $('input[name="{{$name}}"]').tagsinput({
            itemValue: 'id',
            itemText: 'name',
            typeahead: {
                displayKey: 'name',
                source: function(query) {
                    return $.get('/api/auto/{{$model}}?query=' + query);
                }
            }
        });
        @foreach(is_array($values) ? $values : $values() as $value)
            $('input[name="{{$name}}"]').tagsinput('add', {'id': '{{$value['id']}}', 'name': '{{$value['name']}}'});
        @endforeach
});