<li class="dropdown">
    <a href="{{ $menu->url ?? '#' }}">{{ $menu->title }}</a>
    <ul>
        @foreach ($menu->subMenu as $subMenu)
            @if ($subMenu->subMenu->isNotEmpty())
                @include('layouts.menu', ['menu' => $subMenu])
            @else
                <li><a href="{{ $subMenu->url }}">{{ $subMenu->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
