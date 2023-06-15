<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title"change>
                    @if($comments->user?->name === null)
                        Guest
                    @else
                        {{ $comments->user->name }}
                    @endif
                </h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">{{ $comments->created_at }}</p>
            </div>
        </div>
        <p class="card-text">{{ $comments->content }}</p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#reply"
                aria-expanded="false" aria-controls="reply">
            Reply
        </button>
        @include('post.add_reply')
    </div>
    @foreach ($comments->replies as $reply)
        @include('post.replies', $reply)
    @endforeach
</div>
