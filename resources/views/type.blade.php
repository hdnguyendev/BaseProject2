@extends('layout')

@section('css')

@endsection

@section('title')
@if(!empty($id)){
<?php
    $title='';
    $str = str_replace('-',' ', $id);
    $arr = explode(' ',$str);
    for ($i=0; $i < sizeof($arr); $i++) { 
        $title = $title.' '.ucfirst($arr[$i]);
    };
    trim($title);
    echo "<title>$title</title>"
?>     
@else
<?php
    $title='';
    $str = str_replace('-',' ', $type);
    $arr = explode(' ',$str);
    for ($i=0; $i < sizeof($arr); $i++) { 
        $title = $title.' '.ucfirst($arr[$i]);
    };
    trim($title);
    echo "<title>$title</title>"
?>   
@endif
@endsection

@section('root')
<div id="box" class="flex flex-wrap px-8 lg:px-20 my-4 mt-20">

</div>
<div class="btn-primary ml-20" id="load-more">Load More</div>
@endsection


@section('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{asset('asset/js/jschung.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('asset/js/classify.js')}}"></script>
    <script>
        @if(!empty($id)){
        <?php
            $type='';
            $type = str_replace('-','', $id);
            echo "renderType(typesMovie['$type'])"
        ?>
        }
        @else{
        <?php
            echo "renderType('$type')"
        ?>
        }
        @endif
    </script>
@endsection