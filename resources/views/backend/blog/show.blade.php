@section('content')
    <h1>{{ $post->title }}</h1>

    <p>Author: {{ $post->author->name }}</p>
    <p>{{ $post->content }}</p>
    <p>Published Date: {{ $post->published_date }}</p>

    <div>
        Likes: {{ $post->likes_count }}
        Dislikes: {{ $post->dislikes_count }}
    </div>

    <div>
        Comments:
        @foreach ($post->comments as $comment)
            <div>
                {{ $comment->content }}
                Likes: {{ $comment->likes_count }}
                Dislikes: {{ $comment->dislikes_count }}
            </div>
        @endforeach
    </div>

    <a href="{{ route('blog.index') }}">Back to Blog</a>
@endsection