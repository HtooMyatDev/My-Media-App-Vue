@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin#profile#changePassword') }}" method="POST">
        @csrf

        <div class="card m-5">
            <div class="card-header">
                <h2 class="text-black p-2 mt-2 text-center fw-bold">Change Password</h2>
            </div>
            <div class="card-body">
                {{-- Old Password --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Old Password</h6>
                        </div>
                        <div class="col-7">
                            <input type="password" name="oldPassword"
                                class="form-control @error('oldPassword') is-invalid @enderror"
                                placeholder="Enter old password...">
                            @error('oldPassword')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </old password --}}

                {{-- New Password --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">New Password</h6>
                        </div>
                        <div class="col-7">
                            <input type="password" name="newPassword"
                                class="form-control @error('newPassword') is-invalid @enderror"
                                placeholder="Enter new password...">
                            @error('newPassword')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </new password --}}


                {{-- Confirm Password --}}
                <div class="">
                    <div class="d-flex align-items-center my-3">
                        <div class="col-3 mt-2">
                            <h6 class="fw-bold">Confirm Password</h6>
                        </div>
                        <div class="col-7">
                            <input type="password" name="confirmPassword"
                                class="form-control @error('confirmPassword') is-invalid @enderror"
                                placeholder="Enter confirm password...">
                            @error('confirmPassword')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- </confirm password --}}

                <div class="">

                    <div class="row">
                        <div class="col-6 offset-3 my-2">
                            <input type="submit" value="Change" class="btn btn-dark ">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
