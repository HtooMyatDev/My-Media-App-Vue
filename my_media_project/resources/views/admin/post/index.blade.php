@extends('admin.layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin#post#create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <h5 class="fw-bold">
                                Title
                            </h5>
                            <input type="text"
                                class="form-control @error('title')
                                is-invalid
                            @enderror"
                                placeholder="Enter title..." name="title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <h5 class="fw-bold">
                                Description
                            </h5>
                            <textarea name="description" cols="30" rows="10"
                                class="form-control @error('description')
                                is-invalid
                            @enderror"
                                placeholder="Enter description..."></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <h5 class="fw-bold">
                                Image
                            </h5>
                            <input type="file"
                                class="form-control @error('image')
                                is-invalid
                            @enderror"
                                name="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <h5 class="fw-bold">
                                Category
                            </h5>
                            <select name="category_id"
                                class="form-select @error('category_id')
                                is-invalidd
                            @enderror">
                                <option value="">Choose Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Post ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->post_id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <img src="{{ asset('posts/' . $post->image) }}" class="img-thumbnail"
                                                style="height: 65px; width: 65px; object-fit: cover">
                                        </td>
                                        <td>
                                            <form action="{{ route('admin#post#delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="postID" value="{{ $post->post_id }}">
                                                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="{{ route('admin#post#editPage', $post->post_id) }}"
                                                    class="btn mx-1 btn-dark">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
