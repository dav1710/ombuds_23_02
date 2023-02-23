@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
	<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection
@section('title')
    Direction
@endsection

@section('content')
    <div class="scroll_header soldier_rights">
        <ul class="nav nav-tabs container d-flex flex-row justify-content-evenly scroll_nav contact_us" id="myTab"
            role="tablist">
            <li class="nav-item" role="presentation">
                <button class="directions_applications_complaints nav-link custom_list_group_action  active" id="section1-tab" data-bs-toggle="tab"
                    data-bs-target="#section1" type="button" role="tab" aria-controls="section1"
                    aria-selected="true">{{ __('main.applications_complaints') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="directions_monitoring nav-link custom_list_group_action big_list_tab play_audio" id="section2-tab"
                    data-bs-toggle="tab" data-bs-target="#section2" type="button" role="tab" aria-controls="section2"
                    aria-selected="false">{{ __('main.individual_visits') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.applications_complaints') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications directions_p">
                    @foreach ($staticTexts as $text)
                        @if ($text->page == 'directions_applications')
                            <p>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container_section fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.individual_visits') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications directions_p">
                    @foreach ($pages as $text)
                        @if ($text->page == 'directions_monitoring')
                            <div class="audio-player">
                                <audio controls controlsList="nodownload noplaybackrate">
                                    <source src="{{ asset('uploads/pages/' . $text->file_am) }}" type="audio/mpeg">
                                    Your Browser Does Not Support the radio.
                                </audio>
                            </div>
                            <div class="audio-player">
                                <audio controls controlsList="nodownload noplaybackrate">
                                    <source src="{{ asset('uploads/pages/' . $text->file_en) }}" type="audio/mpeg">
                                    Your Browser Does Not Support the radio.
                                </audio>
                            </div>
                            <div>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</div>
                            <div class="report_news d-flex flex-column">
                                @php $extension = substr($text->document_am, strrpos($text->document_am, '.') + 1, strlen($text->document_am)) @endphp
                                <a class="report_pdf report_pdf_news"
                                    href="{{ asset('uploads/pages/' . ($text->{'document_' . app()->getLocale() } ? $text->{'document_' . app()->getLocale() } : $text->document_am)) }}" class="mb-3"
                                    download="{{ $text->{'document_title_' . app()->getLocale() } ? $text->{'document_title_' . app()->getLocale() } : $text->document_title_am  . '.' . $extension }}">
                                    <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                        alt="{{ $extension }}">{{ $text->{'document_title_' . app()->getLocale() } ? $text->{'document_title_' . app()->getLocale() } : $text->document_title_am  }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'directions_applications')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>

            @endif
        @endforeach
    @endforeach
@endsection





@section('scripts')
    <script src="{{ asset('js/font_awesome/all.min.js') }}"></script>
@endsection
