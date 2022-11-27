<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/tailwind.css')
    <title>Login</title>
</head>

<body>
    {{-- <div class="loader-wrapper">
        <div  class="loader bg-color-main">
            <img src="./asset/img/loader.gif" alt="" class="w-96">
        </div>
    </div> --}}
    <div class="wrapper w-screen h-screen flex justify-center items-center bg-center"
        style="background-image: url(./asset/img/back-gr-login.jpg);">
        <div class="flex flex-col items-start px-20 py-10 bg-gradient-to-b from-neutral-800 to-black text-white w-2/5">
            <div class="w-full flex">
                <a href="" class="m-auto pb-5">
                    <img src="./asset/img/logo.png" alt="">
                </a>
            </div>
            @if (Session::get('message'))
                <div style="color: red">{{ Session::get('message') }}</div>
            @endif

            <form action="{{ URL::to('/check-login') }}" class="flex flex-col w-full pb-4" method="POST">
                {{ csrf_field() }}
                <label class="text-xl py-4" for="account-input">Username or Email Address</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="text" name="client_account" required value="{{ old('client_account') }}"
                    id="account-input">
                <label class="text-xl py-4" for="password-input">Password</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="password" name="client_password" required
                    id="password-input">
                <p class="py-4 text-lg flex items-center">
                    <input class="w-5 h-5 mr-2" type="checkbox" name="remember-box" id="remember-box">
                    <label for="remember-box">Remember Me</label>
                </p>
                <button type="submit" class="btn-primary" style="width: 100%; max-width:100%">Login</button>
            </form>
            <p><a href="{{ URL::to('/register') }}" class="text-red-600 text-xl">Register</a> | <a href="">Lost your password?</a>
            </p>
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        $(window).on('load', () => {
            $('.loader').fadeOut(8000);
            setTimeout(() => {

                $('.loader-wrapper').hide();
            }, 8000);
        })
    </script>
</body>

</html>
