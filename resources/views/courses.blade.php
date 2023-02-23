@extends('layouts.app')
@section('title') Courses @endsection




@section('content')
    <div class="scroll_header">
        <ul class="nav nav-tabs container d-flex flex-row justify-content-evenly scroll_nav contact_us fixed-nav"
            id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="courses_education_awareness nav-link custom_list_group_action active" id="section1-tab" data-bs-toggle="tab"
                    data-bs-target="#section1" type="button" role="tab" aria-controls="section1"
                    aria-selected="true">{{ __('main.education_awarness') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="courses_guide nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab"
                    data-bs-target="#section2" type="button" role="tab" aria-controls="section2"
                    aria-selected="false">{{ __('main.guide') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.education_awarness') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="news-cards mb-5">
                        @foreach ($news as $item)
                            @foreach ($item->tabs as $tab)
                                @if ($tab->name == 'courses_news')
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
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane container_section fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.guide') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    @foreach ($documents as $item)
                        @foreach ($item->tabs as $tab)
                            @if ($tab->name == 'courses_pdf')
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                <div class="report_news d-flex flex-column">
                                    <a class="report_pdf report_pdf_news"
                                        href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                        download="{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am . '.' . $extension }}">
                                        <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                            alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'courses_news')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>
            @endif
        @endforeach
    @endforeach
@endsection
