<div class="col-sm-2">
    <section class="panel">
        <div class="panel-body">
            <p class="btn btn-compose">
                {{$extra['sidebar']['name']}}
            </p>
            <ul class="nav nav-pills nav-stacked mail-nav">
                @foreach ($extra['sidebar']['menu'] as $item)
                <li><a href="{{$item['url']}}"><i class="fa fa-{{$item['ico']}}"></i> {{$item['name']}} </a></li>
                @endforeach
            </ul>
        </div>
    </section>
</div>