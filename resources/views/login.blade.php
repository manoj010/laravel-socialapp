@extends('layout.app')

@section('content')
    <div class="container">
        @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('fail')}}
            </div>
        @endif
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Enter email address" name="email" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                placeholder="Enter password" name="password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('signup')}}"
                                    class="link-danger">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection