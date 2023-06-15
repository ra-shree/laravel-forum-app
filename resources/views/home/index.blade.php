@extends('components.app')
@section('content')
    <div class="container p-3" style="width: 70%">
        <div class="row gap-3">
            @foreach ($posts as $post)
                @include('home.post_card', $post)
            @endforeach
        </div>
{{--        <br>--}}
        <footer class="container d-flex justify-content-center pt-2">
            {{ $posts->links() }}
        </footer>
    </div>
@endsection
