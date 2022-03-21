@props(['title' => null, 'toolbarButtons' => null])

@extends('dashboard::layouts.full', compact('toolbarButtons'))

@section('content')
    {!! $slot !!}
@endsection
