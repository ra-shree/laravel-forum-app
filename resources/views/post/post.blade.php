@extends('components.app')
@section('content')
    <section class="container justify-content-center mt-3 d-flex flex-column gap-2" style="width: 50%">
        @include('post.post_section', $post)
        @include('post.add_comment')
        @foreach ($post->comments as $comments)
            @include('post.comments', $comments)
        @endforeach
    </section>
@endsection
