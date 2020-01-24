@extends ('app')

@section ('content')

      <ul>
          @foreach($tasks as $task)
              <div class="well">
                  <div class="row">
                      <div class="col-md-4 col-sm-4">
                          <img style="width:100%" src="/storage/cover_images/{{$task->cover_image}}">
                      </div>
                      <div class="col-md-8 col-sm-8">
                          <li><a href="/tasks/{{ $task->id }}">{{$task->title}}</a></li>
                          <br>
                          <small>in needed to do {!! $task->body !!} </small>
                      </div>
                  </div>
              </div>



          @endforeach
      </ul>

@endsection