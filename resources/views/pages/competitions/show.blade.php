@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="contest-full-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ url()->previous() }}" class="more back">Назад</a>
                </div>
                <div class="col-lg-9">
                    <div class="title-contest">
                        <div class="left">
                            <h1 class="title">{{ $competition->name }}</h1>
                            <p>{{ $competition->short_description }}</p>
                        </div>
                        <div class="right"><a href="#block-6" class="btn btn-red">Стоимость участия</a></div>
                    </div>
                    <div class="age-groups">
                        <h3>Возрастные группы:</h3>
                        <ul>
                            @foreach($competition->ageGroups as $group)
                            <li>{{ $group->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contest-full-banner">
        <img src="{{ asset('storage/' . $competition->bg_img) }}" class="image-desktop" alt="">
        <img src="{{ asset('storage/' . $competition->img) }}" class="image-mobile" alt="">
    </section>

    <section class="contest-full-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-part">
                        <div class="contest-page-menu">
                            <ul>
                                @if($competition->description)
                                    <li><a href="#block-1">— Описание конкурса</a></li>
                                @endif
                                @if($competition->type->conditions)
                                    <li><a href="#block-2">— Условия участия</a></li>
                                @endif
                                @if($competition->type->reward)
                                    <li><a href="#block-3">— Система оценки и награждения</a></li>
                                @endif
                                @if($competition->type->rank)
                                    <li><a href="#block-4">— Звания и дипломы</a></li>
                                @endif
                                @if($competition->type->nominations)
                                    <li><a href="#block-5">— Номинации</a></li>
                                @endif
                                @if($competition->type->cost)
                                    <li><a href="#block-6">— Стоимость участия</a></li>
                                @endif
                                @if($competition->type->diploma)
                                    <li><a href="#block-7">— Пример диплома</a></li>
                                @endif
                            </ul>
                        </div>
                        <a href="#quiz-1" class="btn btn-border-red popup-with-form">Принять участие</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    @if($competition->description)
                        <div class="contest-block" id="block-1">
                            <h2>Описание конкурса</h2>
                            {!! $competition->description !!}
                        </div>
                    @endif

                    @if($competition->type->conditions)
                        <div class="contest-block" id="block-2">
                            <h2>Условия участия:</h2>
                            {!! $competition->type->conditions !!}
                        </div>
                    @endif

                    <div class="contest-block contest-gray-block" >
                        {!! $competition->type->email_description !!}
                        <div class="row">
                            <div class="col-lg-6"><a href="" class="btn btn-border-red">Принять участие</a></div>
                            <div class="col-lg-6">
                                <p><strong><a href="">Скачать квитанцию</a></strong><br /> <small>для оплаты по банковским реквизитам. Только после подачи заявки!</small></p>
                            </div>
                        </div>
                    </div>

                    @if($competition->type->reward)
                        <div class="contest-block assessment-system" id="block-3">
                            <h2>Система оценки и награждения</h2>
                            {!! $competition->type->reward !!}
                        </div>
                    @endif

                    @if($competition->type->rank)
                        <div class="contest-block" id="block-4">
                            <h2>Оргкомитетом конкурса предусмотрены звания:</h2>
                            {!! $competition->type->rank !!}
                        </div>
                    @endif

                    @if($competition->type->nominations)
                        <div class="contest-block" id="block-5">
                            <h2>Номинации:</h2>
                            {!! $competition->type->nominations !!}
                        </div>
                    @endif

                    @if($competition->type->diploma)
                        <div class="contest-block" id="block-7">
                            <h2>Пример диплома</h2>
                            <div class="diplom">
                                <div class="item"><img src="{{ asset('storage/' . $competition->type->diploma) }}" alt=""></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="info-block info-block-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title">Мы не ищем таланты.<br /> Таланты ищут нас.</h2>
                    <p>Как принять участие<br /> в конкурсе?</p>
                </div>
                <div class="col-lg-6">
                    <div class="wrapper">
                        <div class="item">
                            <div class="icn"><img src="{{ asset('assets/front/img/icon/competition.svg') }}" alt=""></div>
                            <h3>Выберите интересующий Вас конкурс</h3>
                            <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="{{ asset('assets/front/img/icon/checklist.svg') }}" alt=""></div>
                            <h3>Ознакомьтесь с условиями участия и оставьте заявку</h3>
                            <p>Открытый просмотр видеозаписей выступлений для анализа полученных оценок</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="{{ asset('assets/front/img/icon/time-management.svg') }}" alt=""></div>
                            <h3>Получите подтверждение ее принятии со сроками исполнения</h3>
                            <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="{{ asset('assets/front/img/icon/cup.svg') }}" alt=""></div>
                            <h3>Дождитесь указанной даты и получите результат на вашу эл.почту</h3>
                            <p>Открытый просмотр видеозаписей выступлений для анализа полученных оценок</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($competition->type->cost)
    <section class="price-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="block-6">
                    {!! $competition->type->cost !!}
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="discount-form row">
                    <div class="col-lg-3">
                        <h3>Заполните форму, чтобы отправить письмо в оргкомитет</h3>
                    </div>
                    <div class="col-lg-9">
                        <form action="">
                            <div class="item"><input type="text" placeholder="Введите ФИО"></div>
                            <div class="item"><input type="text" placeholder="Ваш е-mail"></div>
                            <div class="item"><button class="btn btn-border-red">Отправить</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="jury-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wrapper">
                    <div class="title-block">
                        <h2 class="title">Жюри –<br /> профессионалы<br /> своего дела</h2>
                        <a href="" class="link-circle">Все жюри</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="image"><img src="{{ asset('assets/front/img/juri-bg.png') }}" alt=""></div>
    </section>

    <section class="jury">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jury-member-carousel">
                        @foreach($jury as $item)
                        <div class="item">
                            <div class="jury-member">
                                <div class="image">
                                    @if($item->img)
                                    <a href=""><img src="{{ asset('storage/' . $item->img) }}" alt=""></a>
                                    @endif
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p class="subtitle">{{ $item->direction }}</p>
                                {!! $item->description !!}
                                <a href="{{ route('front.jury.show', ['slug' => $item->slug]) }}" class="more">Подробнее</a>
                            </div>
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
