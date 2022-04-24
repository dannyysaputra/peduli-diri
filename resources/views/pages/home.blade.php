@extends('app')

@section('title')
    Home
@endsection

@section('app.content')
    <p>Selamat datang {{ auth()->user()->name }} di aplikasi Peduli Diri</p>
@endsection