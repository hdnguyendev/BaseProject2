@extends('layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

@endsection
@section('title')
    <?php
    $title = '';
    $str = str_replace('-', ' ', $id);
    $arr = explode(' ', $str);
    for ($i = 0; $i < sizeof($arr); $i++) {
        $title = $title . ' ' . ucfirst($arr[$i]);
    }
    trim($title);
    echo "<title>$title</title>";
    ?>

@section('title')
@section('root')
    <div class="w-1/3"></div>
    <div id="movie">

    </div>

    <!-- review and rate -->
    <div class="show-rating text-white">
        <div class="show-rating-total">
            <h4>Điểm đánh giá trung bình</h4>
            <p>{{ $rating_statistic == NULL ? '0' : $rating_statistic->rating_avg }}/5</p>
            <div class="show-rating-stars">
                <p class="stars-backgound">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <!-- cho ti le vo moi witdh -->
                <div class="stars-rating" style="width: {{ $rating_statistic== NULL ? 0 : ($rating_statistic->rating_avg / 5) * 100 }}%;">
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>

                </div>
                </p>
            </div>
            <span>{{ $rating_statistic == NULL ? 0 : $rating_statistic->total_rating  }} đánh giá</span>
        </div>
        <div class="show-rating-ratio">
            <div class="show-rating-ratio-group">
                <span>5 sao</span>
                <p>
                <div class="ratio-bar">
                    <div class="ratio-bar-process"
                        style="width: {{  $rating_statistic == NULL ? 0 : ($rating_statistic->rating_5 / $rating_statistic->total_rating) * 100 }}%;"></div>
                </div>
                </p>{{$rating_statistic == NULL ? 0 : $rating_statistic->rating_5   }}<span>Đánh giá</span>
            </div>
            <div class="show-rating-ratio-group">
                <span>4 sao</span>
                <p>
                <div class="ratio-bar">
                    <div class="ratio-bar-process"
                        style="width: {{ $rating_statistic == NULL ? 0 : ($rating_statistic->rating_4 / $rating_statistic->total_rating) * 100 }}%;"></div>
                </div>
                </p>{{ $rating_statistic == NULL ? 0 : $rating_statistic->rating_4   }}<span>Đánh giá</span>
            </div>
            <div class="show-rating-ratio-group">
                <span>3 sao</span>
                <p>
                <div class="ratio-bar">
                    <div class="ratio-bar-process"
                        style="width: {{ $rating_statistic == NULL ? 0 : ($rating_statistic->rating_3 / $rating_statistic->total_rating) * 100 }}%;"></div>
                </div>
                </p>{{ $rating_statistic == NULL ? 0 : $rating_statistic->rating_3   }}<span>Đánh giá</span>
            </div>
            <div class="show-rating-ratio-group">
                <span>2 sao</span>
                <p>
                <div class="ratio-bar">
                    <div class="ratio-bar-process"
                        style="width: {{ $rating_statistic == NULL ? 0 : ($rating_statistic->rating_2 / $rating_statistic->total_rating) * 100 }}%;"></div>
                </div>
                </p>{{ $rating_statistic == NULL ? 0 : $rating_statistic->rating_2     }}<span>Đánh giá</span>
            </div>
            <div class="show-rating-ratio-group">
                <span>1 sao</span>
                <p>
                <div class="ratio-bar">
                    <div class="ratio-bar-process"
                        style="width: {{ $rating_statistic == NULL ? 0 :($rating_statistic->rating_1 / $rating_statistic->total_rating) * 100 }}%;"></div>
                </div>
                </p>{{ $rating_statistic == NULL ? 0 : $rating_statistic->rating_1   }}<span>Đánh giá</span>
            </div>

        </div>
    </div>
    <div class="px-20 mt-5 lg:w-1/2">
        <h1 class="text-red-600 py-4 text-2xl">Rate and review</h1>
        <div id="comments"></div>
        @if ($comments)
            @foreach ($comments as $item)
                <div class="py-4">
                    <div class="py-2 flex flex-row lg:max-w-2xl items-center">
                        <div class="w-20">
                            <img src="{{ asset('upload/avatars/' . $item->client_avatar) }}" alt="" class="w-full">
                        </div>
                        <div class="flex flex-col text-white pl-5">
                            <div class="flex flex-row justify-start items-center">
                                <h2 class="text-xl">{{ $item->client_name }}</h2>
                                <span class="text-gray-500 px-2">{{ $item->comment_date }}</span>
                                <div class="flex flex-row text-red-600">
                                    @php
                                        for ($i = 1; $i <= $item->comment_rating; $i++) {
                                            echo "<i class='fa fa-star'></i>";
                                        }
                                        for ($i = 1; $i <= 5 - $item->comment_rating; $i++) {
                                            echo "<i class='fa-regular fa-star'></i>";
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="my-2">
                                <p>{{ $item->comment_content }}</p>
                            </div>
                            <div class="flex flex-row">
                                <button class="px-2 rounded-sm bg-gray-400"><i class="fa-solid fa-thumbs-up"></i></button>
                                <div class="like-label select-none">45</div>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        @else
            <div class="py-4">
                <div class="py-2 flex flex-row lg:max-w-2xl items-center">
                    <h2 id="no_comment"class="text-white">No reviews exist, please rate this movie</h2>
                </div>
            </div>
        @endif

        @if (Session::get('client_id') == '')
            <h1 style="color: white">You need to login before rating the movie</h1>
            <a style="color: red" href="{{ route('login') }}">Login to rating</a>
        @else
            <form class="flex flex-col items-start text-white text-lg" action="{{ route('add_comment_ajax') }}"
                method="post" id="add-comment-form">
                @csrf
                <input type="hidden" value="{{ $id }}" id="movie_name" name="movie_name">
                <h3 class="text-2xl text-red-600">Add a review</h3>
                <div class="rating">
                    <input type="radio" name="rating" value="1" id="rating1">
                    <label for="rating1"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" value="2" id="rating2">
                    <label for="rating2"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" value="3" id="rating3">
                    <label for="rating3"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" value="4" id="rating4">
                    <label for="rating4"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" value="5" id="rating5" checked="checked">
                    <label for="rating5"><i class="fa-solid fa-star"></i></label>
                </div>
                <label class="text-lg pt-3 pb-1" for="textarea-review">Your review *</label>
                <textarea name="review" id="review" class="text-black w-full h-44 p-4 text-lg"></textarea>
                <br>
                <div id="message"></div>
                <button type="submit" class="btn-primary">Submit</button>
            </form>
        @endif
        <!-- form review and rate -->


    </div>

    <div class="px-20 py-4 text-white">
        <div class="flex justify-between">
            <h2 class="text-3xl">Eps</h2>
            <a href="#" class="text-red-600">View details</a>
        </div>
        <div id="ep-movies" class="w-full flex flex-wrap text-white my-2">


        </div>
    </div>

    <div class="px-20 py-4 text-white">
        <div class="flex justify-between">
            <h2 class="text-3xl">Same Movies</h2>
            <a href="#" class="text-red-600 ">View details</a>
        </div>
        <div id="same-movies" class="slick-slider-horizontal">

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('asset/js/jschung.js') }}"></script>
    <script src="{{ asset('asset/js/slickRender.js') }}"></script>
    <script src="{{ asset('asset/js/renderDetail.js') }}"></script>
    <script src="{{ asset('asset/js/slickRenderModule.js') }}"></script>
    <script>
        <?php
            echo 'const URLd=`https://ophim1.com/phim/'.$id.'`'
        ?>

        listMovie('series', [1,2], $('#ep-movies'))
        render(URLd);
    </script>
    <script type="text/javascript">
        $('#add-comment-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('add_comment_ajax') }}",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "movie_name": $("#movie_name").val(),
                    "comment_content": $("#review").val(),
                    "comment_rating": $('input[type="radio"][name="rating"]:checked').val()
                },
                success: function(data) {
                    $('#message').html("CẢM ƠN VÌ SỰ ĐÓNG GÓP CỦA BẠN!");
                    setTimeout(() => {
                        $('#message').html("");
                    }, 2000);
                    console.log(data);
                    $('#no_comment').remove();
                    $('#review').val("");
                    let rating_div = "";
                    for (let i = 1; i <= data['comment_rating']; i++) {
                        rating_div += '<i class="fa fa-star"></i>';
                    }
                    for (let i = 1; i <= 5 - data['comment_rating']; i++) {
                        rating_div += '<i class="fa-regular fa-star"></i>';
                    }

                    $('#comments').prepend(
                        '<div class="py-4"><div class="py-2 flex flex-row lg:max-w-2xl items-center"> <div class="w-20">  <img src="{{ asset('upload/avatars/') }}' +
                        "\\" + data['client_avatar'] +
                        '" alt="" class="w-full"></div><div class="flex flex-col text-white pl-5"><div class="flex flex-row justify-start items-center"><h2 class="text-xl">' +
                        data['client_name'] + '</h2><span class="text-gray-500 px-2">' + data[
                            'comment_date'] + '</span><div class="flex flex-row text-red-600">' +
                        rating_div + '</div></div><div class="my-2"><p>' + data['comment_content'] +
                        '</p></div><div class="flex flex-row"><button class="px-2 rounded-sm bg-gray-400"><i class="fa-solid fa-thumbs-up"></i></button><div class="like-label select-none">45</div></div></div></div>  </div>'
                    );
                    $("#add-comment-form").remove();
                    console.log('Successful.');
                },
                error: function(data) {
                    $('#message').html("Có lỗi. Không thực hiện được!");
                    setTimeout(() => {
                        $('#message').html("");
                    }, 2000);
                    console.log(data);
                    console.log('Error');
                },
            });
        });
    </script>
@endsection
