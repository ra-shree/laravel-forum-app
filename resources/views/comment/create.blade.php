<section class="collapse" id="comment">
    <h3 class="mt-4">Leave a Comment</h3>
    <form action="{{ route('comment.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="post_id" value="{{ $id }}"/>
            <label for="commentInput" class="form-label">Your Comment</label>
            <textarea class="form-control" id="commentInput" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
