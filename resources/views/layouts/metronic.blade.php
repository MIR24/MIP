<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Международный информационный пул
        </title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Новостные сюжеты">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Open Sans:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <!--begin::Page Vendors -->
        <link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/demo/demo2/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <link href="{{ asset('/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('assets/demo/demo2/media/img/logo/favicon.ico') }}" />
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--root m-page">
            <!-- begin::Header -->
            <header id="m_header" class="m-grid__item m-header "  minimize="minimize" minimize-offset="200" minimize-mobile-offset="200" >
                <div class="m-header__top">
                    <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                        <div class="m-stack m-stack--ver m-stack--desktop">
                            <!-- begin::Brand -->
                            <div class="m-stack__item m-brand">
                                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                        <a href="/" class="m-brand__logo-wrapper">
                                            <img alt="" src="{{ asset('assets/demo/demo2/media/img/logo/logo.png') }}"/>
                                        </a>
                                    </div>
                                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                        @stack('menu')
                                        <!-- begin::Responsive Header Menu Toggler-->
                                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                            <span></span>
                                        </a>
                                        <!-- end::Responsive Header Menu Toggler-->
                                        <!-- begin::Topbar Toggler-->
                                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                            <i class="flaticon-more"></i>
                                        </a>
                                        <!--end::Topbar Toggler-->
                                    </div>
                                </div>
                            </div>
                            <!-- end::Brand -->
                            <!-- begin::Topbar -->
                            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                    <div class="m-stack__item m-topbar__nav-wrapper">
                                        <ul class="m-topbar__nav m-nav m-nav--inline">
                                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                                @guest
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                @else
                                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                    <span class="m-topbar__userpic m--hide">
                                                        <img src="{{ asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                    </span>
                                                    <span class="m-topbar__welcome">
                                                        Привет,&nbsp;
                                                    </span>
                                                    <span class="m-topbar__username">
                                                        @php $user = Auth::user() @endphp
                                                        {{ $user->name }}
                                                    </span>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                            <div class="m-card-user m-card-user--skin-dark">
                                                                <div class="m-card-user__pic">
                                                                    <img src="{{ asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless" alt=""/>
                                                                </div>
                                                                <div class="m-card-user__details">
                                                                    <span class="m-card-user__name m--font-weight-500">
                                                                        {{ $user->name }}
                                                                    </span>
                                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                        {{ $user->email }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav m-nav--skin-light">
                                                                    <li class="m-nav__section m--hide">
                                                                        <span class="m-nav__section-text">
                                                                            Секция
                                                                        </span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="{{ route('logout') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                                            {{ __('Logout') }}
                                                                        </a>
                                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endguest
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end::Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- end::Header -->
            <!-- begin::Body -->
            @stack('modals')
            <div class="m-grid__item m-grid__item--fluid m-wrapper m-body--custom">
                <div class="m-content">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- end::Body -->
    </div>
    <!-- end:: Page -->
    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    <!--begin::Base Scripts -->
    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/demo2/base/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Vendors -->
    <script src="{{ asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
    <!--end::Page Vendors -->
    <!--begin::Page Snippets -->
    <script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/core.js') }}"></script>
    <script src="{{ asset('/js/datepicker.min.js') }}"></script>
    <!--end::Page Snippets -->
    @stack('scripts')
</body>
<!-- end::Body -->
</html>
