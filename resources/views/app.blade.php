@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    
@endsection
@section('title')
    <title>Streamit || The way you relax</title>
@endsection
@section('root')
 <!-- slider -->
        <div id="banner-slick" class="h-screen">
         
        </div>
        <!-- movies trending limit 4 film-->
        <div class="px-8 lg:px-20 py-4 text-white">
            <div class="flex justify-between">
                <h2 class="text-xl md:text-2xl lg:text-3xl">Upcoming Movies</h2>
                <a href="#" class="text-red-600">View details</a>
            </div>
            <div id="upcoming_movies" class="py-4 mt-4">
            </div>
        </div>

        <!-- some movie to slick slide -->
        <div class="px-8 lg:px-20 py-4 text-white w-full">
            <div class="flex justify-between">
                <h2 class="text-xl md:text-2xl lg:text-3xl">Feature Movies</h2>
                <a href="#" class="text-red-600">View details</a>
            </div>
            <div class="w-full">
                <div id="feature-movies" class="slick-slider-horizontal">
                </div>
            </div>
        </div>
        <!-- phim bo -->
        <div class="px-8 lg:px-20 py-4 text-white">
            <div class="flex justify-between">
                <h2 class="text-xl md:text-2xl lg:text-3xl">Series Movies</h2>
                <a href="#" class="text-red-600">View details</a>
            </div>
            <div id="long-movies" class="slick-slider-horizontal">
            </div>
        </div>
        <!-- Coming soon movies -->
        <div class="px-8 lg:px-20 py-4 text-white max-w-full overflow-hidden">
            <div class="relative max-h-fit max-w-full">
                <div id="top-movie-banner" class="max-w-full max-h-screen container hidden md:block">

                </div>
                <div
                    class="py-4 mt-4 relative translate-y-0 md:absolute -mx-2 left-4 w-full lg:w-1/5 md:top-1/4 md:-translate-y-1/2">
                    <h2 class="text-xl md:text-2xl lg:text-3xl font-bold">Top movies</h2>
                    <div id="top-movies">
                    </div>
                </div>

            </div>
        </div>
        <div class="h-4/5 min-h-max w-full relative text-white flex flex-col lg:flex-row  justify-between items-center bg-fixed bg-center bg-cover">

        </div>
        <!-- suggest for you -->
        <div class="my-10">
            <div id="suggest-slide">

            </div>
            <div id="suggest-big">     
            </div>
        </div>

        <div class="px-8 lg:px-20 py-4 text-white">
            <div class="flex justify-between">
                <h2 class="text-3xl">Cartoon</h2>
                <a href="#" class="text-red-600">View details</a>
            </div>
            <div id="cartoon-movies" class="slick-slider-horizontal">
                

            </div>
        </div>
@endsection

@section('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="./asset/js/jschung.js"></script>
    <script src="./asset/js/slickRender.js"></script>
    <script src="./asset/js/main.js" type="text/javascript"></script>
    <script>
        callApiData([1,2])
    </script>
@endsection