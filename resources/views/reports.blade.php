@extends('layouts.app')
@section('styles')
@endsection
@section('title')
    Report
@endsection



@section('content')
    <div class="scroll_header">
        <ul class="nav nav-tabs d-flex flex-row justify-content-center scroll_nav about_us" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
          <button class="reports_yearly_reports nav-link custom_list_group_action active" id="section1-tab" data-bs-toggle="tab" data-bs-target="#section1" type="button" role="tab" aria-controls="section1" aria-selected="true">{{ __('main.yearly_reports') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_special_reports nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section2" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.special_reports') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_annual_reports nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section3" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.annual_reports') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_applications_complaints nav-link custom_list_group_action big_list_tab apteryges-tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section4" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.cc_applications') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_opinions nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section5" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.reports_opinions') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_legislative nav-link custom_list_group_action big_list_tab opinion-tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section6" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.reports_suggestions') }}</button>
            </li>
            <li class="nav-item" role="presentation">
          <button class="reports_analysis nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section7" type="button" role="tab" aria-controls="section2" aria-selected="false">{{ __('main.legal_analysis') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section_reports fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.yearly_reports') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="mb-5 report_cards">
                        @foreach ($staticTexts as $text)
                            @if ($text->page == 'reports_yearly_reports')
                                <div class="report_card">
                                    <div class="reports_card_img">
                                        <img src="{{ asset('img/report.png') }}" alt="report">
                                    </div>
                                    <div class="reports_card_text">
                                        <div>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @foreach ($documents as $item)
                        @foreach ($item->tabs as $tab)
                            @if ($tab->name == 'reports_yearly_reports')
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                <div class="report_news d-flex flex-column">
                                    <a class="report_pdf report_pdf_news"
                                        href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                        download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                        <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                            alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        <div class="tab-pane container_section_reports fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                    <p>{{ __('main.special_reports') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    @foreach ($documents as $item)
                        @foreach ($item->tabs as $tab)
                            @if ($tab->name == 'reports_extraordinary_reports')
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                <div class="report_news d-flex flex-column">
                                    <a class="report_pdf report_pdf_news"
                                        href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                        download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                        <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                            alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        <div class="tab-pane container_section_reports fade" id="section3" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                    <p>{{ __('main.annual_reports') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    @foreach ($documents as $item)
                    @foreach ($item->tabs as $tab)
                        @if ($tab->name == 'reports_programs')
                            @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                            <div class="report_news d-flex flex-column">
                                <a class="report_pdf report_pdf_news"
                                    href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                    download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                    <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                        alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                </div>
            </div>
        <div class="tab-pane container_section_reports fade" id="section4" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.cc_applications') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="d-flex flex-column mb-5">
                        <div class="mb-5 report_cards">
                            @foreach ($staticTexts as $text)
                                @if ($text->page == 'reports_applications')
                                    <div class="d-flex report_card">
                                        <div class="reports_card_img">
                                            <img src="{{ asset('img/report.png') }}" alt="report">
                                        </div>
                                        <div class="reports_card_text">
                                            <div>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @foreach ($pages as $item)
                                @if ($item->page == 'reports_applications')
                                    @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                    {{-- <div class="report_news d-flex flex-column">
                                        <a class="report_pdf report_pdf_news"
                                            href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                            download="{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}">
                                            <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                                alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                        </a>
                                    </div> --}}
                                    <div class="report_news d-flex flex-column">
                                        <a class="report_pdf report_pdf_news"
                                            href="{{ asset('uploads/pages/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                            download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                            <img src="{{ asset('img/icons/pdf.png') }}" alt="pdf">{{ $item->{'document_title_' . app()->getLocale() } ?? $item->document_title_am }}
                                        </a>
                                        <div class="d-flex flex-column report_news_text">
                                            <div class="report_news_time d-flex align-items-start">
                                                <img src="{{ asset('img/calendar.png') }}" alt="calendar">
                                                <p>{{ $item->created_at->format('d-m-Y') }}</p>
                                            </div>
                                            <div class="report_news_content">
                                                {!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
        <div class="tab-pane container_section_reports fade" id="section5" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                    <p>{{ __('main.reports_opinions') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="d-flex flex-column mb-5">
                        @foreach ($staticTexts as $text)
                            @if ($text->page == 'reports_opinions')
                                <div class="report_card">
                                    <div class="reports_card_img">
                                        <img src="{{ asset('img/report.png') }}" alt="report">
                                    </div>
                                    <div class="reports_card_text">
                                        <p>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="report_news d-flex flex-column">
                        @foreach ($documents as $item)
                            @foreach ($item->tabs as $tab)
                                @if ($tab->name == 'reports_opinions')
                                    @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                    <div class="report_news d-flex flex-column">
                                        <a class="report_pdf report_pdf_news"
                                            href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                            download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                            <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                                alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                            <div class="news-card-date">
                                                <img src="{{ asset('img/calendar.png') }}" alt="calendar">
                                                <p>{{ $item->created_at->format('d-m-Y') }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        <div class="tab-pane container_section_reports fade" id="section6" role="tabpanel" aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                    <p>{{ __('main.reports_suggestions') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="d-flex flex-column mb-5">
                        @foreach ($staticTexts as $text)
                            @if ($text->page == 'reports_suggestions')
                                <div class="report_card">
                                    <div class="reports_card_img">
                                        <img src="{{ asset('img/report.png') }}" alt="report">
                                    </div>
                                    <div class="reports_card_text">
                                        <p>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="report_news d-flex flex-column">
                        @foreach ($documents as $item)
                            @foreach ($item->tabs as $tab)
                                @if ($tab->name == 'reports_suggestions')
                                    @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                    <div class="report_news d-flex flex-column">
                                        <a class="report_pdf report_pdf_news"
                                            href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                            download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
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
        <div class="tab-pane container_section_reports fade" id="section7" role="tabpanel" aria-labelledby="section7-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                    <p>{{ __('main.legal_analysis') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column directions_applications">
                    <div class="d-flex flex-column mb-5">
                        @foreach ($staticTexts as $text)
                            @if ($text->page == 'reports_analyses')
                                <div class="report_card">
                                    <div class="reports_card_img">
                                        <img src="{{ asset('img/report.png') }}" alt="report">
                                    </div>
                                    <div class="reports_card_text">
                                        <p>{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="report_news d-flex flex-column">
                        @foreach ($documents as $item)
                            @foreach ($item->tabs as $tab)
                                @if ($tab->name == 'reports_analyses')
                                    @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                    <div class="report_news d-flex flex-column">
                                        <a class="report_pdf report_pdf_news"
                                            href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                            download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
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
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'reports_yearly_reports')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>

            @endif
        @endforeach
    @endforeach
@endsection





@section('scripts')
@endsection
