@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin#post#edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="postID" value="{{ $post->post_id }}">
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card mt-3">
                    <div class="card-header bg-black"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('posts/' . $post->image) }}"
                                    style="width:250px; height:250px; object-fit: cover" class="img-thumbnail mb-3"
                                    id="output">
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <h6 class="fw-bold">
                                        Title
                                    </h6>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $post->title) }}" placeholder="Enter title...">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold">
                                        Description
                                    </h6>
                                    <input type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        value="{{ old('description', $post->description) }}"
                                        placeholder="Enter description...">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold">Category</h6>
                                    <select name="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                @if ($category->id == $post->category_id) selected @endif>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-dark">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
