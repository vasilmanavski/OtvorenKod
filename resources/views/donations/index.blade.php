@extends('layouts.app')
@section('content')
<h1>Donations</h1>
<a href="/create">Create new</a> <br>
<a href="/donations">Donations for logged in user</a>
@if($donations != null)
    @foreach($donations as $donation)
        <div class="card p-3 mt-3 mb-3">
            <h3><a href="/apply/{{$donation->id}}">{{$donation->donation}}</a></h3>
            <p>{{$donation->description}}</p><br>
            <img src="{{$donation->image_path}}" style="max-width: 300px"/>
            <small>Written on {{$donation->created_at}}</small>
        </div>
    @endforeach
    {{$donations->links()}}
@else
    <p>No donations found</p>
@endif
@endsection
