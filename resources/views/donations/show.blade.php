@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>
    <h1>{{$donation->donation}}</h1>
    <img style="max-width:300px" src="{{$donation->image_path}}">
    <br><br>
    <div>
        {!!$donation->description!!}
    </div>
    <hr>
    <small>Written on {{$donation->created_at}} by user with {{$donation->user_id}} ID</small>
    <hr>
    <p>Resolved: {{$donation->resolve}}</p>
    @if($donation->resolve == 0)
     <form method="post" action="/updateResolved/{{ $donation->id }}">
         @csrf
        <textarea id="request_plea" name="request_plea" rows="4" cols="50" required>

        </textarea> <br>
         <input type="submit" value="Submit">
     </form>
    @endif
    <hr>
{{--    @if(!Auth::guest())--}}
{{--        @if(Auth::user()->id == $donation->user_id)--}}
{{--            <a href="/posts/{{$donation->id}}/edit" class="btn btn-default">Edit</a>--}}

{{--            {!!Form::open(['action' => ['PostsController@destroy', $donation->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
{{--            {{Form::hidden('_method', 'DELETE')}}--}}
{{--            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
{{--            {!!Form::close()!!}--}}
{{--        @endif--}}
{{--    @endif--}}
@endsection
