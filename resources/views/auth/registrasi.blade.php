@extends('auth.main')

@section('title', 'Login')

@section('konten')
<div style="min-height: 100vh; display:flex; justify-content:center; align-items:center">
    <form action="{{route('auth.signup')}}" method="POST">
        @csrf
        <div>
            <div
                class="row justify-content-center align-items-center"
            >
                <div class="col-11 col-lg-9 rounded p-5" style="background: #F8F9FA">
                    <div
                        class="row justify-content-between align-items-center g-2"
                    >
                        <div class="col-12 col-lg-6">
                            <h1>Post Blog</h1>
                            <p class="fs-4">Share your story to the world</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div
                                class="row justify-content-center align-items-center g-3"
                            >
                                <div class="col-12 col-lg-9 text-center">
                                    <div class="d-flex align-items-center">
                                        <span class="me-auto fw-bold fs-2">Login</span>
                                        <a href="{{url('/')}}">
                                            <i class="fa-solid fa-xmark fs-4 text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Name</label>
                                    <input value="{{old('name')}}" type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Username</label>
                                    <input value="{{old('username')}}" type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                                    @error('username')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Email</label>
                                    <input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Confirm Password </label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-9 d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                                <div class="col-12 col-lg-9 d-grid">
                                    <p class="fw-bold">Already have an account</p>
                                    <a href="{{route('auth.index')}}" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

