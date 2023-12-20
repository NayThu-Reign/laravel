@extends("layouts.app")

@section("content")
    <div class="container">
        @if(session('error'))
          <div class="alert alert-warning">
            {{ session('error') }}
          </div>
        @endif

        @if(session('msg'))
          <div class="alert alert-warning">
            {{ session('msg') }}
          </div>
        @endif

        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    <b>Category:</b>
                    <span class="text-primary">
                        {{ $article->category->name }}
                    </span>,
                    {{ $article->created_at->diffForHumans() }},
                    By <b>{{ $article->user->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning">Delete</a>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url("/comments/delete/$comment->id") }}"
                        class="btn-close float-end"></a>
                    {{ $comment->content }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

        @auth
        <form action="{{ url('/comments/add')}}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
        @endauth
    </div>
@endsection
