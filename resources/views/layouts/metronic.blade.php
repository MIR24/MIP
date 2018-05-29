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
            Metronic | Dashboard
        </title>
        <meta name="description" content="Latest updates and statistic charts">
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
        <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/demo/demo2/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="assets/demo/demo2/media/img/logo/favicon.ico" />
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- begin::Header -->
            <header id="m_header" class="m-grid__item m-header "  minimize="minimize" minimize-offset="200" minimize-mobile-offset="200" >
                <div class="m-header__top">
                    <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                        <div class="m-stack m-stack--ver m-stack--desktop">
                            <!-- begin::Brand -->
                            <div class="m-stack__item m-brand">
                                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                        <a href="index.html" class="m-brand__logo-wrapper">
                                            <img alt="" src="assets/demo/demo2/media/img/logo/logo.png"/>
                                        </a>
                                    </div>
                                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
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
                                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                    <span class="m-topbar__userpic m--hide">
                                                        <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                    </span>
                                                    <span class="m-topbar__welcome">
                                                        Hello,&nbsp;
                                                    </span>
                                                    <span class="m-topbar__username">
                                                        Nick
                                                    </span>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                            <div class="m-card-user m-card-user--skin-dark">
                                                                <div class="m-card-user__pic">
                                                                    <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                                </div>
                                                                <div class="m-card-user__details">
                                                                    <span class="m-card-user__name m--font-weight-500">
                                                                        Mark Andre
                                                                    </span>
                                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                        mark.andre@gmail.com
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav m-nav--skin-light">
                                                                    <li class="m-nav__section m--hide">
                                                                        <span class="m-nav__section-text">
                                                                            Section
                                                                        </span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="snippets/pages/user/login-1.html" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                            Logout
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            <!-- begin::Modal Create Topic -->
            <div class="modal fade" id="m_modal_create_topic" tabindex="-1" role="dialog" aria-labelledby="topic-create" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="topic-create">Новый сюжет</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="topic-name" class="form-control-label">Название</label>
                                    <input type="text" class="form-control" id="topic-name">
                                </div>
                                <div class="form-group">
                                    <label for="topic-description-small" class="form-control-label">Краткое описание сюжета</label>
                                    <input type="text" class="form-control" id="topic-description-small">
                                </div>
                                <div class="form-group">
                                    <label for="topic-description-large" class="form-control-label">Полное описание сюжета</label>
                                    <textarea class="form-control" id="topic-description-large" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="topic-url" class="form-control-label">Ссылка на сюжет</label>
                                    <input type="text" class="form-control" id="topic-url">
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-1 col-sm-12">Превью</label>
                                    <div class="col-lg-11 col-md-9 col-sm-12">
                                        <div class="m-dropzone dropzone dz-clickable" action="#" id="m-dropzone-one">
                                            <div class="m-dropzone__msg dz-message needsclick">
                                                <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                                <span class="m-dropzone__msg-desc">This is just a demo dropzone. Selected files are actually uploaded.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="topic-publication-date" class="col-2 col-form-label">Дата публикации</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" id="topic-publication-date">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="button" class="btn btn-primary">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Modal Create Topic -->
            <!-- begin::Modal Show Topic -->
            <div class="modal fade" id="m_modal_show_topic" tabindex="-1" role="dialog" aria-labelledby="topic-show" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="topic-show">Название сюжета</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Описание сюжета</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <h5>Видео</h5>
                            <video class="col-lg-12 col-md-12 col-sm-12" controls>
                                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Modal Show Topic -->
            <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop    m-container m-container--responsive m-container--xxl m-page__container m-body">
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <div class="m-content">
                        @yield('content')
                    </div>
                </div>
                <!--
            </div>
            -->
        </div>
        <!-- end::Body -->
        <!-- begin::Footer -->
        <footer class="m-grid__item m-footer ">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="m-footer__wrapper">
                    <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                            <span class="m-footer__copyright">
                                2018 &copy;
                                <a href="https://mir24.tv" class="m-link">
                                    МИР
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->
        <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    <!--begin::Base Scripts -->
    <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="assets/demo/demo2/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Vendors -->
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->
    <!--begin::Page Snippets -->
    <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
    <!--end::Page Snippets -->
    @stack('scripts')
</body>
<!-- end::Body -->
</html>
