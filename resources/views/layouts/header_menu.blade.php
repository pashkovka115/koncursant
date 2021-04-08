<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wrapper">
                <div class="logo-box"><a href=""><img src="{{ asset('assets/front/img/logo.svg') }}" alt=""></a></div>
                <button class="btn-menu"></button>
                <div class="right-part">
                    <div class="top-pnl">
                        @foreach($info_pages as $info_page)
                        <a href="{{ route('front.page.show', ['slug' => $info_page->slug]) }}" class="link"><i class="demo-icon icon-info"></i> {{ $info_page->name }}</a>
                        @endforeach
{{--                        <a href="" class="link"><i class="demo-icon icon-ask"></i></a>--}}
                        <a href="tel:{{ preg_replace('/[^\d]/', '', option('phone1')->value2) }}" class="phone">{{ option('phone1')->value2 }}</a>
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
                            <li><a href="tel:{{ preg_replace('/[^\d]/', '', option('phone1')->value2) }}" class="phone">{{ option('phone1')->value2 }}</a></li>
                            <li><a href="tel:{{ preg_replace('/[^\d]/', '', option('phone2')->value2) }}" class="phone">{{ option('phone2')->value2 }}</a></li>
                        </ul>
                    </div>
                    <div class="menu">
                        <ul>
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
                    </div>
                    <div><a href="" class="link"><i class="demo-icon icon-info"></i> Принять участие</a></div>
                    <div><a href="" class="link"><i class="demo-icon icon-ask"></i> Как подать заявку</a></div>

                </div>
            </div>
        </div>
    </section>
</header>
