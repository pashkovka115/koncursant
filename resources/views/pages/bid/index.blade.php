@extends('layouts.app')

@section('head_scripts')
    <style>
        #tariff_tabs .amateur,
        #tariff_tabs .professional {
            display: none;
        }

        #tariff_tabs .active {
            display: block;
        }

        #step-4 .tarif input[type="radio"] {
            height: auto;
        }

        .type-order label {
            padding: 10px;
            background-color: #DBDBDB;
            color: #000000;
        }

        .type-order label.active {
            background-color: #db1e39;
            color: white;
            font-weight: bold;
        }

        .type-order label input {
            height: 16px;
        }

        #resource + div.nativejs-select {
            margin-top: 0;
        }

        *[v-cloak] {
            display: none;
        }

        .checks input.number {
            max-width: 100px;
        }

        .checks label.number {
            margin-right: 20px;
        }

        #country_first + div.nativejs-select {
            margin-top: 0;
        }

        .custom-select-my .nativejs-select {
            display: none;
        }

        .custom-select-my select {
            display: block !important;
            border: 1px solid rgba(166, 181, 197, .5);
            width: 100%;
            height: 40px;
            border-radius: 3px;
            color: #292929;
            background-color: #FFFFFF;
            margin-top: 30px;
            padding-left: 1rem;
        }

        .custom-select-my select option {
            padding: 10px 0;
        }
    </style>
@endsection

@section('content')
    @include('parts.bid_form')
@endsection

@section('footer_scripts')
    @include('parts.script_for_bid')
@endsection
