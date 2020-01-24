@extends ('app')

@section ('content')

     <h1> {{$task->title}} </h1>
     <hr>
     <div class ="row">
     <div class="categories">
          @foreach ($task->categories as $category)
          <span class="label label-default"> {{ $category->title}} </span>
          @endforeach
     </div>
     </div>
     
     <img style="width:100%" src="/storage/cover_images/{{$task->cover_image}}">
     <hr>


     @if(!Auth::guest())
               <a href="/tasks/{{$task->id}}/edit" class="btn btn-default">Edit</a>

               {!!Form::open(['action' => ['TaskController@destroy', $task->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
               {{Form::hidden('_method', 'DELETE')}}
               {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
               {!!Form::close()!!}
     @endif

@endsection

