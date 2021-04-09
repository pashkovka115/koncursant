@extends('layouts.app')

@section('head_scripts')

@endsection

@section('header_menu')
    <section class="main-block inside-main-block" style="background-image: url('{{ asset('assets/front/img/free-konkurs-bg.png') }}');">
        @include('layouts.header_menu')
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Бесплатные конкурсы</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="free-contests prof-contests">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contensts-list">
                        @foreach($competitions as $competition)
                            <div class="contest-card">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $competition->img) }}" alt="">
                                    <ul class="tags">
                                        @foreach($competition->ageGroups as $group)
                                            <li>{{ $group->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="date">
                                    <p>Дата проведения: {{ $competition->date_start }}</p>
                                    <p>Дата окончания подачи заявки: {{ $competition->date_end }}</p>
                                </div>
                                <h3>{{ $competition->name }}</h3>
                                <ul class="tags2">
                                    @foreach($competition->nominations as $nomination)
                                        <li>{{ $nomination->name }}</li>
                                    @endforeach
                                    {{--<li><i class="demo-icon icon-mic"></i> вокал</li>
                                    <li><i class="demo-icon icon-ballet"></i> хореография</li>
                                    <li><i class="demo-icon icon-open-book"></i> театр</li>
                                    <li><i class="demo-icon icon-guitar"></i> музыка</li>
                                    <li><i class="demo-icon icon-painting"></i> рисование</li>
                                    <li><i class="demo-icon icon-ruler"></i> рукоделие</li>--}}
                                </ul>
                                <div class="desc">{!! mb_strimwidth(strip_tags($competition->description), 0, 146, '...') !!}</div>
                            </div>
                        @endforeach
                        {{--<div class="contest-card">
                            <div class="image">
                                <img src="img/k2.png" alt="">
                                <ul class="tags">
                                    <li>Дошкольники</li>
                                    <li>Школьники</li>
                                    <li>Взрослые</li>
                                </ul>
                            </div>
                            <div class="date">
                                <p>Дата проведения: 20.06.2021</p>
                                <p>Дата окончания подачи заявки: 20.06.2021</p>
                            </div>
                            <h3>ГОЛОС РОССИИ</h3>
                            <ul class="tags2">
                                <li><i class="demo-icon icon-mic"></i> вокал</li>
                                <li><i class="demo-icon icon-ballet"></i> хореография</li>
                                <li><i class="demo-icon icon-open-book"></i> театр</li>
                                <li><i class="demo-icon icon-guitar"></i> музыка</li>
                                <li><i class="demo-icon icon-painting"></i> рисование</li>
                                <li><i class="demo-icon icon-ruler"></i> рукоделие</li>
                            </ul>
                            <div class="desc">
                                <p>Конкурс детского творчества по видеозаписям. Конкурс детского творчества по видеозаписям. Конкурс детского творчества по видеозаписям.</p>
                            </div>
                        </div>
                        <div class="contest-card">
                            <div class="image">
                                <img src="img/k3.png" alt="">
                                <ul class="tags">
                                    <li>Дошкольники</li>
                                    <li>Школьники</li>
                                    <li>Взрослые</li>
                                </ul>
                            </div>
                            <div class="date">
                                <p>Дата проведения: 20.06.2021</p>
                                <p>Дата окончания подачи заявки: 20.06.2021</p>
                            </div>
                            <h3>ТИХАЯ МОЯ РОДИНА</h3>
                            <ul class="tags2">
                                <li><i class="demo-icon icon-mic"></i> вокал</li>
                                <li><i class="demo-icon icon-ballet"></i> хореография</li>
                                <li><i class="demo-icon icon-open-book"></i> театр</li>
                                <li><i class="demo-icon icon-guitar"></i> музыка</li>
                                <li><i class="demo-icon icon-painting"></i> рисование</li>
                                <li><i class="demo-icon icon-ruler"></i> рукоделие</li>
                            </ul>
                            <div class="desc">
                                <p>Конкурс детского творчества по видеозаписям. Конкурс детского творчества по видеозаписям. Конкурс детского творчества по видеозаписям.</p>
                            </div>
                        </div>--}}
                    </div>
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
                            <div class="icn"><img src="img/icon/competition.svg" alt=""></div>
                            <h3>Выберите интересующий Вас конкурс</h3>
                            <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="img/icon/checklist.svg" alt=""></div>
                            <h3>Ознакомьтесь с условиями участия и оставьте заявку</h3>
                            <p>Открытый просмотр видеозаписей выступлений для анализа полученных оценок</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="img/icon/time-management.svg" alt=""></div>
                            <h3>Получите подтверждение ее принятии со сроками исполнения</h3>
                            <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="img/icon/cup.svg" alt=""></div>
                            <h3>Дождитесь указанной даты и получите результат на вашу эл.почту</h3>
                            <p>Открытый просмотр видеозаписей выступлений для анализа полученных оценок</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="advantage advantage-free-contest" style="background-image: url(img/bg3.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wrapper">
                    <h2 class="title">В чём отличия<br /> конкурсов?</h2>
                    <p>Бесплатные конкурсы</p>
                    <div class="advant-wrapper">
                        <div class="item">
                            <h3>Дата проведения</h3>
                            <p>Круглый год</p>
                        </div>
                        <div class="item">
                            <h3>Участие</h3>
                            <p>Условно-бесплатное</p>
                        </div>
                        <div class="item">
                            <h3>Видеозаписи</h3>
                            <p>Мы не обрабатываем ваши видеозаписи и не выкладываем их на наш канал в Youtube</p>
                        </div>
                        <div class="item">
                            <h3>Жюри</h3>
                            <p>Студенты выпускных курсов профильных факультетов высших учебных заведений</p>
                        </div>
                        <div class="item">
                            <h3>Дипломы</h3>
                            <p>С указанием заочной формы участия в электронном виде высылаются на указанный вами e-mail с QR-кодом, печатью и подписью председателя жюри</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a href="" class="red-link"><span>Конкурсы с участием<br /> профессионального жюри</span></a>
    </section>
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="wrapper">
                        <div class="percent-box">
                            <div class="item">
                                <p>Скидка</p>
                                <p class="percent">10%</p>
                            </div>
                            <div class="item">
                                <p>+</p>
                                <p class="txt">благодарственное письмо</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Получите скидку 10% для каждого участника в профессиональном конкурсе и благодарственное Письмо для администрации вашего учреждения при подаче более 10 заявок с одного e-mail</p>
                        </div>
                    </div>
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
@endsection

@section('footer_scripts')

@endsection
