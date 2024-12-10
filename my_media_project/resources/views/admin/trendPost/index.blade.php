@extends('admin.layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Post ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">View Count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->post_id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <img src="{{ asset('posts/' . $post->image) }}" class="img-thumbnail"
                                                style="height: 65px; width: 65px; object-fit: cover">
                                        </td>
                                        <td><i class="fa-solid fa-eye mx-1"></i>{{ $post->post_view }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
