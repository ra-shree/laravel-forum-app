@extends('components.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <h2 class="mt-4">Login</h2>
                <form>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    #@if(session()->has('success'))
         <div class="alert-primary">
             <p>{{ session('success') }}</p>
         </div>
    @endif
@endsection
