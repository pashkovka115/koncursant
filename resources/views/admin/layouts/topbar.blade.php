<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo-sm-dark.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-dark.png')}} " alt="" height="20">
                    </span>
                </a>

                <a href="{{url('index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo-sm-light.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/front/img/logo.svg')}}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <a target="_blank" href="/" type="button" class="btn btn-sm px-3 mt-3 font-size-24 header-item waves-effect">
                <i class="ri-eye-line"></i>
            </a>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/github.png')}}" alt="Github">
                                    <span>@lang('translation.GitHub')</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/bitbucket.png')}}" alt="bitbucket">
                                    <span>@lang('translation.Bitbucket')</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/dribbble.png')}}" alt="dribbble">
                                    <span>@lang('translation.Dribbble')</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/dropbox.png')}}" alt="dropbox">
                                    <span>@lang('translation.Dropbox')</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/mail_chimp.png')}}" alt="mail_chimp">
                                    <span>@lang('translation.Mail_Chimp')</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ URL::asset('/assets/images/brands/slack.png')}}" alt="slack">
                                    <span>@lang('translation.Slack')</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> @lang('translation.Notifications') </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> @lang('translation.View_All')</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="ri-shopping-cart-line"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">@lang('translation.Your_order_is_placed')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">@lang('translation.If_several_languages_coalesce _the_grammar')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> @lang('translation.min_ago')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg')}}"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">@lang('translation.It_will_seem_like_simplified_English')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> @lang('translation.hours_ago')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">@lang('translation.Your_item_is_shipped')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">@lang('translation.If_several_languages_coalesce_the_grammar')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> @lang('translation.min_ago')</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg')}}"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">@lang('translation.As_a_skeptical_Cambridge_friend_of_mine_occidental')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> @lang('translation.hours_ago')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> @lang('translation.View_More')..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('/assets/images/users/avatar-2.jpg')}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> @lang('translation.Profile')</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle mr-1"></i> @lang('translation.My_Wallet')</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> @lang('translation.Settings')</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i>@lang('translation.Lock_screen') </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> @lang('translation.Logout')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
