@extends('frontend.layouts.main')

@section('container')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                @if(session()->has('danger'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('danger')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <img src="{{ asset('frontend/no-image-available.png') }}" alt="default" class="img-fluid" style="border-radius: 25%" width="132" height="132" />
                                </div>
                                <form action="/logincheck" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" />
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" />
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button> 
                                        <p class="mt-2">Don't have an account, <a href="/register">Register</a> Now</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection