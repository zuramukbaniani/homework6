@extends('layouts.app')

@section('content')
<form action="{{ route('SavaToDatabase') }}" method="POST">
@csrf
    <div class="container">
        <input type="text" class="form-control mt-2" name="title">
        <textarea name="description"  class="form-control mt-2"></textarea>
        <button class="btn btn-primary mt-2">დამატება</button>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
</form>
@endsection