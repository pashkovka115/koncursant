@extends('layouts.app')
@section('title') Sparkline Chart @endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Sparkline Chart @endslot
    @slot('li_1') Charts @endslot
    @slot('li_2') Sparkline Chart @endslot
@endcomponent

<div class="row">
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pie Chart</h4>
                <div id="sparkline1" class="text-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bar Chart</h4>
                <div id="sparkline2" class="text-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body analytics-info">
                <h4 class="card-title">Line Chart</h4>
                <div id="sparkline4"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Composite Bar Chart</h4>
                <div id="sparkline3" class="text-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Line Charts</h4>
                <div id="sparkline5" class="text-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card bg-primary">
            <div class="card-body">
                <h4 class="card-title text-white">Discrete Chart</h4>
                <div id="sparkline6" class="text-center"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bullet Chart</h4>
                <div id="sparkline7"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Box Plot Chart</h4>
                <div id="sparkline8" class="text-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tristate Charts</h4>
                <div id="sparkline9" class="text-center"></div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection
@section('footer')

    <script src="{{ URL::asset('/assets/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/sparklines.init.js')}}"></script>

@endsection
