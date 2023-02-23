<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">
    <link rel="shortcut icon" href="{{ asset('img/ombuds_logo.png') }}" type="image/x-icon">
    <link href="{{ asset('css/style.css?v=' . date('YmdHis')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery/lg-zoom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery/lg-thumbnail.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery/lightgallery-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" crossorigin="" />

    @yield('styles')

    <title>@yield('title')</title>
</head>

<body>
    <div class="load">
        <hr/><hr/><hr/><hr/>
    </div>

    <header>
		<div class="preferences d-flex justify-content-between align-items-center">
        <div class="preferences-inner d-flex">
            <button id="preferences" onclick="preferences()">
                <img src="{{ asset('img/icons/wheelchair.png') }}" alt="preferences">
            </button>
            <button  class="prefInvis">
                <img src="{{ asset('img/icons/black_theme.png') }}" alt="black theme">
            </button>
            <button class="prefInvis">
                <img src="{{ asset('img/icons/gray_theme.png') }}" alt="gray theme">
            </button>
            <button id="style_negative" class="prefInvis">
                <img src="{{ asset('img/icons/eye.png') }}" alt="visibility">
            </button>
            <button id="font_tahoma" class="prefInvis">
                <img src="{{ asset('img/icons/font_style.png') }}" alt="font style">
            </button>
            <button id="font_armenian" class="prefInvis">
                <img src="{{ asset('img/icons/text_size.png') }}" alt="text size">
            </button>
            <button id="revert" class="prefInvis" onclick="revert()">
                <img src="{{ asset('img/icons/revert.png') }}" alt="revert">
            </button>
        </div>
		<div class="position-relative">
                    <button id="current-language" onclick="language(this)" class="lang-item">
                        <span
                            class="vertical-center">{{ app()->getLocale() == 'am' ? __('main.armenian') : (app()->getLocale() == 'ru' ? __('main.russian') : __('main.english')) }}</span>
                        <img src="{{ asset('img/lang_arrow.png') }}" id="lang-arrow" class="vertical-center">
                    </button>
                    <div id="droped-languages">
                        <button href="{{ app()->getLocale() == 'am' ? 'javascript:void(0)' : asset('locale/am') }}"
                            class="lang-item">
                            <span class="vertical-center">{{ __('main.armenian') }}</span>
                            @if (app()->getLocale() == 'am')
                                <img src="{{ asset('img/lang_tick.png') }}" class="chosen-language vertical-center">
                            @endif
                        </button>
                        <button href="{{ app()->getLocale() == 'en' ? 'javascript:void(0)' : asset('locale/en') }}"
                            class="lang-item">
                            <span class="vertical-center">{{ __('main.english') }}</span>
                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('img/lang_tick.png') }}" class="chosen-language vertical-center">
                            @endif
                        </button>
                    </div>
                </div>
			</div>

        <div class="header-lg">
            <div class="header_one">
                <div class="hot_line_content">
                    <button onclick="hot_line(this)" class="hot_line">
                        <img src="{{ asset('img/hot-line.png') }}">
                        <h2 class="text-light m-0">{{ $link['hot_line'] }}</h2>
                    </button>

                    <div class="hot_line_new">
                        <a href="#"><img src="{{ asset('img/icons/hot_line_call.png') }}"></a>
                        <a href="{{ route('contactUs') . '#main' }}"><img src="{{ asset('img/icons/hot_line_message.png') }}"></a>
                    </div>
                    <div class="messanger">
                        <a href="{{ $link['messenger'] }}" target="_blank">
                            <img src="{{ asset('img/messanger.png') }}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="header_two">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/crest.png') }}">
                </a>
                <h4>
                    {!! mb_strtoupper(__('main.title_main')) !!}
                </h4>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/ombuds_logo.png') }}">
                </a>


            </div>
            <div class="header_three">
                <div class="position-relative big_lang_block">
                    <button onclick="language(this)" id="current-language" class="lang-item">
                        <span
                            class="vertical-center">{{ app()->getLocale() == 'am' ? __('main.armenian') : (app()->getLocale() == 'ru' ? __('main.russian') : __('main.english')) }}</span>
                        <img src="{{ asset('img/lang_arrow.png') }}" id="lang-arrow" class="vertical-center">
                    </button>
                    <div id="droped-languages">
                        <button href="{{ app()->getLocale() == 'am' ? 'javascript:void(0)' : asset('locale/am') }}"
                            class="lang-item">
                            <span class="vertical-center">{{ __('main.armenian') }}</span>
                            @if (app()->getLocale() == 'am')
                                <img src="{{ asset('img/lang_tick.png') }}" class="chosen-language vertical-center">
                            @endif
                        </button>
                        <button href="{{ app()->getLocale() == 'en' ? 'javascript:void(0)' : asset('locale/en') }}"
                            class="lang-item">
                            <span class="vertical-center">{{ __('main.english') }}</span>
                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('img/lang_tick.png') }}" class="chosen-language vertical-center">
                            @endif
                        </button>
                    </div>
                </div>
                <div id="search-block" class="vertical-center">
                    <form action="{{ route('search') }}"  method="get" class="d-flex" id="search-form">
                        <button class="border-0 bg-transparent" type="submit">
                            <img src="{{ asset('img/search.png') }}">
                        </button>
                        <input type="text" class="" name="search" id="search-key"
                            placeholder="{{ __('main.search') }}"
                            onfocus="if (this.placeholder == '{{ __('main.search') }}') {this.placeholder = '';}"
                            onblur="if (this.placeholder == '') {this.placeholder = '{{ __('main.search') }}';}"
                            required>
                    </form>
                </div>
            </div>
        </div>

        <div class="header-sm">
            <a class="logo-sm" href="{{ route('home') }}">
                <img src="{{ asset('img/ombuds_logo.png') }}">
            </a>
            <h4>
                {!! __('main.title_main') !!}
            </h4>
        </div>
        <nav>
			<div class="d-flex align-self-stretch">


                <div id="search-block-sm" class="vertical-center">
                    <button onclick="toggle_search()">
                        <img src="{{ asset('img/search_black.png') }}">
                    </button>

                    <form action="{{ route('search') }}"  method="get" class="align-items-center align-self-stretch"
                        id="search-form-sm">
                        <input type="text" name="search" id="search-key" placeholder="{{ __('main.search') }}"
                            onfocus="if (this.placeholder == '{{ __('main.search') }}') {this.placeholder = '';}"
                            onblur="if (this.placeholder == '') {this.placeholder = '{{ __('main.search') }}';}"
                            required>
                        <button type="submit">
                            <img src="{{ asset('img/search_black.png') }}" alt="search">
                        </button>
                    </form>
                </div>

            </div>

            <div class="link-item vertical-center">
                <a class="nav_link {{ Request::is('apply') ? 'active_nav' : '' }}"
                    href="{{ route('contactUs') . '#main' }}" data-type="contact">
                    {{ mb_strtoupper(__('main.apply_to_defender')) }}
                </a>
            </div>
            <div class="link-item vertical-center">
                <a class="nav_link {{ Request::is('directions') ? 'active_nav' : '' }}"
                    href="{{ route('directions') . '#applications_complaints' }}" data-type="contact">
                    {{ mb_strtoupper(__('main.working_directions')) }}
                </a>
            </div>
            <div class="link-item vertical-center">
                <a class="nav_link {{ Request::is('reports') ? 'active_nav' : '' }}" href="{{ route('reports') . '#yearly_reports' }}"
                    data-type="contact">
                    {{ mb_strtoupper(__('main.annual_hoc_reports')) }}
                </a>
            </div>
            <div class="link-item vertical-center">
                <a class="nav_link {{ Request::is('courses') ? 'active_nav' : '' }}" href="{{ route('courses') . '#education_awareness'}}"
                    data-type="contact">
                    {{ mb_strtoupper(__('main.education_awarness')) }}
                </a>
            </div>
			<div class="d-flex align-items-center hot_line_wrapper px-1" style="gap:10px">
				<div class="header-sm-links d-flex">
		            <button onclick="hot_line(this)" class="hot_line">
		                <img src="{{ asset('img/hot-line.png') }}">
		                <h2 class="text-light m-0">{{ $link['hot_line'] }}</h2>
		            </button>

		            <div class="hot_line_new">
		                <a href="#"><img src="{{ asset('img/icons/hot_line_call.png') }}"></a>
		            	<a href="{{ route('contactUs') . '#main' }}"><img src="{{ asset('img/icons/hot_line_message.png') }}"></a>
		            </div>
		        </div>
                <div class="a-header" @if (Route::current()->getName() != 'home') style="display:flex" @endif>
                    <input type="checkbox" name="main-nav" id="main-nav" class="burger-check">
                    <label for="main-nav" class="burger menu"><span></span></label>
                    <ul>
                        <li class="hidden_link"><a class="{{ Request::is('contactUs') ? 'active_nav' : '' }}"
                                href="{{ route('contactUs') . '#main' }}">{{ mb_strtoupper(__('main.apply_to_defender')) }}</a></li>
                        <li class="hidden_link"><a class="{{ Request::is('directions') ? 'active_nav' : '' }}"
                                href="{{ route('directions') . '#applications_complaints' }}"
                                class="active">{{ mb_strtoupper(__('main.working_directions')) }}</a></li>
                        <li class="hidden_link"><a class="{{ Request::is('reports') ? 'active_nav' : '' }}"
                                href="{{ route('reports') . '#yearly_reports' }}">{{ mb_strtoupper(__('main.annual_hoc_reports')) }}</a></li>
                        <li class="hidden_link"><a class="{{ Request::is('courses') ? 'active_nav' : '' }}"
                                href="{{ route('courses') . '#education_awareness'}}">{{ mb_strtoupper(__('main.education_awarness')) }}</a></li>
                        <li><a class="home_hidden_link {{ Request::is('cooperation') ? 'active_nav' : '' }}"
                                href="{{ route('cooperation.membership') }}">{{ mb_strtoupper(__('main.international_cooperation')) }}</a></li>
                        <li><a class="home_hidden_link {{ Request::is('media') ? 'active_nav' : '' }}"
                                href="{{ route('media') }}" class="active">{{ mb_strtoupper(__('main.media_center')) }}</a></li>
                        <li><a class="home_hidden_link {{ Request::is('about') ? 'active_nav' : '' }}"
                                href="{{ route('about') . '#defender#biography' }}">{{ mb_strtoupper(__('main.about_us')) }}</a></li>
                    </ul>
                </div>

                @if (Route::current()->getName() == 'home')
                    <style>
                        @media screen and (min-width: 930px) {
                            .a-header {
                                display: none;
                            }
                        }
                    </style>
                @endif
            </div>



        </nav>
    </header>

    <div id="content-block">
        <div id="content">
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="footer">
            <div class="leaflet_map">
                <div id="map"></div>
            </div>
            <div class="footer_content">
                <div class="footer-blocks">
                    <div class="leaflet_map">
                        <div id="map_sm"></div>
                    </div>
                    <div id="left-block">
                        <div class="left-blocks-1">
                            <div class="left-block-item">
                                <a class="footer_links" href="#">
                                    <img src="{{ asset('img/icons/phone.png') }}" class="vertical-center">
                                    <span class="vertical-center">
                                        {{ $link->{'phone_' . app()->getLocale() } ? $link->{'phone_' . app()->getLocale() } : $link->phone_am }}
                                    </span>
                                <img src="{{ asset('img/icons/whatsapp.png') }}" alt="whatsapp">
                                <img src="{{ asset('img/icons/viber.png') }}" alt="viber">
                                </a>
                            </div>
                            <div class="left-block-item">
                                <a class="footer_links" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&to={{ $link['mail'] }}" target="_blank">
                                <img src="{{ asset('img/icons/mail.png') }}" class="vertical-center">
                                <span class="vertical-center">{{ $link['mail'] }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="left-blocks-2">

                            <div class="left-block-item">
                                <a class="footer_links" href="{{ $link['web'] }}" target="_blank">
                                <img src="{{ asset('img/icons/web.png') }}" class="vertical-center">
                                <span class="vertical-center">{{ $link['web_name'] }}</span>
                                </a>
                            </div>
                            <div class="left-block-item" id="location-block">
                                <a class="footer_links" href="{{ $link['location'] }}" target="_blank">
                                <img src="{{ asset('img/icons/location.png') }}" class="vertical-center"
                                    id="location-image">
                                <span class="vertical-center">{{ $link->{'location_' . app()->getLocale() } ? $link->{'location_' . app()->getLocale() } : $link->location_am }}</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div id="right-block">
                        <div class="social_block_1">
                            <div class="social_media_1">
                                <a href="{{ $link['facebook'] }}" id="subscribe-block-telegram" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons/facebook.png') }}">
                                    <span style="margin-left: 15px">Facebook</span>
                                </a>
                                <a href="{{ $link['instagram'] }}" id="subscribe-block-facebook" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons/insta.png') }}">
                                    <span>Instagram</span>
                                </a>
                            </div>
                            <div class="social_media_2">
                                <a href="{{ $link['twitter'] }}" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons/twitter.png') }}">
                                    <span>Twitter</span>
                                </a>
                                <a href="{{ $link['messenger'] }}" class="subscribe-block messanger_footer" target="_blank">
                                    <img src="{{ asset('img/icons/messanger.png') }}">
                                    <span>Messenger</span>
                                </a>
                            </div>
                        </div>
                        <div class="social_block_2">
                            <div class="social_media_3">
                                <a href="{{ $link['e-gov'] }}" class="subscribe-block" style="float: right;" target="_blank">
                                    <img src="{{ asset('img/icons/egov.png') }}">
                                </a>
                            </div>
                            <div class="social_media_3">
                                <a href="{{ $link['e-request'] }}" class="subscribe-block" style="float: right;" target="_blank">
                                    <img src="{{ asset('img/icons/e_mail.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="copyright-and-powered-block">
                    <span style="font-family: segoe;">&copy; All rights reserved</span>
                    <span>
                        <a href="https://www.locator.am/" target="_blank">
                            Created by Locator CJSC
                        </a>
                    </span>
                </div>
            </div>
            <div class="footer_content_sm">
                <div class="footer-blocks footer-blocks_small">
                    <div class="leaflet_map">
                        <div id="map_small"></div>
                    </div>
                    <div id="right-block">
                        <div class="top_short_links">
                        <div class="left_block">
                            <div class="left-block-item">
                                <a class="footer_links" href="#" >
                                    <img src="{{ asset('img/icons_sm/phone.png') }}" class="vertical-center">
                                </a>
                            </div>
                            <div class="left-block-item">
                                <a class="footer_links" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&to={{ $link['mail'] }}" target="_blank">
                                    <img src="{{ asset('img/icons_sm/mail.png') }}" class="vertical-center">
                                </a>
                            </div>
                            <div class="left-block-item">
                                <a class="footer_links" href="{{ $link['telegram'] }}" target="_blank">
                                	<img src="{{ asset('img/icons_sm/telegram.png') }}" class="vertical-center">
								</a>
                            </div>
                            <div class="left-block-item" id="location-block">
                                <a class="footer_links" href="{{ $link['location'] }}" target="_blank">
                                    <img src="{{ asset('img/icons_sm/location.png') }}" class="vertical-center"
                                        id="location-image">
                                </a>
                            </div>
                        </div>
                        <div class="social_block_1">
                                <a href="{{ $link['telegram'] }}" id="subscribe-block-telegram" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons_sm/facebook.png') }}">
                                </a>
                                <a href="{{ $link['instagram'] }}" id="subscribe-block-facebook" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons_sm/instagram.png') }}">
                                </a>
                                <a href="{{ $link['twitter'] }}" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons_sm/twitter.png') }}">
                                </a>
                                <a href="{{ $link['messenger'] }}" class="subscribe-block" target="_blank">
                                    <img src="{{ asset('img/icons_sm/messanger.png') }}">
                                </a>
                        </div>
                        </div>
                        <div class="social_block_2">
                            <div class="social_media_3">
                                <a href="{{ $link['e-gov'] }}" class="subscribe-block bottom_icons" style="float: right;" target="_blank">
                                    <img src="{{ asset('img/icons/egov.png') }}">
                                </a>
                            </div>
                            <div class="social_media_3">
                                <a href="{{ $link['e-request'] }}" class="subscribe-block bottom_icons" style="float: right;" target="_blank">
                                    <img src="{{ asset('img/icons/e_mail.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="copyright-and-powered-block">
                    <span style="font-family: segoe;">&copy; All rights reserved</span>
                    <span>
                        <a href="https://www.locator.am/" target="_blank">
                            Created by Locator CJSC
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </footer>

	<div class="p-3 cookie_block">
		Կայքի բարելավման համար օգտագործվում են cookie-ներ 🍪 <br>
		<button onclick="cookie_close()" class="btn-close"></button>
	</div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/redirects.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('leaflet/leaflet.js') }}" crossorigin=""></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/cookie.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        let cookies = "{{ Cookie::get('mode') }}";
        cookies ? check_cookies(cookies) : false;
    </script>

    @yield('scripts')
</body>

</html>
