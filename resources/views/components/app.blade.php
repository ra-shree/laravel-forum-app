<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        @if(auth()->check() && ! request()->is('post'))
            <a href="{{ route('post.create') }}">
            <button type="submit" class="btn btn-success">Create Post</button>
            </a>
        @endif
        <form action="{{ route('home') }}" method="GET" class="form-inline my-2 my-lg-0 mx-auto d-flex gap-2">
            <input type="text"
                   class="form-control mr-sm-2"
                   name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @auth
            <div class="navbar-nav ml-auto d-flex gap-2">
                <div class="text-bg-primary">{{ auth()->user()->name }}</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>

            </div>
        @else
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="{{ route('loginForm') }}">Login</a>
            <a class="nav-link" href="{{ route('registerForm') }}">Register</a>
        </div>
        @endauth
    </div>
</nav>
<main>
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
