@props(['title' => null])

@extends('dashboard::layouts.blank')

@section('content')
    {!! $slot !!}
@endsection
