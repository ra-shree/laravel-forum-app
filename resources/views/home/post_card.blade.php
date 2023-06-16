<style>
    a {
        text-decoration: none;
        color: inherit;
    }
</style>

<div class="col-md-8 offset-md-2">
    <a href="{{ route('post.show', ['id' => $post->id]) }}">
        <div style="cursor: pointer" class="post-card card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="card-subtitle text-muted mt-1 mb-3">{{ $post->user->name }}</span>
                    <span class="text-muted mt-1 mb-3">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                </div>
                <p class="card-text">{{ $post->excerpt }}</p>
            </div>
        </div>
    </a>
</div>
