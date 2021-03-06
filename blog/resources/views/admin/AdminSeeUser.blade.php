@extends('admin.AdminHome')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="image">
                <img src="{{ asset('images/user.png') }}" alt="" style="with:60px; height:60px" class="img-circle">
            </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0">{{ $username->username }}</h4>
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="articles">პოსტები</span> <span class="number1">{{ $PostAmount }}</span> </div>
                    <div class="d-flex flex-column"> <span class="followers">კომენტარები</span> <span class="number2">{{ $CommentAmount }}</span> </div>
                </div>
            </div>
            <h1 class="card-header" style="text-align:center">პოსტები</h1>
            @foreach($news as $new)
            <div class="container">
                <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{ asset('images'."/".$new->image) }}" alt="" style="with:100px; height:80px" class="img-circle">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-header">
                        <a href="{{ route('AdminShowNews', ['id'=>$new->id]) }}" class="btn btn-secondary btn-lg btn-block"><h5 class="card-title" style="background-color="grey">{{ $new->title }}</h5></a>
                        <form action="{{ route('AdminDeleteAprovedPost') }}" method="post">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $new->id }}">
                            <button class="btn btn-danger btn-lg btn-block"><h5 class="card-title" style="background-color="grey">წაშლა</h5></button>
                        </form>
                        </div>
                        <a href="{{ route('AdminSeeUser',['id' => $new->user_id]) }}">ავტორი {{ $new->username }}</a>
                        <p class="card-text"> {{ $new->short_description }} </p>
                        <p class="card-text"><small class="text-muted"> {{ $new->created_at }} </small></p>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <hr/>
            @endforeach
            <div class="container">
                {{ $news->appends(["comments"=>$comments->currentPage()])->links() }}
            </div>
        </div>
    </div>
</div>
<div class="container">
@foreach($comments as $comment)
            <div class="media">
                <div class="media-left">
                    <img src="{{ asset('images/user.png') }}" alt="" style="with:60px; height:60px" class="img-circle">
                </div>
                <div class="media-body">
                <h4 class="media-heading">{{ $comment->username }}</h4>
                <p>{{ $comment->comment }}</p>
            </div>
            </div>
            @endforeach
            <div class="container">
                {{ $comments->appends(["news"=>$news->currentPage()])->links() }}
            </div>
</div>
@endsection