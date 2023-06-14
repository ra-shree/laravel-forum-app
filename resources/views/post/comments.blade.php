<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title">{{ $comments->user->name }}</h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">{{ $comments->created_at }}</p>
            </div>
        </div>
        <p class="card-text">{{ $comments->content }}</p>
        <a href="#" class="card-link text-muted reply-link">Reply</a>
    </div>
    @foreach ($comments->replies as $reply)
        @include('post.replies', $reply)
    @endforeach
</div>

