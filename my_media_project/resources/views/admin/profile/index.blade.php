@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin#profile#update') }}" method="POST">
        @csrf
        <div class="card m-5">
            <div class="card-header">
                <h2 class="text-black p-2 mt-2 text-center fw-bold">User Profile</h2>
            </div>
            <div class="card-body">
                {{-- name --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Name</h6>
                        </div>
                        <div class="col-7">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter name..." value="{{ old('name', $user->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </name --}}

                {{-- email --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Email</h6>
                        </div>
                        <div class="col-7">
                            <input type="email" name="email" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter email..." value="{{ old('email', $user->email) }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </email --}}


                {{-- phone --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Phone</h6>
                        </div>
                        <div class="col-7">
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter phone-number..." value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </phone --}}

                {{-- address --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Address</h6>
                        </div>
                        <div class="col-7">
                            <textarea name="address" cols="30" rows="10" placeholder="Enter address..."
                                class="form-control @error('name') is-invalid @enderror">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </address --}}

                {{-- gender --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Gender</h6>
                        </div>
                        <div class="col-7">
                            <select name="gender"
                                class="form-select @error('gender')
                                is-invalid
                            @enderror">
                                <option value="">Choose gender</option>
                                @foreach (['male', 'female'] as $gender)
                                    <option value="{{ $gender }}" @if (old('gender', $user->gender) == $gender) selected @endif>
                                        {{ $gender }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </gender --}}


                <div class="">

                    <div class="row">
                        <div class="col-6 offset-3 my-2">
                            <input type="submit" value="Update" class="btn btn-dark ">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 offset-3 my-2">
                            <a href="{{ route('admin#profile#changePasswordPage') }}"
                                class="text-decoration-none text-primary fw-bold">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
