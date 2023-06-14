@extends('components.app')
@section('content')
    <section class="container justify-content-center mt-3 d-flex flex-column gap-2" style="width: 50%">
        @include(' post_section', $post)
        @foreach ($post->comments as $comments)
            @include('comments', $comments)
        @endforeach
    </section>
@endsection
