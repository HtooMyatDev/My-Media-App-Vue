@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold text-center text-dark">Update Category</h2>
        </div>
        <div class="card-body">

            <form action="{{ route('admin#category#update') }}" method="post">
                @csrf

                <input type="hidden" name="category_id" value="{{ $category->category_id }}">
                <div class="mb-3">
                    <h5 class="fw-bold">Title:</h5>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $category->title) }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <h5 class="fw-bold">Description:</h5>
                    <input type="text" class="form-control" name="description"
                        value="{{ old('description', $category->description) }}">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-dark rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
