<section class="collapse" id="reply">
    <form action="/reply" method="POST">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="comment_id" value="{{ $id }}"/>
            <textarea class="form-control mt-2" id="reply" name="content" rows="2" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
