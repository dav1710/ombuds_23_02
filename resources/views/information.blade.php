@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection
@section('title')
    Information Availability
@endsection

@section('content')
    <div class="info-tab-pane tab-pane container_section fade show active" id="section0" role="tabpanel"
        aria-labelledby="section0-tab">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.access_information') }}</p>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center directions_applications">
            @foreach ($pages as $item)
                @if ($item->page == 'information')
                    <div class="audio-player">
                        <audio controls controlsList="nodownload noplaybackrate">
                            <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am) }}" type="audio/mpeg">
                            Your Browser Does Not Support the radio.
                        </audio>
                    </div>
                    <div class="audio-player mb-4">
                        <audio controls controlsList="nodownload noplaybackrate">
                            <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_en) }}" type="audio/mpeg">
                            Your Browser Does Not Support the radio.
                        </audio>
                    </div>
                    <div class="soldier_rights_text mb-3">{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</div>
                @endif
            @endforeach
            <div class="soldier_rights_text mb-3">{!! $text_1 !!}</div>
            <div class="soldier_rights_text mb-3">{!! $text_2 !!}</div>
            <div class="soldier_rights_text mb-3">{!! $text_3 !!}</div>
            <div class="soldier_rights_text mb-3">{!! $text_4 !!}</div>
            <div class="soldier_rights_text mb-5">{!! $text_5 !!}</div>
        </div>
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'information')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>
                
            @endif
        @endforeach
    @endforeach
@endsection
