@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    {{-- @parent  Kế thừa từ phần cha bổ sung cho phần con  --}}
    <h3>Products Sidebar</h3>
@endsection
@section('content')
    <h1>SẢN PHẨM</h1>
@endsection

@section('css')
    <style>
        header{
        background: yellow;
        color: #333;
        }
    </style>
@endsection
@section('js')

@endsection