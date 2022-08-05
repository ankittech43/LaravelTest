@extends('layouts.auth')

@section('head')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-4 col-md-4 mt-5">

                <div class="bg-white rounded p-5 mt-5">
                    <h2>Log in</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/authenticate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address <span
                                    class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="name@example.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="**********" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                            <a href="{{url('user/create')}}">Register Hear</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection


