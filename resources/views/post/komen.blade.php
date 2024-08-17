@extends('layout.main')

@section('konten')
<div
        class="row justify-content-center align-items-center mt-3"
    >
            <div class="col-11 col-lg-7 rounded p-4" style="background: #F8F9FA">
                <div class="d-flex justify-content-start align-items-center mb-3">
                    <a href="{{route('profile.indexSinggah', $post->user->id)}}" class="d-flex align-items-center text-decoration-none">
                        <div class="me-2">
                            <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : asset('dist/img/anonim.jpg')}}" alt="" style="border-radius: 50%; width: 50px; height:50px; object-fit: cover;">
                        </div>
                        <div>
                            <span class="text-black">{{$post->user->username}}</span>
                        </div>
                    </a>
                </div>
                <div class="mb-3">
                    @if ($post->image)
                        <img src="{{Storage::url($post->image)}}" alt="" style="width: 100%; height: 50%; object-fit:cover;">
                    @endif
                </div>
                <div class="mb-3">
                    <span class="text-break formatted-text">{{$post->caption}}</span>
                </div>
                <div class="text-secondary">
                    <span>{{formatDate($post->tanggal)}}</span>
                </div>
            </div>
    </div>
<div
    class="row justify-content-center align-items-center mt-3"
>
    <div class="col-11 col-lg-7 rounded p-4" style="background: #F8F9FA">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="fs-4 fw-semibold">Comments</h1>
            <a href="{{route('post.index')}}">
                <i class="fa-solid fa-xmark text-danger fs-5"></i>
            </a>
        </div>
        <div class="mb-2">
            <form action="{{route('komen.create', $post->id)}}" method="POST">
                @csrf
                <div class="d-flex">
                    <input name="komen" type="text" class="form-control me-2" placeholder="Write your comment">
                    <button class="btn btn-secondary">
                        <i class="fa-regular fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
        @forelse ($komen as $row )
            <div class="mt-3">
                <div class="d-flex justify-content-start align-items-center mb-2">
                    <div class="me-2">
                        <img src="{{ $row->user->image ? asset('storage/' . $row->user->image) : asset('dist/img/anonim.jpg')}}" alt="" style="border-radius: 50%; width: 50px; height:50px; object-fit: cover;">
                    </div>
                    <div>
                        <span>{{$row->user->username}}</span>
                    </div>
                    @if (is_object($row) && $row->user_id == auth()->user()->id)
                        <div class="dropdown ms-auto">
                            <button class="btn dropdown-toggle no-arrow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-exclamation me-2 p-1"></i>
                                        <span>Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('komen.edit', $row->id) }}" class="dropdown-item">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>
                                        <span>Edit</span>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('komen.delete', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa-solid fa-trash me-2"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div>
                    <span class="tetx-break formatted-text">{{$row->komen}}</span>
                </div>
                <div class="mt-2">
                    <span class="text-secondary">{{formatDate($row->tanggal)}}</span>
                </div>
            </div>
        @empty
            <div class="text-center mt-3">
                <span class="text-secondary">No Comments</span>
            </div>
        @endforelse
    </div>
</div>


@endsection
