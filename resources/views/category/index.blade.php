@extends('app')

@section('content')

<div class="container">
    <a class="btn btn-primary" href="{{route('category.create')}}">Create</a>
    <table class="table">
        <thead>
           <tr>
            <th>Наименование</th>
            <th class="text-right">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
         <tr>
             <td> {{$category->title ?? ''}}</td>
             <td class="text-right">
                 <a class="btn btn-primary" href="{{route('category.edit', $category)}}">Edit</a>
             </td>
         </tr>
          @empty

            <tr>
                <td colspan="2">
                <h1 class="text-center">no categories</h1>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>




@endsection