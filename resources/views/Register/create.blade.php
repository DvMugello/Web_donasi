@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration-100 m-5">
                <form method="POST" action="/Register" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Registered</h1>

                    <div class="form-floating">
                        <input type="text"name="name"
                            class="form-control mb-md-1 @error('name')is-invalid
                    @enderror" id="name"
                            placeholder="Name" required autofocus value="{{ old('name') }}">
                    <label for="name">Name</label>

                    </div>
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control mb-md-1 @error('email')is-invalid
                    @enderror " id="email"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="numeric"name="phone"
                            class="form-control mb-md-1 @error('phone')is-invalid
                    @enderror" id="phone"
                            placeholder="No Telepon" required value="{{ old('phone') }}">
                        <label for="phone">No Telepon</label>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control mb-md-1 @error('password')is-invalid
                    @enderror" id="password"
                            placeholder="Password" required value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-1 mt-3 " type="submit">Register</button>
                </form>
                <small class="d-blox text-center mt-3">Already registered <a href="/Login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
