@extends('layouts.app')
@section('title')
    Home
@endsection

@section('content')
    <div class="home_page">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
				@for ($i = 0; $i < count($slides); $i++)
					<li type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}"
                    class="slider_custom_button" aria-current="true" aria-label="Slide {{ $i }}"></li>
				@endfor
            </div>
            <div class="carousel-inner">
				@foreach ($slides as $slide)
                <div class="carousel-item">
                    <img src="{{ asset('uploads/slides/' . $slide->img) }}" class="d-block w-100 h-100" alt="...">
                    <div class="carousel_title carousel-caption d-md-block">
                        <h5>{{ $slide->{'title_' . app()->getLocale() } ? $slide->{'title_' . app()->getLocale() } : $slide->title_am }}</h5>
                    </div>
                </div>
				@endforeach
            </div>
        </div>
        <div class="container-fluid home_page_nav">
            <div class="home_nav_link">
                <a href="{{ route('cooperation.membership') }}" class="nav-link">{{ mb_strtoupper(__('main.international_cooperation')) }}</a>
            </div>
            <div class="home_nav_link">
                <a href="{{ route('media')}}" class="nav-link">{{ mb_strtoupper(__('main.media_center')) }}</a>
            </div>
            <div class="home_nav_link">
                <a href="{{ route('about') . '#defender#biography' }}" class="nav-link">{{ mb_strtoupper(__('main.about_us')) }}</a>
            </div>
        </div>
        <div class="home_news_wrapper d-flex justify-content-center align-items-center">
            <div class="home_news flex-wrap">
                <a href="{{ route('media')}}"  class="home_news_1 d-flex align-items-center">
                    <div class="home_news_1_1"></div>
                    <div class="home_news_1_2">
                        <p class="link">{{ mb_strtoupper(__('main.news')) }}</p>
                    </div>
                </a>
                <a href="{{ route('media_stories')}}" class="home_news_2 d-flex align-items-center">
                    <div class="home_news_2_1"></div>
                    <div class="home_news_2_2">
                        <p class="link">{{ mb_strtoupper(__('main.success_stories')) }}</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex align-items-baseline home_action">
            <div class="line"></div>
            <div class="home_action_title">
                <p>{{ mb_strtoupper(__('main.directions_activity')) }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-between action_directions">
            <div class="d-flex flex-column  action_directions_card action_card_1">
                <a href="{{ route('torture') . '#main' }}">
                    <div class="img-wrapper d-flex align-items-center"><img src="{{ asset('img/action_1.png') }}"
                            alt="action_1"></div>
                    <p class="action_directions_title action_title_1">{{ mb_strtoupper(__('main.torture_mechanism')) }}</p>
                </a>
            </div>
            <div class="d-flex flex-column  action_directions_card action_card_2">
                <a href="{{ route('soldier_rights') . '#main' }}">
                    <div class="img-wrapper d-flex align-items-center"><img src="{{ asset('img/action_2.png') }}"
                            alt="action_2"></div>
                    <p class="action_directions_title action_title_2">{{ mb_strtoupper(__('main.servicemen_rights')) }}</p>
                </a>
            </div>
            <div class="d-flex flex-column  action_directions_card action_card_3">
                <a href="{{ route('women_rights') . '#main' }}">
                    <div class="img-wrapper d-flex align-items-center"><img src="{{ asset('img/action_3.png') }}"
                            alt="action_3"></div>
                    <p class="action_directions_title action_title_3">{{ mb_strtoupper(__('main.womens_rights')) }}</p>
                </a>
            </div>
            <div class="d-flex flex-column  action_directions_card action_card_4">
                <a href="{{ route('child_rights') . '#main' }}">
                    <div class="img-wrapper d-flex align-items-center"><img src="{{ asset('img/action_4.png') }}"
                            alt="action_4"></div>
                    <p class="action_directions_title action_title_4">{{ mb_strtoupper(__('main.childs_rights')) }}</p>
                </a>
            </div>
            <div class="d-flex flex-column  action_directions_card action_card_5">
                <a href="{{ route('invalid_rights') . '#main' }}">
                    <div class="img-wrapper d-flex align-items-center"><img src="{{ asset('img/action_5.png') }}"
                            alt="action_5"></div>
                    <p class="action_directions_title action_title_5">{{ mb_strtoupper(__('main.invalid_rights')) }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-evenly action_directions_icons align-items-center mb-4">
        <a href="{{ route('reports') . '#applications_complaints' }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_1.png') }}" alt="action_icons_1">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.cc_applications')) }}</p>
            </div>
        </a>
        <a href="{{ route('statistics') }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_2.png') }}" alt="action_icons_2">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.statistics')) }}</p>
            </div>
        </a>
        <a href="{{ route('reports') . '#legislative' }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_3.png') }}" alt="action_icons_3">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.reports_suggestions')) }}</p>
            </div>
        </a>
        <a href="{{ route('business_rights') . '#main'}}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_4.png') }}" alt="action_icons_4">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.protection_rights')) }}</p>
            </div>
        </a>
        <a href="{{ route('about') . '#advice' }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_5.png') }}" alt="action_icons_5">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.advices_defender')) }}</p>
            </div>
        </a>
        <a href="{{ route('about') . '#international' }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_6.png') }}" alt="action_icons_6">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.conventional_statuses')) }}</p>
            </div>
        </a>
        <a href="{{ route('information') }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_7.png') }}" alt="action_icons_7">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.access_information')) }}</p>
            </div>
        </a>
        <a href="{{ route('decisions') }}">
            <div class="d-flex flex-column justify-content-evenly action_directions_icons_card">
                <img src="{{ asset('img/action_icons_8.png') }}" alt="action_icons_7">
                <p class="action_directions_icons_title">{{ mb_strtoupper(__('main.defender_decisions')) }}</p>
            </div>
        </a>
    </div>
    </div>
    <div class="popup p-5">
        <h3>{{ __('main.audio_welcome') }}</h3>
            <div class="d-flex justify-content-between">
                <ul class="list-unstyled">
                    <li>1. {{ __('main.open_close') }}</li>
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('contactUs') . '#main' }}">2. {{ __('main.apply_to_defender') }}</a></li>
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('directions') }}">3. {{ __('main.working_directions') }}</a></li>
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('reports') . '#yearly_reports' }}">4. {{ __('main.annual_hoc_reports') }}</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('courses') . '#education_awareness'}}">5. {{ __('main.education_awarness') }}</a></li>
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('cooperation.membership') }}">6. {{ __('main.international_cooperation') }}</a></li>
                    <li class="popup_item"><a class="popup_link"
                            href="{{ route('media')}}">7. {{ mb_strtoupper(__('main.media_center')) }}</a></li>
                    <li class="popup_item"><a class="popup_link" href="{{ route('about') . '#defender#biography' }}">8. {{ mb_strtoupper(__('main.about_us')) }}</a>
                    </li>
                </ul>
            </div>
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'home')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>

            @endif
        @endforeach
    @endforeach
@endsection
