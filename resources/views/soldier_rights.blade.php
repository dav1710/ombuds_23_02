@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection
@section('title')
    Soldier Rights
@endsection

@section('content')
    <div class="soldier_rights position-relative">
        <ul class="nav nav-tabs contact_us container fixed-nav" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="soldier_rights_news nav-link custom_list_group_action" id="section1-tab" data-bs-toggle="tab"
                    data-bs-target="#section1" type="button" role="tab" aria-controls="section1"
                    aria-selected="true">{{ __('main.news') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="soldier_rights_documents nav-link custom_list_group_action" id="section2-tab" data-bs-toggle="tab"
                    data-bs-target="#section2" type="button" role="tab" aria-controls="section2"
                    aria-selected="false">{{ __('main.legal_documents') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="big_nav_tab" class="soldier_rights_advice nav-link custom_list_group_action" id="section3-tab" data-bs-toggle="tab"
                    data-bs-target="#section3" type="button" role="tab" aria-controls="section3"
                    aria-selected="false">{{ __('main.advices_defender') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section fade show active" id="section0" role="tabpanel"
                aria-labelledby="section0-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.servicemen_rights_long') }}</p>
                    </div>
                </div>

                <div class="d-flex flex-column directions_applications">
                    @foreach ($pages as $page)
                        @if ($page->page == 'soldier_rights_main')
                            @foreach ($page->getAttributes() as $attribute => $value)
                                @if (str_starts_with($attribute, 'file') && str_ends_with($attribute, '_am'))
                                    @php $extension = substr($value, strrpos($value, '.') + 1, strlen($value)) @endphp
                                    @if ($extension == 'mp3' || $extension == 'mp2')
                                        <div class="audio-player mb-4">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/pages/' . $value) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @elseif($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
                                        <img src="{{ asset('uploads/pages/' . $value) }}">
                                    @elseif($extension == 'mp4')
                                        <div class="video-player">
                                            <video class="w-100 border rounded" height=400 controls
                                                controlsList="nodownload noplaybackrate" disablepictureinpicture>
                                                <source src="{{ asset('uploads/pages/' . $value) }}" type="video/mp4">
                                                Your browser does not support the video.
                                            </video>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <div class="soldier_rights_text font_reset">{!! $page->{'content_' . app()->getLocale() } ? $page->{'content_' . app()->getLocale() } : $page->content_am !!}</div>
                        @endif
                    @endforeach
                    <div class="soldier_rights_text font_reset">{!! $text_1 !!}</div>
                    <div class="soldier_rights_text font_reset">{!! $text_2 !!}</div>
                    <div class="soldier_rights_text font_reset">{!! $text_3 !!}</div>
                    <div class="soldier_rights_text font_reset">{!! $text_4 !!}</div>
                    <div class="soldier_rights_text font_reset mb-5">{!! $text_5 !!}</div>
                </div>

            </div>

            <div class="tab-pane container_section fade" id="section1" role="tabpanel" aria-labelledby="section1-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.news') }}</p>
                    </div>
                </div>
                <div class="directions_applications news-cards mb-5">
                    @foreach ($news as $item)
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
                    {!! $news->appends(Request::except('page'))->links() !!}
                </div>
            </div>

            <div class="tab-pane container_section fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.legal_documents') }}</p>
                    </div>
                </div>

                <div class="directions_applications d-flex flex-column">
                    @foreach ($documents as $item)
                        @foreach ($item->tabs as $tab)
                            @if ($tab->name == 'torture_visits')
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                <div class="report_news d-flex flex-column">
                                    <a class="report_pdf report_pdf_news"
                                        href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                        download="{{ $item->title_am.'.'.$extension  }}">
                                        <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                            alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div class="tab-pane container_section fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.advices_defender') }}</p>
                    </div>
                </div>

                <div class="directions_applications">
                    @foreach ($pages as $page)
                        @if ($page->page == 'soldier_rights_advice')
                            @foreach ($page->getAttributes() as $attribute => $value)
                                @if (str_starts_with($attribute, 'file') && str_ends_with($attribute, '_am'))
                                    @php $extension = substr($value, strrpos($value, '.') + 1, strlen($value)) @endphp
                                    @if ($extension == 'mp3' || $extension == 'mp2')
                                        <div class="audio-player">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/pages/' . $value) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @elseif($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
                                        <img src="{{ asset('uploads/pages/' . $value) }}">
                                    @elseif($extension == 'mp4')
                                        <div class="video-player">
                                            <video class="w-100 border rounded" height=400 controls
                                                controlsList="nodownload noplaybackrate" disablepictureinpicture>
                                                <source src="{{ asset('uploads/pages/' . $value) }}" type="video/mp4">
                                                Your browser does not support the video.
                                            </video>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <div class="soldier_rights_title font_reset">{!! $page->title_am !!}</div>
                            <div class="soldier_rights_header_date d-flex">
                                <img src="{{ asset('img/calendar.png') }}" alt="calendar">
                                <p>{{ $page->created_at->format('d-m-Y') }}</p>
                            </div>
                            <div class="soldier_rights_text font_reset mb-3">{!! $page->{'content_' . app()->getLocale() } ? $page->{'content_' . app()->getLocale() } : $page->content_am !!}</div>
                        @endif
                    @endforeach
                    <div class="soldier_rights_text font_reset mb-3">{!! $text_6 !!}</div>
                    <div class="soldier_rights_text font_reset mb-3">{!! $text_7 !!}</div>
                    <div class="mb-4">{!! $text_8 !!}</div>
                    @foreach ($pages as $page)
                        @if ($page->page == 'soldier_rights_advice')
                        <div class="report_news d-flex flex-column">
                            @php $extension = substr($page->document_am, strrpos($page->document_am, '.') + 1, strlen($page->document_am)) @endphp
                            <a class="report_pdf report_pdf_news"
                                href="{{ asset('uploads/pages/' . ($page->{'document' . app()->getLocale() } ?? $page->document_am)) }}" class="mb-3"
                                download="{{ $item->title_am.'.'.$extension  }}">
                                <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                    alt="{{ $extension }}">{{ $page->{'document_title_' . app()->getLocale() } ?? $page->document_title_am }}
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @foreach ($mediaFile as $item)
            @foreach ($item->tabs as $tab)
                @if($tab->name == 'soldier_rights_main')
                    <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>

                @endif
            @endforeach
        @endforeach
    @endsection
