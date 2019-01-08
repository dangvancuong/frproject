@extends('layouts.page')

@section('title')
    Trang Chủ || App Food
@endsection

@section('cssjs')
    @include('pages.common.cssjs_home')
@endsection

@section('content')

<div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <!--header starts-->
    @include('pages.common.header')
    <!-- banner part starts -->
    @include('pages.common.banner')
    <!-- location match part ends -->
    <!-- Popular block starts -->
    @include('pages.common.popular')
    <!-- Popular block ends -->
    @include('pages.common.work')
    <!-- How it works block ends -->
    <!-- Featured restaurants starts -->
    @include('pages.common.restaurants')
    <!-- Featured restaurants ends -->
    @include('pages.common.appfood')

    @include('pages.common.footer')
    <!-- end:Footer -->
</div>
@endsection

@section('footer')
    @include('pages.common._footer')
@endsection
