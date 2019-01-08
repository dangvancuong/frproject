@extends('layouts.admin')
@section('title')
    Admin
    @endsection
@section('header')
    @include('admin.common._header')
    @endsection
@section('content')
    @include('admin.common.header')

    @include('admin.common.sidebar')

    @yield('content_admin')

    @include('admin.common.footer')
@endsection

@section('footer')
    @include('admin.common._footer')
    @endsection
