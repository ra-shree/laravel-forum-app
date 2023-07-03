<article class="card">
    <div class="card-body">
        <h1 class="card-title">{{ $post->title }}</h1>
        <h6 class="card-subtitle text-muted text-right mt-1 mb-3">{{ $post->user->name }}</h6>
        <p class="card-text">
            {{ $post->body }}
        </p>
        <hr>
        @include('comment.create',  [ 'id' => $post->id])
    </div>
</article>
