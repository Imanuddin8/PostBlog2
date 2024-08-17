@extends('layout.main')

@section('konten')
<div
    class="row justify-content-center align-items-center mt-3"
>
    <div class="col-11 col-lg-8 p-3 rounded" style="background: #F8F9FA">
        <h3 class="text-center mb-4">Edit your profile</h3>
        <form action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Form Inputs -->
            <div
                class="row justify-content-center align-items-center g-3 mb-3"
            >
                <div class="col-12 col-lg-6">
                    <label for="name" class="form-label fw-bold fs-5">Name :</label>
                    <input title="name" name="name" type="text" class="form-control" value="{{$user->name}}">
                </div>
                <div class="col-12 col-lg-6">
                    <label for="username" class="form-label fw-bold fs-5">Username :</label>
                    <input title="username" name="username" type="text" class="form-control" value="{{$user->username}}">
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-12 col-lg-6">
                    <label for="email" class="form-label fw-bold fs-5">Email :</label>
                    <input title="email" name="email" type="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="col-12 col-lg-6">
                    <label for="password" class="form-label fw-bold fs-5">Password :</label>
                    <input title="password" name="password" type="password" class="form-control" placeholder="Your password">
                    <small class="form-text text-muted">Leave blank to keep current password.</small>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-12 col-lg-6">
                    <label for="image" class="form-label fw-bold fs-5">Image :</label>
                    <input type="file" class="form-control mb-1" id="image" name="image">
                    @if($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="current image" style="border-radius: 50%; width: 100px; height:100px; object-fit: cover;">
                    @endif
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-lg-6">
                    <label for="description" class="form-label fw-bold fs-5">Description :</label>
                    <textarea title="deskripsi" name="deskripsi" id="deskripsi" class="form-control" rows="3">{{$user->deskripsi}}</textarea>
                    @error('deskripsi')
                        <div class="text-red mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{route('profile.index', auth()->user()->id)}}" class="btn btn-secondary px-5 me-2">
                    <span>Cencel</span>
                </a>
                <button type="submit" class="btn btn-warning px-5">
                    <span>Edit</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
