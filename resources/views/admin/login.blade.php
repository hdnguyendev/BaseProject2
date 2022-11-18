@extends('admin.layouts.login')
@section('title')
    Login
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            {{-- <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a> --}}
                            <h1>Login with Administrator</h1>
                        </div>
                        @php
                            $message = Session::get('message');
                            if ($message) {

                                echo "<div style='color: red; text-align:center'>$message</div>";
                                Session::put('message',null);
                            }
                        @endphp
                        <div class="login-form">
                            <form action="{{ URL::to('admin/login_handle')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" required
                                        placeholder="Enter your username ...">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" required
                                        placeholder="Enter your password ... ">
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with
                                            facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> --}}
                            </form>
                            {{-- <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
