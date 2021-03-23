@extends('admin.layouts.app')
@section('title') Главная страница @endsection
@section('header')

@endsection
@section('content')
@component('admin.layouts.components.breadcrumb')
    @slot('title') Главная @endslot
    @slot('li_2') Главная @endslot
    @slot('a_2') /admin @endslot
@endcomponent

{!! Menu::render() !!}

@endsection

@section('footer')
    {!! Menu::scripts() !!}
@endsection
