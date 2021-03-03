@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="jury-page">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <h1 class="title-h1">Жюри</h1>
                </div>
                <div class="col-lg-9">
                    <a href="" class="more back">Все жюри</a>
                </div>
                <div class="col-lg-12">
                    <div class="info-jury">
                        <div class="image">
                            @if($person->img)
                            <img src="/storage/{{ $person->img }}" alt="" style="min-height: 458px; width: auto;">
                            @endif
                        </div>
                        <div class="description">
                            <div class="name">{{ $person->name }}</div>
                            <div class="pos">{{ $person->direction }}</div>
                            <ul class="tags">
                                @php
                                $profs = explode(',', $person->profession);
                                @endphp
                                @foreach($profs as $prof)
                                <li>{{ $prof }}</li>
                                @endforeach
                            </ul>
                        {!! $person->description !!}
                        </div>
                    </div>
                    <div class="row information">
                        <div class="col-lg-3">
                            <h3>Образование</h3>
                        </div>
                        <div class="col-lg-9">
                            {!! $person->ducation !!}
                        </div>
                    </div>
                    <div class="row information">
                        <div class="col-lg-3">
                            <h3>География трудовой деятельности</h3>
                        </div>
                        <div class="col-lg-9">
                        {!! $person->geography_of_work !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
