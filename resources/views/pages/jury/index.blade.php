@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="jury-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title-h1">Жюри</h1>
                    <div class="wrapper">
                        @foreach($jury as $person)
                        <div class="jury-member">
                            <div class="image">
                                <a href="{{ route('front.jury.show', ['slug' => $person->slug]) }}"><img src="/storage/{{ $person->img }}" alt=""></a>
                            </div>
                            <h3>{{ $person->name }}</h3>
                            <p class="subtitle">{{ $person->direction }}</p>
                            {!! mb_strimwidth($person->description, 0, 200, '...') !!}
                            <a href="{{ route('front.jury.show', ['slug' => $person->slug]) }}" class="more">Подробнее</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
