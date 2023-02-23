@extends('layouts.app')
@section('title') Membership @endsection
@section('content')
    <div class="scroll_header">
        <ul class="nav nav-tabs container contact_us fixed-nav" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('cooperation.membership') }}" class="cooperation_membership nav-link custom_list_group_action {{ Request::is('cooperation/membership') ? 'active' : '' }}">{{ __('main.membership') }}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('cooperation.program') }}" class="cooperation_program nav-link custom_list_group_action big_list_tab {{ Request::is('cooperation/program') ? 'active' : '' }}">{{ __('main.software_partnership') }}</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.membership') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="news-cards mb-5">
                        @foreach ($news_membership as $item)
                                    @if($item->{'content_' . app()->getLocale()})
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
                                    @endif
                        @endforeach
                    </div>
                    <div class="pagination_news d-flex justify-content-center">
                        {!! $news_membership->appends(Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

	@foreach ($mediaFile as $item)
		@foreach ($item->tabs as $tab)
			@if($tab->name == 'cooperation_program')
				<audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>
			@endif
		@endforeach
	@endforeach
@endsection
