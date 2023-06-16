<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title" change>
                    @if($comments->user?->name === null)
                        Guest
                    @else
                        {{ $comments->user->name }}
                    @endif
                </h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">{{ Carbon\Carbon::parse($comments->created_at)->diffForHumans() }}</p>
            </div>
        </div>
        <p class="card-text">{{ $comments->content }}</p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#reply{{ $comments->id }}"
                aria-expanded="false" aria-controls="reply">
            Reply
        </button>
        @include('reply.create', ['id' => $comments->id])
    </div>
    @foreach ($comments->replies as $reply)
        @include('reply.reply', $reply)
    @endforeach
</div>
