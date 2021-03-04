@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="contacts-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title-h1">Контакты</h1>
                    <p>{{ option('phone_time')->value }}</p>
                    <ul class="contacts">
                        <li><small>{{ option('phone1')->value }}</small>
                            <a href="tel:{{ str_replace(' ', '', option('phone1')->value2) }}">{{ option('phone1')->value2 }}</a>
                        </li>
                        <li><small>{{ option('phone2')->value }}</small>
                            <a href="tel:{{ str_replace(' ', '', option('phone2')->value2) }}">{{ option('phone2')->value2 }}</a>
                        </li>
                        <li><a href="email:{{ option('email')->value }}">{{ option('email')->value }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="contacts-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="left">
                            <div class="info">{{ option('app_name')->value }}</div>
                        </div>
                        <div class="right">
                            <h3>{{ option('owner1')->value }}</h3>
                            <div class="pos">{{ option('owner1')->value2 }}</div>
                            <div class="info-dir">
                                {!! option('owner1')->description !!}
                            </div>
                            <h3>{{ option('owner2')->value }}</h3>
                            <div class="pos">{{ option('owner2')->value2 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="license">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="title">О лицензии</h2>
                </div>
                <div class="col-lg-9">
                    {!! option('license')->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
