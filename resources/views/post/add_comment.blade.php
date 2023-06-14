<section class="collapse" id="comment">
    <h3 class="mt-4">Leave a Comment</h3>
    <form action="/comment" method="POST">
        @csrf
        <div class="mb-3">
            <label for="commentInput" class="form-label">Your Comment</label>
            <textarea class="form-control" id="commentInput" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
