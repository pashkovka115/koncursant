@extends('layouts.app')
@section('title') MD Icons @endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') MD Icons @endslot
    @slot('li_1') Icons @endslot
    @slot('li_2') MD Icons @endslot
@endcomponent

<div class="row icons-demo-content">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">New Icons</h4>
                <p class="card-title-desc mb-2">Use <code>&lt;i class="mdi mdi-speedometer-slow"&gt;&lt;/i&gt;</code> <span class="badge badge-success">v 5.0.45</span>.</p>

                <div class="row icon-demo-content" id="newIcons"></div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">All Icons</h4>
                <div class="row icon-demo-content" id="icons"></div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Size</h4>

                <div class="row icon-demo-content">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-18px mdi-account"></i> mdi-18px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-24px mdi-account"></i> mdi-24px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-36px mdi-account"></i> mdi-36px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-48px mdi-account"></i> mdi-48px
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Rotate</h4>

                <div class="row icon-demo-content">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-45 mdi-account"></i> mdi-rotate-45
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-90 mdi-account"></i> mdi-rotate-90
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-135 mdi-account"></i> mdi-rotate-135
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-180 mdi-account"></i> mdi-rotate-180
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-225 mdi-account"></i> mdi-rotate-225
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-270 mdi-account"></i> mdi-rotate-270
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-315 mdi-account"></i> mdi-rotate-315
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Spin</h4>

                <div class="row icon-demo-content">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-spin mdi-loading"></i> mdi-spin
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-spin mdi-star"></i> mdi-spin
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection
@section('footer')

<!-- materialdesign icon js-->
<script src="{{ URL::asset('/assets/js/pages/materialdesign.init.js')}}"></script>

@endsection
