<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/tailwind.css')
</head>

<body>
    <!-- <div class="loader-wrapper">
        <div  class="loader bg-color-main">
            <img src="./asset/img/loader.gif" alt="" class="w-96">
        </div>
    </div> -->
    <div class="wrapper w-screen h-screen flex justify-center items-center bg-center"
        style="background-image: url(./asset/img/back-gr-login.jpg);">
        <div class="flex flex-col items-start px-20 py-10 bg-gradient-to-b from-neutral-800 to-black text-white w-2/5">
            <div class="w-full flex">
                <a href="" class="m-auto pb-5">
                    <img src="./asset/img/logo.png" alt="">
                </a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ URL::to('/register') }}" method="POST" class="flex flex-col w-full pb-4">
                {{ csrf_field() }}
                <label class="text-xl py-4" for="account-input">Full name</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="text" name="client_name" value="{{ old('client_name') }}">
                <label class="text-xl py-4" for="account-input">Email Address</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="text" name="client_email" value="{{ old('client_email') }}">
                <label class="text-xl py-4" for="account-input">Username</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="text" name="client_username" value="{{ old('client_username') }}">
                <label class="text-xl py-4" for="password-input">Password</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="password" name="client_password">
                <label class="text-xl py-4" for="valid-password-input" >Confirm Password</label>
                <input class="h-10 text-lg py-2 px-3 mb-2 text-gray-700" type="password" name="client_password_confirmation">
                <p class="py-4 text-lg flex items-center">
                    <input class="w-5 h-5 mr-2" type="checkbox" name="agree-box">
                    <label>Agree with our policy?</label>
                </p>
                <!-- <p class="text-red-600 pb-2">* you must agree with our <a href="" class="font-semibold text-white">policy</a>!</p> -->
                <button type="submit" class="btn-primary" style="width: 100%; max-width:100%">Register</button>
            </form>
            <p class="flex justify-between w-full"><span>Having account already?</span><a href="{{ URL::to('/login') }}"
                    class="text-red-600 text-xl">Login</a> </p>
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        // $(window).on('load',()=>{
        //     $('.loader').fadeOut(8000);
        //     setTimeout(() => {

        //         $('.loader-wrapper').hide();
        //     }, 8000);
        // })
    </script>
</body>

</html>
