@extends('layouts.app')

@section('content')
<form action="{{ route('UpdatePost') }}" method="POST">
@csrf
    <div class="container">
    <input type="hidden" value="{{ $posts->id }}" name="id">
        <input type="text" class="form-control mt-2" name="title" value="{{ $posts->title }}">
        <textarea name="description"  class="form-control mt-2">{{ $posts->description }}</textarea>
        <button class="btn btn-primary mt-2">განახლება</button>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
</form>
@endsection