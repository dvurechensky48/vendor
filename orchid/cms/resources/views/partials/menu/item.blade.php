@foreach($menu as $item)
    <li class="dd-item dd3-item"
        @foreach($item->getAttributes() as $name => $value)
        data-{{$name}}="{{$value}}"
            @endforeach
    >
        <div class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content">{{$item->label}}</div>
        <div class="edit"></div>
        @if($item->children->count() > 0)
            <ol class="dd-list">
                @include('dashboard::partials.menu.item',[
                'menu' => $item->children
                ])
            </ol>
        @endif
    </li>
@endforeach
