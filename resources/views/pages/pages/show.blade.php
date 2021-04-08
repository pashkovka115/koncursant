@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="license">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"><h2 class="title">{{ $page->name }}</h2></div>
                <div class="col-lg-9">{{ $page->content }}</div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
