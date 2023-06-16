@extends('components.app')
@section('content')
    <section class="container justify-content-center mt-3 d-flex flex-column gap-2" style="width: 50%">
        @include('post.body', $post)
        @foreach ($post->comments as $comments)
            @include('comment.comment', $comments)
        @endforeach
    </section>
@endsection
