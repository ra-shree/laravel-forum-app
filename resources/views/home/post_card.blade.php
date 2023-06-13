<div class="col-md-8 offset-md-2">
    <div style="cursor: pointer" class="post-card card" onclick="href={{ url('/post', $post->id) }}">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <div class="d-flex align-items-center justify-content-between">
                <span class="card-subtitle text-muted mt-1 mb-3">{{ $post->user->name }}</span>
                <span class="text-muted mt-1 mb-3">{{ $post->created_at }}</span>
            </div>
            <p class="card-text">{{ $post->excerpt }}</p>
        </div>
    </div>
</div>
