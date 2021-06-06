@extends('layouts.app')
@section('content')
    <h1>Donations for logged user</h1>
    @if($donations != null)
        @foreach($donations as $donation)
            <div class="card p-3 mt-3 mb-3">
                <h3><a href="/apply/{{$donation->id}}">{{$donation->donation}}</a></h3>
                <p>{{$donation->description}}</p><br>
                <img src="{{$donation->image_path}}" style="max-width: 300px"/>
                <p>{{$donation->resolve}}</p>
                <small>Written on {{$donation->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No donations found</p>
    @endif
@endsection
