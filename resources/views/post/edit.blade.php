@extends('layout.main')

@section('konten')
<div
    class="row justify-content-center align-items-center mt-3"
>
    <div class="col-11 col-lg-7 rounded p-4" style="background: #F8F9FA">
        <form action="{{route('komen.update', $komen->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="caption" class="form-label fw-bold fs-5">Comment :</label>
                <input type="text" class="form-control" value="{{$komen->komen}}" name="komen">
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{route('komen.index',['id' => $komen->post_id])}}" class="btn btn-secondary px-5 me-2">
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

{{-- @extends('layout.main')

@section('konten')
<div class="row justify-content-center align-items-center">
    <div class="col-11 col-lg-7 rounded p-4" style="background: #F8F9FA">
        <form action="{{ route('komen.update', $komen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="komen" class="form-label fw-bold fs-5">Comment:</label>
                <input value="{{ $komen->komen }}" type="text" name="komen" class="form-control" id="komen">
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('komen.index', ['id' => $komen->post_id]) }}" class="btn btn-secondary px-5 me-2">
                    <span>Cancel</span>
                </a>
                <button type="submit" class="btn btn-warning px-5">
                    <span>Edit</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection --}}
