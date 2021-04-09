<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Меню</li>

                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>  {{--<span class="badge badge-pill badge-success float-right">3</span>--}}
                        <span>Главная</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.bids.new_bids') }}" class=" waves-effect">
                        <i class="ri-folders-line"></i>
                        <span>Новые заявки</span>
                        @if($quantity_new_bids > 0)
                            <span class="badge badge-pill badge-danger float-right">{{ $quantity_new_bids }}</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Все заявки</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.bids.index') }}">Все</a></li>
                        <li><a href="{{ route('admin.bids.index_type', ['type' => 'amateur']) }}">Любительские</a></li>
                        <li><a href="{{ route('admin.bids.index_type', ['type' => 'professional']) }}">Профессиональные</a></li>
                        <li><a href="{{ route('admin.price.edit') }}">Цены</a></li>
                    </ul>


                </li>

                <li>
                    <a href="{{ route('admin.estimate.index') }}" class=" waves-effect">
                        <i class="fas fa-star"></i>
                        <span>Оценить</span>
                    </a>
                </li>

                <li>
                    <a href="#" class=" waves-effect">
                        <i class="ri-customer-service-2-fill"></i>
                        <span>===Обратный звонок</span>
                    </a>
                </li>

                <li class="menu-title">Конкурсы</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-customer-service-2-fill"></i>
                        <span>Конкурсы</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach($competition_types as $competition_type)
                            <li><a href="{{ route('admin.competitions.all.index_competition_type', ['id' => $competition_type->id]) }}">{{ $competition_type->name }}</a></li>
                        @endforeach
                        <li><a href="{{ route('admin.competitions.all.index') }}">Все</a></li>
                            <li><a href="{{ route('admin.competitions.all.create') }}">Создать новый</a></li>
                            <li><a href="{{ route('admin.competitions.types.index') }}">Типы</a></li>
                            <li><a href="{{ route('admin.competitions.age_group.index') }}">Возрастные группы</a></li>
                            <li><a href="{{ route('admin.competitions.nominations.index') }}">Номинации</a></li>
                        <li><a href="{{ route('admin.competitions.tariffs.index') }}">Тарифы</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-settings-fill"></i>
                        <span>Настройки</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">======</a></li>
                    </ul>
                </li>

                <li class="menu-title">Контент</li>

                <li>
                    <a href="{{ route('admin.jury.index') }}" class=" waves-effect">
                        <i class="ri-team-fill"></i>
                        <span>Жюри</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.questions.index') }}" class=" waves-effect">
                        <i class="ri-question-answer-line"></i>
                        <span>Вопросы и ответы</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pages-line"></i>
                        <span>Страницы</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">====Добавить страницу</a></li>
                        <li><a href="{{ route('admin.pages.info.index') }}">Информационные</a></li>
                        <li><a href="#">===Главная</a></li>
                        <li><a href="{{ route('admin.pages.contacts.index') }}">Контакты</a></li>
                    </ul>
                </li>

                <li class="menu-title">Настройки</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Пользователи</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">======</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-folder-settings-line"></i>
                        <span>Настройки</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">===Значения</a></li>
                        <li><a href="{{ route('admin.settings.menu.index') }}">Меню</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
