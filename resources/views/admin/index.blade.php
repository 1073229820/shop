@extends('admin.layouts.app')

@section('content')
    @if (session('success'))
    {{session('success')}}
    @endif
    这是首页
@endsection