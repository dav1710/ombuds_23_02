@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection
@section('title')
    {!! $news->{'title_' . app()->getLocale() } ? $news->{'title_' . app()->getLocale() } : $news->title_am !!}
@endsection


@section('content')
    <div class="tab-pane decisions-tab container_section fade show">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>Նորություններ</p>
            </div>
        </div>
        <div class="directions_applications">
            <div>
                <h4 style="margin-bottom: 30px;">{!! $news->{'title_' . app()->getLocale() } ? $news->{'title_' . app()->getLocale() } : $news->title_am !!}</h4>

            </div>
            @if ($news->audio_am || $news->audio_en)
                <div class="audio-player">
                    <audio controls controlsList="nodownload noplaybackrate">
                        <source src="{{ asset('uploads/news/' . $news->{'audio_' . app()->getLocale() } ? $news->{'audio_' . app()->getLocale() } : $news->audio_am) }}" type="audio/mpeg">
                        Your Browser Does Not Support the radio.
                    </audio>
                </div>
            @endif
            <div class="news-date">
                <img src="{{ asset('img/calendar.png') }}">
                <p>{{ $news->created_at->format('d.m.Y / H:i') }}</p>
            </div>
            <div class="news_content">
                <div class="news_content_header">
                    <div class="news_content_text mt-4">
                        @if ($news['file_am'] || $news['file_en'])
                        <div class="news-slider" align="left" >
                            <div id="lightgallery">
                                @foreach (json_decode($news->{'file_' . app()->getLocale() } ? $news->{'file_' . app()->getLocale() } : $news->file_am) as $img)
                                    <a href="{{ asset('uploads/news/' . $img) }}" data-lg-size="1024-800">
                                        <img class="rounded" alt="{!! $news->{'title_' . app()->getLocale() } ? $news->{'title_' . app()->getLocale() } : $news->title_am !!}" src="{{ asset('uploads/news/' . $img) }}">
                                    </a>
                                @endforeach
                            </div>
                            <button id="slide-left" style="display:none">
                                <img class="slideToLeft" src="{{ asset('img/icons/arrow_left.png') }}" alt="prev">
                            </button>
                            <button id="slide-right" style="display:none">
                                <img class="slideToRight" src="{{ asset('img/icons/arrow_right.png') }}" alt="next">
                            </button>
                        </div>
                        @endif
                        {!! $news->{'content_' . app()->getLocale() } ? $news->{'content_' . app()->getLocale() } : $news->content_am !!}
                    </div>
                </div>
                <div style="display: flow-root">
                <a class="news_return_link" style="float: right" href="{{ URL::previous() }}">
                    {{ __('main.return_list') }}
                    <img src="{{ asset('img/icons/link_arrow.png') }}">
                </a>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ asset('js/lightgallery/lightgallery.umd.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery/lightgallery.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery/lg-thumbnail.umd.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery/lg-zoom.umd.min.js') }}"></script>
        <script src="{{ asset('js/slider.js') }}"></script>

        <script type="text/javascript">
        $(".lg-close.lg-icon").click(function(){
    $(this).css("background-color", "yellow");
});
            lightGallery(document.getElementById('lightgallery'), {
                plugins: [lgZoom, lgThumbnail],
                licenseKey: 'GPLv3',
                speed: 500,
                download: false,
                share: false,
                zoom: false
            });
        </script>
    @endsection
