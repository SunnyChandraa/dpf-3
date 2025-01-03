@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <h4>Selamat datang, <span style="color: #84AF28; font-weight: 700;">{{ session('userData')->namaPegawai }}</span></h4>
@endsection
