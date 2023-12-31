<div class="align-content-end offset-md-1 gap-2" style="width: 90%">
    <hr>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title">
                    @if($reply->user?->name === null)
                        Guest
                    @else
                        {{ $reply->user->name }}
                    @endif
                </h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">{{ Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</p>
            </div>
        </div>
        <p class="card-text">{{ $reply->content }}</p>
    </div>
</div>
