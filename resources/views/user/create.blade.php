@extends('layouts.admin')

@section('head')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <form action="{{ url('/user/store') }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="mb-0">User / Add</h2>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                    <a class="btn btn-secondary show-loader" href="{{ url('/admin/') }}"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                </div>
                <div class="col-12">
                    <div class="bg-white rounded mt-4">
                        <h4></h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date Of birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Dob" value="{{ old('dob') }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-select" required>
                                        <option value="male" {{ (old('gender') === '1') ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ (old('gender') === '0') ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="" value="" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="" value="" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @parent
@endsection

