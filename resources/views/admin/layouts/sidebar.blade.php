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
                        <span>Обратный звонок</span>
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
                        <li><a href="{{ route('admin.competitions.types.index') }}">Типы</a></li>
                        <li><a href="{{ route('admin.competitions.age_group.index') }}">Возрастные группы</a></li>
                        <li><a href="{{ route('admin.competitions.all.create') }}">Создать новый</a></li>
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
                        <li><a href="#">Добавить страницу</a></li>
                        <li><a href="{{ route('admin.pages.info.index') }}">Все</a></li>
                        <li><a href="#">Главная</a></li>
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
                        <li><a href="#">Значения</a></li>
                        <li><a href="{{ route('admin.settings.menu.index') }}">Меню</a></li>
                    </ul>
                </li>

                {{--<li class="menu-title">@lang('translation.Components')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>@lang('translation.UI_Elements')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts">@lang('translation.Alerts')</a></li>
                        <li><a href="ui-buttons">@lang('translation.Buttons')</a></li>
                        <li><a href="ui-cards">@lang('translation.Cards')</a></li>
                        <li><a href="ui-carousel">@lang('translation.Carousel')</a></li>
                        <li><a href="ui-dropdowns">@lang('translation.Dropdowns')</a></li>
                        <li><a href="ui-grid">@lang('translation.Grid')</a></li>
                        <li><a href="ui-images">@lang('translation.Images')</a></li>
                        <li><a href="ui-lightbox">@lang('translation.Lightbox')</a></li>
                        <li><a href="ui-modals">@lang('translation.Modals')</a></li>
                        <li><a href="ui-rangeslider">@lang('translation.Range_Slider')</a></li>
                        <li><a href="ui-roundslider">@lang('translation.Round_Slider')</a></li>
                        <li><a href="ui-session-timeout">@lang('translation.Session_Timeout')</a></li>
                        <li><a href="ui-progressbars">@lang('translation.Progress_Bars')</a></li>
                        <li><a href="ui-sweet-alert">@lang('translation.Sweet_Alerts')</a></li>
                        <li><a href="ui-tabs-accordions">@lang('translation.Tabs_Accordions')</a></li>
                        <li><a href="ui-typography">@lang('translation.Typography')</a></li>
                        <li><a href="ui-video">@lang('translation.Video')</a></li>
                        <li><a href="ui-general">@lang('translation.General')</a></li>
                        <li><a href="ui-rating">@lang('translation.Rating')</a></li>
                        <li><a href="ui-notifications">@lang('translation.Notifications')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge badge-pill badge-danger float-right">6</span>
                        <span>@lang('translation.Forms')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements">@lang('translation.Elements')</a></li>
                        <li><a href="form-validation">@lang('translation.Validation')</a></li>
                        <li><a href="form-advanced">@lang('translation.Advanced_Plugins')</a></li>
                        <li><a href="form-editors">@lang('translation.Editors')</a></li>
                        <li><a href="form-uploads">@lang('translation.File_Upload')</a></li>
                        <li><a href="form-xeditable">@lang('translation.X_editable')</a></li>
                        <li><a href="form-wizard">@lang('translation.Wizard')</a></li>
                        <li><a href="form-mask">@lang('translation.Mask')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>@lang('translation.Tables')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic">@lang('translation.Basic_Tables')</a></li>
                        <li><a href="tables-datatable">@lang('translation.Data_Tables')</a></li>
                        <li><a href="tables-responsive">@lang('translation.Responsive_Table')</a></li>
                        <li><a href="tables-editable">@lang('translation.Editable_Table')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>@lang('translation.Charts')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex">@lang('translation.Apexcharts')</a></li>
                        <li><a href="charts-chartjs">@lang('translation.Chartjs')</a></li>
                        <li><a href="charts-flot">@lang('translation.Flot')</a></li>
                        <li><a href="charts-knob">@lang('translation.Jquery_Knob')</a></li>
                        <li><a href="charts-sparkline">@lang('translation.Sparkline')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>@lang('translation.Icons')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix">@lang('translation.Remix_Icons')</a></li>
                        <li><a href="icons-materialdesign">@lang('translation.Material Design')</a></li>
                        <li><a href="icons-dripicons">@lang('translation.Dripicons')</a></li>
                        <li><a href="icons-fontawesome">@lang('translation.Font_awesome_5')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>@lang('translation.Maps')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google">@lang('translation.Google_Maps')</a></li>
                        <li><a href="maps-vector">@lang('translation.Vector_Maps')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>@lang('translation.Multi_Level')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);"@lang('translation.Level_1.1')></a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>--}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
