@extends('frontend.layouts.main')

@section('container')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Get started</h1>
                        <p class="lead">
                            Start creating the best possible user experience for you customers.
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="/regis_account" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg  @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" />
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" />
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password" />
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Register</button>
                                        <p class="mt-2">Already have an account, <a href="/login">Login</a> Now</p>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
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