@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="faq-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="title-h1">Частые вопросы</h1>
                    <div class="accordeon">
                        @foreach($faq as $item)
                        <dl>
                            <dt>{{ $item->question }}</dt>
                            <dd>{{ $item->answer }}</dd>
                        </dl>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
