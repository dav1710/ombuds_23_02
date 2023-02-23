@extends('layouts.app')
@section('title')
    Media
@endsection

@section('content')
<div class="scroll_header" id="media">
    <ul class="nav nav-tabs container d-flex flex-row justify-content-evenly scroll_nav media_center" id="myTab"
        role="tablist">
        <li class="nav-item nav_media_item" role="presentation">
            <a href="{{ route('media') }}" class="media_news nav-link custom_list_group_action media_center_btn {{ Request::is('media') ? 'active' : '' }}">{{ __('main.news') }}</a>
        </li>
        <li class="nav-item nav_media_item" role="presentation">
            <a href="{{ route('media_interview') }}" class="nav-link custom_list_group_action media_center_btn {{ Request::is('media_interviews') ? 'active' : '' }}">{{ __('main.interviews_speeches') }}</a>
        </li>
        <li class="nav-item nav_media_item" role="presentation">
            <a href="{{ route('media_videos') }}" class="nav-link custom_list_group_action media_center_btn {{ Request::is('media_videos') ? 'active' : '' }}">{{ __('main.videos') }}</a>
        </li>
        <li class="nav-item nav_media_item" role="presentation">
            <a href="{{ route('media_announcements') }}" class="nav-link custom_list_group_action media_center_btn {{ Request::is('media_announcements') ? 'active' : '' }}">{{ __('main.announcements') }}</a>
        </li>
        <li class="nav-item nav_media_item" role="presentation">
            <a href="{{ route('media_stories') }}" class="nav-link custom_list_group_action media_center_btn {{ Request::is('media_stories') ? 'active' : '' }}">{{ __('main.success_stories') }}</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="container_section media_container_section">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.videos') }}</p>
            </div>
        </div>
        <div class="directions_applications">
            <div>
                <form action="{{ route('searchMediaVideos') }}" method="get" class="news_search_block">
                    <div id="search-block" class="vertical-center">
                        <div id="search-form">
                            <a href="">
                                <img src="{{ asset('img/search.png') }}">
                            </a>
                            <input type="text" class="" name="search_word" id="search-key"
                                placeholder="{{ __('main.search') }}"
                                onfocus="if (this.placeholder == '{{ __('main.search') }}') {this.placeholder = '';}"
                                onblur="if (this.placeholder == '') {this.placeholder = '{{ __('main.search') }}';}">
                        </div>
                    </div>
                    <div class="news_search_form">
                        <div class="news_search_form_block_1 d-flex">
                            <img src="{{ asset('img/calendar_white.png') }}">
                            <span>{{ __('main.archive') }}</span>
                        </div>

                        <div class="news_search_form_block_2 d-flex">
                            <input type="date"
                                value="{{ Request::get('date_start') ? Request::get('date_start') : date('Y-m-d', strtotime(date('Y-m-d') .' -1 month'))}}"
                                name="date_start" id="date_start" min="2014-10-31" max="{{ date('Y-m-d') }}">

                            <span>{{ __('main.to_date') }}</span>
                            <input type="date"
                                value="{{ Request::get('date_end') ? Request::get('date_end') : date('Y-m-d') }}"
                                name="date_end" id="date_end" max="{{ date('Y-m-d') }}">
                        </div>

                        <button type="submit" name="search">
                            <img src="{{ asset('img/search.png') }}">
                            <span>{{ __('main.search') }}</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="news-cards mb-5">
                @foreach ($query_videos as $item)
                                <a href="{{ route('news') . '/' . $item->id }}">
                                    <div class="card news-card">
                                        @if ($item['file_am'] || $item['file_en'])
                                            <img src="{{ asset('uploads/news/' .  $item->file(app()->getLocale())) }}"
                                                class="card-img-top news-card-img-top" alt="...">
                                        @else
                                            {!! $item->content_am !!}
                                        @endif
                                        <div class="card-body news-card-body">
                                            <p class="card-text news-card-text">
                                                {{ $item->{'title_' . app()->getLocale()} }}
                                            </p>
                                            <div class="news-card-date">
                                                <img src="{{ asset('img/calendar.png') }}" alt="calendar">
                                                <p>{{ $item->created_at->format('d-m-Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                @endforeach
            </div>
            <div class="pagination_news d-flex justify-content-center">
                {!! $query_videos->appends(Request::except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
