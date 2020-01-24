@foreach ($categories as $categoryItem)
    <option value="{{ $categoryItem->id ?? ''}}"
            @isset ($task->id)
                @if ($task->categories->contains('id', $categoryItem))
                    selected=""
            @endif
            @endisset

    >
        {{$delimiter  ?? ''}}{{ $categoryItem->title ?? '' }}
    </option>
        @isset($categoryItem->children)
            @include('tasks.categories', ['categories'=> $categoryItem->children,
            'delimiter' => ' - ' . $delimiter

            ])
        @endisset


@endforeach