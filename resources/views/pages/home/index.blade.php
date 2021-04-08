@extends('layouts.app')

@section('head_scripts')
    <style>
        #tariff_tabs .amateur,
        #tariff_tabs .professional{
            display: none;
        }
        #tariff_tabs .active{
            display: block;
        }
        #step-4 .tarif input[type="radio"]{
            height: auto;
        }

        .type-order label{
            padding: 10px;
            background-color: #DBDBDB;
            color: #000000;
        }
        .type-order label.active{
            background-color: #db1e39;
            color: white;
            font-weight: bold;
        }
        .type-order label input{
            height: 16px;
        }
        #resource + div.nativejs-select{
            margin-top: 0;
        }
        *[v-cloak] {
            display: none;
        }
        .checks input.number{
            max-width: 100px;
        }
        .checks label.number{
            margin-right: 20px;
        }
        #country_first + div.nativejs-select{
            margin-top: 0;
        }
        .custom-select-my .nativejs-select{
            display: none;
        }
        .custom-select-my select{
            display: block !important;
            border: 1px solid rgba(166,181,197,.5);
            width: 100%;
            height: 40px;
            border-radius: 3px;
            color: #292929;
            background-color: #FFFFFF;
            margin-top: 30px;
            padding-left: 1rem;
        }
        .custom-select-my select option{
            padding: 10px 0;
        }
    </style>
@endsection

@section('content')
<section class="info-block">
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
<section class="our-clients">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title">Для кого мы<br /> работаем?</h2>
                <div class="clients-list">
                    <div class="item" style="background-image: url('{{ asset('assets/front/img/1.png') }}');">
                        <div class="title">Педагоги, воспитатели, муз.руководители</div>
                        <div class="intro">Хотите получить Благодарственное письмо для аттестации?</div>
                        <div class="image"><img src="{{ asset('assets/front/img/1-1.png') }}" alt=""></div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('assets/front/img/2.png') }}');">
                        <div class="title">Школьники, студенты</div>
                        <div class="intro">Нужны настоящие Дипломы для портфолио? Хочется доказать, что творчество – ваше призвание, а заодно и похвалиться в соц.сетях заслуженной наградой?</div>
                        <div class="image"><img src="{{ asset('assets/front/img/2-2.png') }}" alt=""></div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('assets/front/img/3.png') }}');">
                        <div class="title">Творчески активные люди из провинций</div>
                        <div class="intro">Вы - талант. И вам очень важно получить признание, но слишком дорого выезжать на очные конкурсы в другие города и страны?</div>
                        <div class="image"><img src="{{ asset('assets/front/img/3-3.png') }}" alt=""></div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('assets/front/img/4.png') }}');">
                        <div class="title">Родители</div>
                        <div class="intro">Ваши дети увлеклись творчеством? И вам очень хочется знать - есть ли у них способности, талант и перспективы роста?</div>
                        <div class="image"><img src="{{ asset('assets/front/img/4-4.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="carausel-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="wrap">
                    <h2 class="title">Выступайте в любых жанрах</h2>
                    <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ. Квалифицированные педагоги, видные деятели культуры и искусства РФ.</p>
                    <p>Квалифицированные педагоги, видные деятели культуры и искусства РФ</p>
                    <div class="btns-carousel">
                        <button class="btn-slider" id="btn-slider-prev"><i class="demo-icon icon-arrow-left"></i></button>
                        <button class="btn-slider" id="btn-slider-next"><i class="demo-icon icon-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="carousel">
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g1.png') }}');">
                            <h3>Музыканты</h3>
                            <p>Классические произведения, современные, эстрадно-джазовые, этнические. Любым составом</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g2.png') }}');">
                            <h3>Вокалисты</h3>
                            <p>Академическое пение, народное, этническое, эстрадно-джазовое. Солисты, вокальные ансамбли, хоровые коллективы</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g3.png') }}');">
                            <h3>Танцоры</h3>
                            <p>Современная хореография, народная,эпическая, классическая. Солисты, танцевальные дуэты и ансамбли</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g1.png') }}');">
                            <h3>Музыканты</h3>
                            <p>Классические произведения, современные, эстрадно-джазовые, этнические. Любым составом</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g2.png') }}');">
                            <h3>Вокалисты</h3>
                            <p>Академическое пение, народное, этническое, эстрадно-джазовое. Солисты, вокальные ансамбли, хоровые коллективы</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="background-image: url('{{ asset('assets/front/img/g3.png') }}');">
                            <h3>Танцоры</h3>
                            <p>Современная хореография, народная,эпическая, классическая. Солисты, танцевальные дуэты и ансамбли</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contests-banners">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wrapper">
                <a href="" class="contests-link contests-1">Конкурсы с участием профессионального жюри</a>
                <a href="" class="contests-link contests-2">Бесплатные конкурсы</a>
            </div>
        </div>
    </div>
</section>
<section class="free-contests">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-block">
                    <h2>Бесплатные конкурсы</h2>
                    <a href="" class="link-circle">Все бесплатные<br /> конкурсы</a>
                </div>
                <div class="contensts-list">
                    <div class="contest-card">
                        <div class="image">
                            <img src="{{ asset('assets/front/img/k1.png') }}" alt="">
                            <ul class="tags">
                                <li>Дошкольники</li>
                                <li>Школьники</li>
                            </ul>
                        </div>
                        <div class="date">
                            <p>Дата проведения: 20.06.2021</p>
                            <p>Дата окончания подачи заявки: 20.06.2021</p>
                        </div>
                        <h3>РАДУГА ДЕТСТВА</h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="jury">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-block">
                    <h2 class="title">Жюри –<br /> профессионалы<br /> своего дела</h2>
                    <a href="" class="link-circle">Все жюри</a>
                </div>
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
<div class="advantage-block">
    <section class="advantage advant-prof-contest" style="background-image: url('{{ asset('assets/front/img/bg2.png') }}')">
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
        <button class="red-link" id="open-hidden-advant-block"><span>Бесплатные конкурсы</span></button>
    </section>
    <section class="advantage advantage-free-contest advantage-hidden" style="background-image: url('{{ asset('assets/front/img/bg3.png') }}')">
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
        <button class="red-link" id="close-hidden-advant-block"><span>Конкурсы с участием<br /> профессионального жюри</span></button>
    </section>
</div>
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
                        <a href="" class="btn btn-border-red">Отправить запрос</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--<section class="quiz">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="head-quiz">
                    <div class="progress-bar">
                        <div class="circle-big">
                            <div class="text">1</div>
                            <svg>
                                <circle class="bg" cx="44" cy="44" r="37"></circle>
                                <circle class="progress" cx="44" cy="44" r="37" style="stroke-dashoffset: 284"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="title-head">
                        <div>
                            <div class="type">Бесплатные конкурсы</div>
                            <div class="order-num">Заявка №156</div>
                        </div>
                        <div class="price-item">
                            <h4>Общая стоимость:</h4>
                            <div class="price">246 ₽</div>
                        </div>
                    </div>
                    <div class="inform">
                        <p>Для вашего удобства мы сделали заполнение данных в несколько коротких этапов!</p>
                        <p class="red">Это займет всего несколько минут!</p>
                    </div>
                </div>
                <!--Шаг 1-->
                <div class="quiz-step active" id="step-1">
                    <div class="fields">
                        <div class="field field-50">
                            <legend>Название конкурса </legend>
                            <select name="" id="">
                                <option value="">Голос России</option>
                                <option value="" selected>Голос России 2</option>
                                <option value="">Голос России 3</option>
                            </select>
                        </div>
                        <div class="field field-50">
                            <legend>Номинация</legend>
                            <select name="" id="">
                                <option value="">Введите название или выберите его из</option>
                                <option value="">Голос России 2</option>
                                <option value="">Голос России 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field field-70">
                            <legend>Название музыкального инструмента</legend>
                            <input type="text" placeholder="Введите название музыкального инструмента">
                        </div>
                    </div>
                    <div class="quiz-steps-btn">
                        <button class="btn btn-border-red next-step-2">Вперед</button>
                    </div>
                </div>
                <!--Шаг 2-->
                <div class="quiz-step" id="step-2">
                    <div class="type-order">
                        <button class="btn-black active"><i class="demo-icon icon-user"></i> Солист</button>
                        <button class="btn-black"><i class="demo-icon icon-users"></i> Коллектив (от 2-х человек)</button>
                    </div>
                    <div class="fields">
                        <div class="field field-50">
                            <legend>Имя участника</legend>
                            <input type="text" placeholder="Введите имя участника">
                        </div>
                        <div class="field field-50">
                            <legend>Фамилия участника</legend>
                            <input type="text" placeholder="Введите фамилию участника">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field field-50">
                            <legend>Выберите возрастную категорию</legend>
                            <select name="" id="">
                                <option value="">Старшая (15 - 20)</option>
                                <option value="">Старшая (15 - 20)</option>
                                <option value="">Старшая (15 - 20)</option>
                            </select>
                        </div>
                        <div class="field field-50">
                            <legend>Название номера</legend>
                            <input type="text" placeholder="Введите название номера">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field field-33">
                            <legend>Имя педагога</legend>
                            <input type="text" placeholder="Введите имя педагога">
                        </div>
                        <div class="field field-33">
                            <legend>Фамилия педагога</legend>
                            <input type="text" placeholder="Введите фамилию педагога">
                        </div>
                        <div class="field field-33">
                            <legend>Отчество педагога</legend>
                            <input type="text" placeholder="Введите отчество педагога">
                        </div>
                    </div>
                    <div class="fields fields-align-center">
                        <div class="field field-50">
                            <legend>Должность</legend>
                            <input type="text" placeholder="Введите название номера">
                        </div>
                        <div class="field field-50">
                            <input type="checkbox" class="checkbox" id="checkbox" />
                            <label for="checkbox">Получить благодарственное письмо для педагога</label>
                        </div>
                    </div>
                    <button class="add"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                    <div class="quiz-steps-btn">
                        <button class="btn btn-border-gray prev-step-1">Назад</button>
                        <button class="btn btn-border-red next-step-3">Вперед</button>
                    </div>
                </div>
                <!--Шаг 3-->
                <div class="quiz-step" id="step-3">
                    <div class="fields">
                        <div class="field field-70">
                            <legend>Добавьте ссылку на видео <img src="{{ asset('assets/front/img/icon/youtube.svg') }}" alt=""></legend>
                            <input type="text" placeholder="Место для вашей ссылки">
                        </div>
                        <div class="field field-30">
                            <div class="links-question">
                                <a href="" class="link-question">Как подготовить видео для участия</a>
                                <a href="" class="link-question">Как загрузить видео на Youtube</a>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field field-70">
                            <legend>Или добавьте ссылку на видео с файлообменника</legend>
                            <input type="text" placeholder="Место для вашей ссылки">
                        </div>
                        <div class="field field-100">
                            <p class="attention"><strong>ВНИМАНИЕ!</strong> Для участия в конкурсе обязательно предоставление видеозаписи. Если в данный момент у Вас отсутствует возможность загрузки видеозаписи, то после оплаты участия Вам придет письмо на электронную почту, где Вы сможете указать ссылку на видеозапись.</p>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field field-100">
                            <legend>Комментарий</legend>
                            <textarea name="" placeholder="Введите дополнительную информацию по заявке..."></textarea>
                        </div>
                        <div class="field field-100">
                            <button class="add" id="add-data-edu"><i class="demo-icon icon-plus-circle"></i>Добавить данные об учебном заведении</button>
                        </div>
                    </div>
                    <!--Добавить данные об учебном заведении-->
                    <div class="fields-edu-add">
                        <div class="fields">
                            <div class="field field-50">
                                <legend>Страна участника</legend>
                                <select name="" id="">
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                            <div class="field field-50">
                                <legend>Населенный пункт</legend>
                                <select name="" id="">
                                    <option value="">Введите населенный пункт участника</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-70">
                                <legend>Учебное заведение</legend>
                                <input type="text" placeholder="Введите название учебного заведения">
                            </div>
                        </div>
                    </div>
                    <div class="quiz-steps-btn">
                        <button class="btn btn-border-gray prev-step-2">Назад</button>
                        <button class="btn btn-border-red next-step-4">Вперед</button>
                    </div>
                </div>
                <!--Шаг 4-->
                <div class="quiz-step" id="step-4">
                    <div class="fields">
                        <div class="field field-50">
                            <h3>Пример вашего диплома</h3>
                            <div class="diplom"><img src="{{ asset('assets/front/img/diplom-big.png') }}" alt=""></div>
                        </div>
                        <div class="field field-50">
                            <h3>Данные по заявке</h3>
                            <div class="item">
                                <legend>Название конкурса</legend>
                                <select name="" id="">
                                    <option value="">Голос России</option>
                                    <option value="">Голос России</option>
                                    <option value="">Голос России</option>
                                </select>
                            </div>
                            <div class="item">
                                <legend>Номинация</legend>
                                <select name="" id="">
                                    <option value="">Спой-ка!</option>
                                    <option value="">Спой-ка!</option>
                                    <option value="">Спой-ка!</option>
                                </select>
                            </div>
                            <div class="item">
                                <legend>Направление</legend>
                                <select name="" id="">
                                    <option value="">Сольное исполнение</option>
                                    <option value="">Сольное исполнение</option>
                                </select>
                            </div>
                            <div class="item">
                                <legend>Возрастная категория</legend>
                                <select name="" id="">
                                    <option value="">Старшая (15 - 20)</option>
                                    <option value="">Старшая (15 - 20)</option>
                                </select>
                            </div>
                            <div class="item">
                                <legend>Дата проведения</legend>
                                <p>11.06.2021</p>
                            </div>
                            <div class="item">
                                <legend>Имя участника</legend>
                                <input type="text">
                            </div>
                            <div class="item">
                                <legend>Фамилия участника</legend>
                                <input type="text">
                            </div>
                            <div class="item">
                                <legend>Название номера</legend>
                                <input type="text">
                            </div>
                            <div class="item">
                                <legend>Название учебного заведения</legend>
                                <input type="text">
                            </div>
                            <div class="item">
                                <legend>ФИО преподавателя</legend>
                                <input type="text">
                            </div>
                            <div class="item">
                                <legend>Страна учасника</legend>
                                <select name="" id="">
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                            <div class="item">
                                <legend>Населенный пункт</legend>
                                <select name="" id="">
                                    <option value="">г. Москва</option>
                                    <option value="">г. Москва</option>
                                </select>
                            </div>
                            <div class="item">
                                <input type="checkbox" class="checkbox" id="checkbox2" />
                                <label for="checkbox2">Подтверждаю правильность указанных данных</label>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-steps-btn">
                        <button class="btn btn-border-gray prev-step-3">Назад</button>
                        <button class="btn btn-border-red next-step-5">Перейти к оплате</button>
                    </div>
                </div>
                <!--Шаг 5-->
                <div class="quiz-step" id="step-5">
                    <div class="fields">
                        <div class="field field-50">
                            <legend>E-mail</legend>
                            <input type="text" placeholder="Введите адрес электронной почты">
                            <p>На указанную электронную почту будет отправлена ссылка для загрузки видео и после прохождения конкурса отправлен диплом. <b>Обязательно проверьте на правильность!</b></p>
                        </div>
                        <div class="field field-50">
                            <legend>Номер телефона</legend>
                            <input type="text" placeholder="Введите номер телефона">
                            <p>Желательно с WhatsApp для комфортного международного общения.</p>
                        </div>
                    </div>
                    <div class="tarifs">
                        <h3>Выберите тариф</h3>
                        <div class="wrapper">
                            <div class="tarif">
                                <div class="title">Выгодный</div>
                                <div class="term">срок <span>до 30 дней</span></div>
                                <div class="info">Результат будет известен до 15.02.2021</div>
                                <div class="price">Бесплатно</div>
                            </div>
                            <div class="tarif">
                                <div class="title">Оптимальный</div>
                                <div class="term">срок <span>до 15 дней</span></div>
                                <div class="info">Результат будет известен до 30.01.2021</div>
                                <div class="price">+ 400 ₽</div>
                            </div>
                            <div class="tarif">
                                <div class="title">Срочный</div>
                                <div class="term">срок <span>до 3-х дней</span></div>
                                <div class="info">Результат будет известен до 15.02.2021</div>
                                <div class="price">+ 600 ₽</div>
                            </div>
                            <div class="tarif">
                                <div class="title">Супер-срочный</div>
                                <div class="term red">срок <span>1 день</span></div>
                                <div class="info">Результат будет известен до 15.02.2021</div>
                                <div class="price">+ 1000 ₽</div>
                            </div>
                        </div>
                    </div>
                    <div class="detailed-cost">
                        <h3>Подробная стоимость</h3>
                        <table>
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Количество</th>
                                <th>Стоимость, ₽</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Основной взнос</td>
                                <td>1</td>
                                <td>246</td>
                            </tr>
                            <tr>
                                <td>Количество участников</td>
                                <td>-</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Количество педагогов</td>
                                <td>-</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Диплом в электронном виде для участника</td>
                                <td>0</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Благодарственное письмо для педагогаТариф</td>
                                <td>70</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Тариф</td>
                                <td>Оптимальный</td>
                                <td>400</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">Итого:</td>
                                <td>716</td>
                            </tr>
                            </tfoot>
                        </table>
                        <p>Нажимая кнопку «Оплатить», вы соглашаетесь с <a href="">условиями положения конкурса</a> и<br /> даете свое <a href="">согласие на обработку персональных данных.</a></p>
                        <div class="check-item">
                            <input type="checkbox" class="checkbox" id="checkbox3" />
                            <label for="checkbox3">Согласие на размещение представленного конкурсного материал на сайте www.concursant.ru, в группах и каналах социальных сетей «Конкурсант»</label>
                            <input type="checkbox" class="checkbox" id="checkbox4" />
                            <label for="checkbox4">Я прочитал(а) и ознакомлен(а) с правилами размещения материалов на ресурсе www.concursant.ru и даю свое согласие на участие в конкурсе, на обработку моих персональных данных и на получение уведомлений об итогах и новостях сайта по электронной почте.</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-red btn-buy">Оплатить онлайн</button>
                    </div>
                    <div class="fields">
                        <div class="field field-50">
                            <p class="big">Подать заявку на участие в конкурсе, но <a href="">оплатить с помощью квитанции</a></p>
                            <p>На указанную эл.почту будет отправлена квитанция на оплату и ссылка для возможности оплаты онлайн. Подробнее <a href="">здесь</a>. <b>Без оплаты заявка не рассматривается.</b></p>
                        </div>
                        <div class="field field-50 text-right">
                            <button class="btn btn-border-red">Получить квитанцию</button>
                        </div>
                    </div>
                    <div class="quiz-steps-btn">
                        <button class="btn btn-border-gray prev-step-4">Назад</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
@include('parts.bid_form')

@endsection

@section('footer_scripts')
    @include('parts.script_for_bid')
@endsection
