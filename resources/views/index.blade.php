@extends('layouts.app')
@section('title') Главная страница @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Главная @endslot
    @slot('li_2') Главная @endslot
    @slot('a_2') /admin @endslot
@endcomponent

//

    @endsection

    @section('footer')


    @endsection

