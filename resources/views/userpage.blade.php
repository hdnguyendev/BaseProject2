@extends('layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
@endsection


@section('root')

    <div class="mt-20">
        <div class="user-wrapper text-white">
            <div id="user" class="min-h-screen">
                @if ($data)
                    <div id="user-info" class="h-56 flex flex-col items-center justify-center"
                        style="background-image: url(asset/img/back-gr-login.jpg);">
                        <div class="user-img-wrapper rounded-full w-20 h-20 p-1 border-red-500 border-solid border-4">
                            <img src="./upload/avatars/{{ $data->client_avatar }}" alt="avatar"
                                class=" rounded-full w-full h-full">
                            <div class="change-img">
                                <span>
                                    <i class="fa-solid fa-camera"></i>
                                </span>
                            </div>
                        </div>
                        <h3>{{ $data->client_name }}</h3>
                        <h3>{{ $data->client_email }}</h3>
                        <h3 id="change-account"
                            class="border-2 border-solid border-red-600 rounded-lg p-1 hover:opacity-70 cursor-pointer">
                            Your account <span><i class="fa-solid fa-user"></i></span>
                        </h3>
                    </div>
                @endif


                <div id="user-about" class="flex flex-col lg:px-20">
                    <div class="flex flex-col text-white py-4 px-8">
                        <h3 class="text-xl md:text-2xl lg:text-4xl">Favorite Movies</h3>
                        <div id="favorite-movies" class="mt-4 md:flex md:flex-wrap">


                        </div>
                    </div>

                    <div class="flex flex-col text-white py-4 px-8">
                        <h3 class="text-xl md:text-2xl lg:text-4xl">Recently Viewed</h3>
                        <div id="recent-movies" class="mt-4 md:flex md:flex-wrap">
                            <div class="relative md:w-1/4 p-4">
                                <img src="./asset/img/back-gr-login.jpg" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">Ten phim</h1>
                                    <a href="" class="btn-primary">Play</a>
                                </div>

                            </div>

                            <div class="relative md:w-1/4 p-4">
                                <img src="./asset/img/back-gr-login.jpg" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">Ten phim</h1>
                                    <a href="" class="btn-primary">Play</a>
                                </div>

                            </div>
                            <div class="relative md:w-1/4 p-4">
                                <img src="./asset/img/back-gr-login.jpg" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">Ten phim</h1>
                                    <a href="" class="btn-primary">Play</a>
                                </div>

                            </div>
                            <div class="relative md:w-1/4 p-4">
                                <img src="./asset/img/back-gr-login.jpg" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">Ten phim</h1>
                                    <a href="" class="btn-primary">Play</a>
                                </div>

                            </div>
                            <div class="relative md:w-1/4 p-4">
                                <img src="./asset/img/back-gr-login.jpg" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">Ten phim</h1>
                                    <a href="" class="btn-primary">Play</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <form method="POST" action="{{ URL::to('/change-avatar') }}" id="change-img-form" enctype="multipart/form-data"
            class="hidden flex flex-col justify-center items-center w-screen h-screen p-4 fixed top-0 bg-black">
            @csrf
            <input type="hidden" name="client_id"value="{{ Session::get('client_id') }}">
            <div class="img-frame w-80 h-80 relative" style="background-image: url(./asset/img/back-gr-login.jpg);">
                <div class="flex h-full">
                    <h1 class="text-white text-2xl m-auto">Choose your avatar</h1>
                </div>
                <span class="absolute top-0 right-2 hidden"><i class="fa fa-close text-white"></i></span>
            </div>
            <input type="file" name="client_avatar" id="avt-file-input" class="hidden" accept="image/*" required>
            <label for="avt-file-input" class="btn-primary m-2 text-white">Select</label>
            <p class="flex">
                <label id="cancel-file-input" class="btn-primary m-2 text-white">Cancel</label>
                <input type="submit" name="" id="save-file-input" class="hidden">
                <label for="save-file-input" class="btn-primary m-2 text-white">Save</label>
            </p>
        </form>
        @if ($data)
            <form method="POST" action="{{ route('update_profile_ajax') }}" id="change-account-form"
                class="hidden text-white flex flex-col justify-center items-center w-screen h-screen p-4 fixed top-0 bg-black">
                @csrf
                <div id="message"></div>

                <div class="flex p-2 items-center mb-2">
                    <label for="username" class="w-28 block">Username: </label>
                    <input id="username" type="text" disabled
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600" name="client_username"
                        value="{{ $data->client_username }}">
                </div>
                <div class="flex p-2 items-center mb-2">
                    <label for="name" class="w-28 block">Name: </label>
                    <input id="name" type="text" required
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600" name="client_name"
                        value="{{ $data->client_name }}">
                </div>
                <div class="flex p-2 items-center mb-2">
                    <label for="useremail" class="w-28 block">Email: </label>
                    <input id="useremail" type="email" required
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600" name="client_email"
                        value="{{ $data->client_email }}">
                </div>
                <div class="flex p-2 items-center mb-2">
                    <label for="old_password" class="w-28 block">Old Password: </label>
                    <input id="old_password" type="password" required
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600" name="client_old_password">
                </div>
                <div class="flex p-2 items-center mb-2">
                    <label for="new_password" class="w-28 block">New Password: </label>
                    <input id="new_password" type="password"
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600" name="client_new_password">
                </div>
                <div class="flex p-2 items-center mb-2">
                    <label for="valid_password" class="w-28 block">Confirm New Password: </label>
                    <input id="valid_password" type="password"
                        class="bg-black p-1 text-lg border-solid border-2 border-red-600"
                        name="client_new_password_confirmation">
                </div>
                <p class="flex">
                    <label id="cancel-account-input" class="btn-primary m-2 text-white">Cancel</label>
                    <input type="submit" name="submit" id="save-account-input" class="hidden">
                    <label for="save-account-input" class="btn-primary m-2 text-white">Save</label>
                </p>
            </form>
        @endif

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="./asset/js/jschung.js"></script>
    <script src="{{ asset('asset/js/userinfo.js') }}"></script>
    <script type="text/javascript">
        $('#change-account-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('update_profile_ajax') }}",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "name": $("#name").val(),
                    "useremail": $("#useremail").val(),
                    "old_password": $("#old_password").val(),
                    "new_password": $("#new_password").val(),
                    "valid_password": $("#valid_password").val(),
                },
                success: function(data) {
                    $('#message').html(data);
                    $("#old_password").val("");
                    $("#new_password").val("");
                    $("#valid_password").val("");
                    console.log('Successful.');
                },
                error: function(data) {
                    $('#message').html('Có lỗi xảy ra!');
                    console.log('Error');
                },
            });
        });
    </script>
    <script>
        const listSlugs = [];
        @php
            foreach($favorite_data as $item){

                echo 'listSlugs.push(`'.$item->movie_name.'`);';

            }
        @endphp



        listSlugs.forEach(slug => {
                            const detailMovieURL =`https://ophim1.com/phim/${slug}`
                            fetch(detailMovieURL)
                                .then(res => res.json())
                                .then(data => {
                                    const movieInfo = data['movie']
                                        const elma =`
                                            <div class="favorite-movie relative md:w-1/4 p-4">
                                <img src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}" alt="">
                                <div class="absolute top-1/2 -translate-y-1/2 left-8">
                                    <h1 class="my-2 text-xl">${movieInfo['name']}</h1>
                                    <a href="${window.location.origin}/detail/${movieInfo['slug']}" class="btn-primary">Play</a>
                                </div>
                                <div class="hidden remove absolute top-6 right-6 items-center">
                                    <span>Remove </span> <span
                                        class="w-5 h-5 text-center text-red-600 bg-white leading-5"><i
                                            class="fa fa-close"></i></span>
                                </div>
                            </div>`
                                        $('#favorite-movies').append(elma)
                                })
                        });
    </script>
@endsection
