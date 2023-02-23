@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
	<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection
@section('title')
    Statistics
@endsection

@section('styles')
	<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection

@section('content')
    <div class="tab-pane decisions-tab container_section fade show">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.statistics') }}</p>
            </div>
        </div>
        <div class="directions_applications">
			<div>
				<h4 style="margin-bottom: 30px;">{!! $item->{'info_' . app()->getLocale() } ? $item->{'info_' . app()->getLocale() } : $item->info_am !!}</h4>

			</div>
			<div class="news_content news_content_statistics">
                {!! $statistics->link !!}
			</div>
			<a class="news_return_link" href="{{ URL::previous() }}">Վերադառնալ ցուցակին <img src="{{ asset('img/icons/link_arrow.png') }}"></a>
        </div>
    </div>
@endsection
