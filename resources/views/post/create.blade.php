@extends('components.app')
@section('content')
    <div class="container justify-content-center al mt-3 d-flex flex-column gap-2" style="width: 40%">
    <h2 class="text">Create a Post</h2>
    <form action="{{ route('post.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titleInput" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="titleInput" required>
        </div>
        <div class="mb-3">
            <label for="titleInput" class="form-label">Excerpt</label>
            <input type="text" class="form-control" name="excerpt" id="titleInput" required>
        </div>
        <div class="mb-3">
            <label for="messageInput" class="form-label">Content</label>
            <textarea class="form-control" id="messageInput" name="body" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
