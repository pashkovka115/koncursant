<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wrapper">
                <div class="logo-box"><a href=""><img src="{{ asset('assets/front/img/logo.svg') }}" alt=""></a></div>
                <button class="btn-menu"></button>
                <div class="right-part">
                    <div class="top-pnl">
                        <a href="" class="link"><i class="demo-icon icon-info"></i> Принять участие</a>
                        <a href="" class="link"><i class="demo-icon icon-ask"></i> Как подать заявку</a>
                        <a href="tel:+79189809074" class="phone">8 918 980 90 74</a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="{{ route('front.bid.form.create') }}">Форма заявки</a></li> {{-- todo: Только для разработки --}}
                            @foreach($top_menu as $item)
                            <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                @if(count($item['child']) > 0)
                                    <ul>
                                        @foreach($item['child'] as $child)
                                            <li><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mobile-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="phone-box">
                        <ul>
                            <li><a href="" class="phone">8 938 476 19 18</a></li>
                            <li><a href="" class="phone">8 918 980 90 74</a></li>
                        </ul>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="">Главная</a></li>
                            <li><a href="">Конкурсы</a></li>
                            <li><a href="">Результаты</a></li>
                            <li><a href="">Жюри</a></li>
                            <li><a href="">Частые вопросы</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </div>
                    <div><a href="" class="link"><i class="demo-icon icon-info"></i> Принять участие</a></div>
                    <div><a href="" class="link"><i class="demo-icon icon-ask"></i> Как подать заявку</a></div>

                </div>
            </div>
        </div>
    </section>
</header>
