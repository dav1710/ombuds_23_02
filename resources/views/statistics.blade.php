@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
@endsection
@section('title')
    Statistics
@endsection

@section('content')
    <div class="statistics info-tab-pane tab-pane container_section">

        <div class="d-flex align-items-baseline directions_applications contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.statistics') }}</p>
            </div>
        </div>
        <div class="news-cards directions_applications mb-5">
            <a href="https://infogram.com/bar-stacked-chart-1h0n25yvme59z6p?live"></a>
            @foreach ($statistics as $item)
                <a href="{{ route('statistics') . '/' . $item->id }}">
                    <div class="card news-card">
                        <img src="{{ asset('uploads/statistics/' . $item['preview_image']) }}"
                            class="card-img-top news-card-img-top" alt="...">
                        <div class="card-body news-card-body">
                            <p class="card-text news-card-text">
                                {!! $item->{'info_' . app()->getLocale() } ? $item->{'info_' . app()->getLocale() } : $item->info_am !!}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
