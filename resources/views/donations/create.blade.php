@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    <form method="POST" action="/store">
        @csrf
        <label for="donation">Donation</label><br>
        <input type="text" id="donation" name="donation"><br>
        <label for="image">Image URL</label><br>
        <input type="text" id="image_path" name="image_path"><br>
        <label for="description">Description</label><br>
        <input type="text" id="description" name="description"><br>
        <label for="image">Please select user to donate to</label><br>
        <select class="form-control" id="donated_to" name="donated_to" required >
            @foreach($users as $user)
                <option value="{{$user->id}}" name="donated_to">{{ $user->name }}</option>
            @endforeach
        </select>
        <textarea id="request_plea" name="request_plea" rows="4" cols="50">

        </textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
@endsection
