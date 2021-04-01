@extends('admin.layouts.app')
@section('title') Заявки на любительские конкурсы @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') {{ $str_type }} @endslot
        @slot('active') Заявки на {{ mb_strtolower($str_type) }} конкурсы @endslot
    @endcomponent
    @foreach($bids as $name => $items)
        @php
        //dump($items)
        @endphp
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.bids.concrete.competition', ['competition_id' => $items[0]->competition->id]) }}">{{ $name }}</a>
                    <span style="font-weight: bold">{{ $items->count() }}</span>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('footer')


@endsection
