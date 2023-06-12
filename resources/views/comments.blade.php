<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="card-title">aarya</h6>
            </div>
            <div class="col-4">
                <p class="card-subtitle text-muted">June 15, 2023 10:30 AM</p>
            </div>
        </div>
        <p class="card-text">Some main comment</p>
        <a href="#" class="card-link text-muted reply-link">Reply</a>
    </div>
    @for ($i = 0; $i < 3; $i++)
        @include('replies')
    @endfor
</div>

