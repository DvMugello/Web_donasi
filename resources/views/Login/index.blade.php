@extends('layouts.main')

<div class="row justify-content-center mb-md-5">
    <div class="col-md-4 mb-md-0 ">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('LoginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin w-90 m-4">
            <form action="/Login" method="post">
                @csrf

                <h1 class="h3 m-5 fw-normal text-center">Please Login</h1>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control mb-md-4 @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control mb-md-4 " id="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>
                <button class="btn btn-primary w-100 mt-md-3 mb-md-3 py-2" type="submit">Login</button>
            </form>
            <small class="d-blox text-center mb-md-4 ">Not Registered <a href="{{ route('Register.create') }}">Register Now!</a></small>
        </main>
    </div>
</div>
