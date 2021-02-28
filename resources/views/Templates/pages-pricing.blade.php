@extends('layouts.app')
@section('title') Pricing @endsection
@section('body')
<body data-sidebar="dark">
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Pricing @endslot
    @slot('li_1') Utility @endslot
    @slot('li_2') Pricing @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="text-center mb-5">
            <h4>Simple Pricing Plans</h4>
            <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis</p>

            <ul class="nav nav-pills pricing-nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Monthly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Yearly</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card pricing-box">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="mt-3">
                        <i class="ri-edit-box-line text-primary h1"></i>
                    </div>
                    <h5 class="mt-4">Starter</h5>

                    <div class="font-size-14 mt-4 pt-2">
                        <ul class="list-unstyled plan-features">
                            <li>Free Live Support</li>
                            <li>Unlimited User</li>
                            <li>No Time Tracking</li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <h1 class="font-weight-bold mb-1"><sup class="mr-1"><small>$</small></sup>19</h1>
                        <p class="text-muted">Per month</p>
                    </div>

                    <div class="mt-5 mb-3">
                        <a href="#" class="btn btn-primary w-md">Get started</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card pricing-box">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="mt-3">
                        <i class="ri-medal-line text-primary h1"></i>
                    </div>
                    <h5 class="mt-4">Professional</h5>

                    <div class="font-size-14 mt-4 pt-2">
                        <ul class="list-unstyled plan-features">
                            <li>Free Live Support</li>
                            <li>Unlimited User</li>
                            <li>No Time Tracking</li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <h1 class="font-weight-bold mb-1"><sup class="mr-1"><small>$</small></sup>29</h1>
                        <p class="text-muted">Per month</p>
                    </div>

                    <div class="mt-5 mb-3">
                        <a href="#" class="btn btn-primary w-md">Get started</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card pricing-box">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="mt-3">
                        <i class="ri-stack-line text-primary h1"></i>
                    </div>
                    <h5 class="mt-4">Enterprise</h5>

                    <div class="font-size-14 mt-4 pt-2">
                        <ul class="list-unstyled plan-features">
                            <li>Free Live Support</li>
                            <li>Unlimited User</li>
                            <li>No Time Tracking</li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <h1 class="font-weight-bold mb-1"><sup class="mr-1"><small>$</small></sup>39</h1>
                        <p class="text-muted">Per month</p>
                    </div>

                    <div class="mt-5 mb-3">
                        <a href="#" class="btn btn-primary w-md">Get started</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card pricing-box">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="mt-3">
                        <i class="ri-vip-crown-line text-primary h1"></i>
                    </div>
                    <h5 class="mt-4">Unlimited</h5>

                    <div class="font-size-14 mt-4 pt-2">
                        <ul class="list-unstyled plan-features">
                            <li>Free Live Support</li>
                            <li>Unlimited User</li>
                            <li>No Time Tracking</li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <h1 class="font-weight-bold mb-1"><sup class="mr-1"><small>$</small></sup>49</h1>
                        <p class="text-muted">Per month</p>
                    </div>

                    <div class="mt-5 mb-3">
                        <a href="#" class="btn btn-primary w-md">Get started</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
