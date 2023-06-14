<div class="align-content-end offset-md-1 gap-2" style="width: 90%">
    <hr>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title">{{ $reply->user->name }}</h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">{{ $reply->created_at }}</p>
            </div>
        </div>
        <p class="card-text">{{ $reply->content }}</p>
    </div>
</div>
