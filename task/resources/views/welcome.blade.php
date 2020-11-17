@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
