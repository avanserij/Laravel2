@foreach ($categories as $category)

    @if ($category->children->count())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url("/category/$category->id") }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $category->title ?? '' }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @include('menu', ['categories' => $category->children, 'is_child' => true])

            </div>
        </li>
    @else

        @isset($is_child)
            <a class="dropdown-item" href="{{ url("/category/$category->id") }}">{{ $category->title ?? '' }}</a>

            @continue

        @endisset

        <li class="nav-item">
            <a class="nav-link disabled" href="{{ url("/category/$category->id") }}">{{ $category->title ?? '' }}</a>
        </li>

    @endif

@endforeach
