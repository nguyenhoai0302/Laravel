@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent {{-- Kế thừa từ phần cha bổ sung cho phần con  --}}
    <h3>Home Sidebar</h3>
@endsection
@section('content')
    <h1 class="">Trang chủ</h1>
    @include('clients.contents.slide')
    @include('clients.contents.about')
@endsection

@section('css')

@endsection
@section('js')
  
@endsection