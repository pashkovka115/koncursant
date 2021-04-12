@extends('layouts.app')

@section('head_scripts')

@endsection

@section('header_menu')
    <section class="main-block inside-main-block" style="background-image: url({{ asset('assets/front/img/prof-konkurs.png') }});">
        @include('layouts.header_menu')
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Конкурсы с участием профессионального жюри</h1>
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
                            <h3><a href="{{ route('front.competitions.show', ['slug' => $competition->slug]) }}" style="color: inherit">{{ $competition->name }}</a></h3>
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
                                <img src="{{ asset('assets/front/img/k2.png') }}" alt="">
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
                                <img src="{{ asset('assets/front/img/k3.png') }}" alt="">
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
    <section class="advantage" style="background-image: url('{{ asset('assets/front/img/bg2.png') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wrapper">
                    <h2 class="title">В чём отличия<br /> конкурсов?</h2>
                    <p>Конкурсы с участием<br /> профессионального жюри</p>
                    <div class="advant-wrapper">
                        <div class="item">
                            <h3>Дата проведения</h3>
                            <p>Фиксированная</p>
                        </div>
                        <div class="item">
                            <h3>Участие</h3>
                            <p>Платное</p>
                        </div>
                        <div class="item">
                            <h3>Видеозаписи</h3>
                            <p>Мы обрабатываем ваши видеозаписи и выкладываем их на наш канал в Youtube с логотипом конкурса</p>
                        </div>
                        <div class="item">
                            <h3>Жюри</h3>
                            <p>Заслуженные деятели культуры и искусства России, квалифицированные педагоги и исполнители</p>
                        </div>
                        <div class="item">
                            <h3>Дипломы</h3>
                            <p>Без указания заочной формы с «живыми» печатями и подписями, QR-кодом и фирменной голограммой высылаются заказными письмами</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a href="" class="red-link"><span>Бесплатные конкурсы</span></a>
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
                        <div class="item">
                            <div class="jury-member">
                                <div class="image">
                                    <a href=""><img src="{{ asset('assets/front/img/jury/1.png') }}" alt=""></a>
                                </div>
                                <h3>Захаров Валентин Александрович</h3>
                                <p class="subtitle">Россия, (хореография)</p>
                                <p>Заслуженный артист России, хореограф, педагог-балетмейстер. Много лет отдал работе в Государственном Академическом Кубанском казачьем хоре. Также работал артистом балета в ансамбле народной песни «Криница».</p>
                                <a href="" class="more">Подробнее</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="jury-member">
                                <div class="image">
                                    <a href=""><img src="{{ asset('assets/front/img/jury/2.png') }}" alt=""></a>
                                </div>
                                <h3>Донченко Юрий Григорьевич</h3>
                                <p class="subtitle">Россия, (духовые, оркестр)</p>
                                <p>Заслуженный артист России, доцент. Главный дирижер сводного духового оркестра Краснодарского края. Член международной ассоциации дирижеров IGEB (Австрия) и международной музыкальной организации Double Reed (США).  Лауреат премии администрации Краснодарского края в области культуры. Награжден медалью губернатора "За выдающийся вклад в развитие Кубани".</p>
                                <a href="" class="more">Подробнее</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="jury-member">
                                <div class="image">
                                    <a href=""><img src="{{ asset('assets/front/img/jury/3.png') }}" alt=""></a>
                                </div>
                                <h3>Межлумова Нелли Леоновна</h3>
                                <p class="subtitle">Россия, (фортепиано)</p>
                                <p>Профессор, заведующий кафедрой "Фортепиано" факультета «Консерватория» Краснодарского государственного института культуры (КГИК).</p>
                                <p>Заслуженный работник культуры Кубани.</p>
                                <p>Образование: Московская государственная консерватория им. П.И. Чайковского (1967).</p>
                                <a href="" class="more">Подробнее</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="jury-member">
                                <div class="image">
                                    <a href=""><img src="{{ asset('assets/front/img/jury/4.png') }}" alt=""></a>
                                </div>
                                <h3>Шубина Наталья Николаевна</h3>
                                <p class="subtitle">Россия, (фортепиано)</p>
                                <p>Председатель цикловой комиссии «Специальное фортепиано» Краснодарского музыкального колледжа им. Н.А. Римского-Корсакова (высшая квалификационная категория). Заслуженный работник культуры Кубани, обладатель знака "За достижения в Культуре России".</p>
                                <a href="" class="more">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection
