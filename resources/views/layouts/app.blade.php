@include('layouts.head')

<body>
@if(Route::current()->uri() == '/')
    <section class="main-block">
        @endif
        @section('header_menu')
            @include('layouts.header_menu')
        @show
        @include('layouts.message_errors')
        {{--todo: секция на не домошней не должна отображаться --}}
        @if(Route::current()->uri() == '/')
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <h1>Всероссийские и международные дистанционные конкурсы</h1>
                            <p>Получите признание мастерства и сэкономьте 5-10 тысяч рублей за счет заочного участия</p>
                            <div class="advant-tabs">
                                <div class="item">Для чтецов</div>
                                <div class="item">Для танцоров</div>
                                <div class="item">Для музыкантов</div>
                                <div class="item">Для певцов</div>
                            </div>
                            <a href="" class="btn btn-border-white btn-all-contents">Все конкурсы</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endif

@yield('content')
@include('layouts.footer')
