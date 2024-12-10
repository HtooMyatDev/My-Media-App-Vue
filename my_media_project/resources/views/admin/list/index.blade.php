@extends('admin.layouts.app')
@section('content')
    <div class="card mt-5">
        <form action="{{ route('admin#list') }}" method="get">
            <div class="card-header p-3">
                <h3 class="card-title fw-bold">Admin List Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" class="form-control float-right" placeholder="Search..." name="searchKey">
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->gender }}</td>
                            @if ($user->id != Auth::user()->id)
                                <td>
                                    <a href=""
                                        class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin#delete', $user->id) }}" class="btn btn-sm bg-danger text-white"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
