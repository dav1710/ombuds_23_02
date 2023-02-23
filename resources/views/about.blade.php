@extends('layouts.app')
@section('title')
    About Us
@endsection

@section('styles')
    <link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection

@section('content')
    <div class="scroll_header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="about_defender nav-link custom_list_group_action active" id="section1-tab" data-bs-toggle="tab"
                    data-bs-target="#section1" type="button" role="tab" aria-controls="section1"
                    aria-selected="true">{{ __('main.defender') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_staff nav-link custom_list_group_action big_list_tab" id="section2-tab" data-bs-toggle="tab"
                    data-bs-target="#section2" type="button" role="tab" aria-controls="section2"
                    aria-selected="false">{{ __('main.staff') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_constitution nav-link custom_list_group_action big_list_tab" id="section3-tab" data-bs-toggle="tab"
                    data-bs-target="#section3" type="button" role="tab" aria-controls="section3"
                    aria-selected="false">{{ __('main.constitution') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_law nav-link custom_list_group_action big_list_tab" id="section4-tab" data-bs-toggle="tab"
                    data-bs-target="#section4" type="button" role="tab" aria-controls="section4"
                    aria-selected="false">{{ __('main.constitutional_law_defender') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_international nav-link custom_list_group_action big_list_tab international-tab" id="section5-tab"
                    data-bs-toggle="tab" data-bs-target="#section5" type="button" role="tab" aria-controls="section5"
                    aria-selected="false">{{ __('main.conventional_statuses') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_advice nav-link custom_list_group_action big_list_tab advice-tab" id="section6-tab"
                    data-bs-toggle="tab" data-bs-target="#section6" type="button" role="tab" aria-controls="section6"
                    aria-selected="false">{{ __('main.advices_defender') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="about_history nav-link custom_list_group_action big_list_tab" id="section7-tab" data-bs-toggle="tab"
                    data-bs-target="#section7" type="button" role="tab" aria-controls="section7"
                    aria-selected="false">{{ __('main.history') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section_about_us fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.defender') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column about_directions_applications directions_applications_small">
                    <ul class="nav nav-tabs container d-flex scroll_nav about_as_small" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="about_defender_biography nav-link custom_list_group_action active" id="section1_1-tab"
                                data-bs-toggle="tab" data-bs-target="#section1_1" type="button" role="tab"
                                aria-controls="section1_1" aria-selected="true">{{ __('main.biography') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_defender_mission nav-link custom_list_group_action big_list_tab" id="section1_2-tab"
                                data-bs-toggle="tab" data-bs-target="#section1_2" type="button" role="tab"
                                aria-controls="section1_2" aria-selected="false">{{ __('main.mission_institution') }}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane container_section_about_us fade show active biography-tab-pane"
                            id="section1_1" role="tabpanel" aria-labelledby="section1_1-tab">
                            @foreach ($ombudsmen as $item)
                                @if ($item->defender)
                                    <div class="defender_header">
                                        <div class="defender_header_1">
                                            @if ($item->img)
                                                <img src="{{ asset('uploads/ombudsmen/' . $item->img) }}"
                                                    alt="defender">
                                            @else
                                                <img src="{{ asset('img/user.png') }}" alt="defender">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column flex-wrap justify-content-between"
                                            style="gap: 20px;">
                                            <div class="defender_header_2">
                                                <p class="defender_name">{{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}</p>
                                                {{-- <p class="defender_biography">Կենսագրություն</p> --}}
                                                @if ($item->audio_am || $item->audio_en)
                                                    <div class="audio-player">
                                                        <audio controls controlsList="nodownload noplaybackrate">
                                                            <source
                                                                src="{{ asset('uploads/ombudsmen/' . $item->{'audio_' . app()->getLocale() } ? $item->{'audio_' . app()->getLocale() } : $item->audio_am) }}"
                                                                type="audio/mpeg">
                                                            Your Browser Does Not Support the radio.
                                                        </audio>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="defender_header_3">
                                                <div class="defender_social_1">
                                                    @if ($item->phone)
                                                        <a href="tel:{{ $item->phone }}" class="defender_contacts">
                                                            <img src="{{ asset('img/icons/phone.png') }}" alt="phone">
                                                            <span>{{ $item->phone }}</span>
                                                        </a>
                                                    @endif

                                                    @if ($item->email)
                                                        <a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&to={{ $item['email'] }}"
                                                            class="defender_contacts">
                                                            <img src="{{ asset('img/icons/mail.png') }}" alt="mail">
                                                            <span>{{ $item->email }}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="defender_social_2">
                                                    @if ($item->fb_link)
                                                        <a class="fb defender_contacts" href="{{ $item->fb_link }}">
                                                            <img src="{{ asset('img/icons/fb.png') }}" alt="facebook">
                                                            <span>Facebook</span>
                                                        </a>
                                                    @endif
                                                    @if ($item->twitter_link)
                                                        <a class="defender_contacts"
                                                            href="{{ $item->twitter_link }}"><img
                                                                src="{{ asset('img/icons/tw.png') }}" alt="twitter">
                                                            <span>Twitter</span>
                                                        </a>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="defender_content">
                                        @if ($item->audio2_am || $item->audio2_en)
                                            <div class="audio-player">
                                                <audio controls controlsList="nodownload noplaybackrate">
                                                    <source src="{{ asset('uploads/ombudsmen/' . $item->{'audio2_' . app()->getLocale() } ? $item->{'audio2_' . app()->getLocale() } : $item->audio2_am) }}"
                                                        type="audio/mpeg">
                                                    Your Browser Does Not Support the radio.
                                                </audio>
                                            </div>
                                        @endif

                                        <div class="defender_content_text">
                                            <p>{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane container_section_about_us fade" id="section1_2" role="tabpanel"
                            aria-labelledby="section1_2-tab">
                                    {{-- @foreach ($pages as $item)
                                            @if ($item->page == 'about_structure_mission')
                                                @php $extension = substr($item->file2_am, strrpos($item->file2_am, '.') + 1, strlen($item->file2_am)) @endphp
                                                @if ($extension == 'mp3' || $extension == 'mp2')
                                                    <div class="audio-player">
                                                        <audio controls controlsList="nodownload noplaybackrate">
                                                            <source
                                                                src="{{ asset('uploads/pages/' . $item->file3_am) }}"
                                                                type="audio/mpeg">
                                                            Your Browser Does Not Support the radio.
                                                        </audio>
                                                    </div>
                                                @elseif($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')
                                                    <div id="defender_balance_img" class="defender_header_1_1">
                                                        <img
                                                            src="{{ asset('uploads/pages/' . $item->file2_am) }}">
                                                    </div>
                                                @endif
                                            @endif
                                    @endforeach --}}
                                    @foreach ($pages as $item)
                                        @if ($item->page == 'about_structure_mission')
                                            <div class="defender_header">
                                                <div class="d-flex defender_header_2_1">
                                                    <div id="defender_balance_img" class="defender_header_1_1">
                                                        <img
                                                            src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() }) }}">
                                                    </div>
                                                    <div class="audio-player">
                                                        <audio controls controlsList="nodownload noplaybackrate">
                                                            <source
                                                                src="{{ asset('uploads/pages/' . $item->{'file2_' . app()->getLocale() }) }}"
                                                                type="audio/mpeg">
                                                            Your Browser Does Not Support the radio.
                                                        </audio>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="defender_content">
                                                            <div class="audio-player">
                                                                <audio controls controlsList="nodownload noplaybackrate">
                                                                    <source src="{{ asset('uploads/pages/' . $item->{'file3_' . app()->getLocale() } ? $item->{'file3_' . app()->getLocale() } : $item->file3_am) }}"
                                                                        type="audio/mpeg">
                                                                    Your Browser Does Not Support the radio.
                                                                </audio>
                                                            </div>
                                                        <div class="defender_content_text">
                                                            {!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}
                                                        </div>
                                            </div>

                                        @endif
                                    @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container_section_about_us fade" id="section2" role="tabpanel"
                aria-labelledby="section2-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.staff') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column about_directions_applications directions_applications_vacancy">
                    <ul class="nav nav-tabs container d-flex   scroll_nav about_as_small" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="about_staff_structure nav-link custom_list_group_action active" id="section2_1-tab" data-bs-toggle="tab"
                                data-bs-target="#section2_1" type="button" role="tab" aria-controls="section2_1"
                                aria-selected="true">{{ __('main.structure') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_staff_employees nav-link custom_list_group_action big_list_tab" id="section2_2-tab"
                                data-bs-toggle="tab" data-bs-target="#section2_2" type="button" role="tab"
                                aria-controls="section2_2" aria-selected="false">{{ __('main.our_staff') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_staff_jobs nav-link custom_list_group_action big_list_tab" id="section2_3-tab"
                                data-bs-toggle="tab" data-bs-target="#section2_3" type="button" role="tab"
                                aria-controls="section2_3" aria-selected="false">{{ __('main.employment_opportunities') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_staff_budget nav-link custom_list_group_action big_list_tab" id="section2_4-tab"
                                data-bs-toggle="tab" data-bs-target="#section2_4" type="button" role="tab"
                                aria-controls="section2_4" aria-selected="false">{{ __('main.budget') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_staff_buys nav-link custom_list_group_action big_list_tab" id="section2_5-tab"
                                data-bs-toggle="tab" data-bs-target="#section2_5" type="button" role="tab"
                                aria-controls="section2_5" aria-selected="false">{{ __('main.procurement') }}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane structure-tab-pane container_section_about_us fade show active" id="section2_1"
                            role="tabpanel" aria-labelledby="section2_1-tab">
                            <div class="structure">

                                <div class="structure_header">
                                    <p>{{ __('main.title') }}</p>
                                </div>
                                <div class="structure_content">
                                    <div id="structure_content_first" class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.defender_advices') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.defender_helpers') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.structure_department') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.secretariat') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.culture_department') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.research_education') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="structure_div">
                                            <div class="d-flex">
                                                <hr class="horizontal_line">
                                                <p>{{ __('main.regions') }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <hr class="horizontal_line">
                                                <p>{{ __('main.shirak') }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <hr class="horizontal_line">
                                                <p>{{ __('main.syunik') }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <hr class="horizontal_line">
                                                <p>{{ __('main.gexarquniq') }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <hr class="horizontal_line">
                                                <p>{{ __('main.tavush') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.structure_cooperation') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.structure_torture') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.structure_relations') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <hr class="horizontal_line">
                                        <p>{{ __('main.structure_audit') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container_section_about_us_card fade" id="section2_2" role="tabpanel"
                            aria-labelledby="section2_2-tab">
                            <div class="card-deck d-flex flex-wrap">
                                @foreach ($employees as $item)
                                    <a href="{{ route('employee', $item->id) }}" style="margin-bottom: 100px">
                                        <div class="card employee_card">
                                            @if ($item->img)
                                                <img class="card-img-top"
                                                    src="{{ asset('uploads/employees/' . $item->img) }}">
                                            @else
                                                <img class="card-img-top" src="{{ asset('img/user.png') }}"
                                                    alt="Card image cap">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}</h5>
                                                <p class="card-text">{{ $item->{'position_' . app()->getLocale() } ? $item->{'position_' . app()->getLocale() } : $news->position_am }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane container_section_about_us_vacancy fade" id="section2_3" role="tabpanel"
                            aria-labelledby="section2_3-tab">
                            <div class="d-flex flex-column vacancies mb-5">
                                <div class="accordion" id="accordion">
                                    @php $count = 0; @endphp
                                    @foreach($vacancies as $item)
                                        <div class="card">
                                        <div class="d-flex justify-content-around vacancy_header" id="headingThree{{ $count }}">
                                            <button class="vacancy_btn d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree{{ $count }}" aria-expanded="false" aria-controls="collapseThree{{ $count }}">
                                                <img src="{{ asset('img/job.png') }}" alt="">
                                                <div>
                                                    <p class="accordion-header vacancy_title d-flex" id="headingThree{{ $count }}" class="mb-0">{{ $item->{'work_title_' . app()->getLocale() } ? $item->{'work_title_' . app()->getLocale() } : $item->work_title_am }} </p>
                                                    <p class="accordion-header vacancy_subject d-flex" id="headingThree{{ $count }}" class="mb-0">{{ $item->{'work_subject_' . app()->getLocale() } ? $item->{'work_subject_' . app()->getLocale() } : $item->work_subject_am }} </p>
                                                </div>
                                                <img class="vacancy_more" src="{{ asset('img/next.png') }}">
                                            </button>
                                        </div>
                                        <div id="collapseThree{{ $count }}" class="accordion-collapse collapse" aria-labelledby="headingThree{{ $count }}" data-bs-parent="#accordion">
                                            <div class="vacancy_collapse accordion-body">
                                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                                <a class="report_pdf report_pdf_news" href="{{ asset('uploads/vacancy/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3" download>
												    <img src="{{ asset('img/icons/' . $extension . '.png') }}" alt="{{ $extension }}"  style="margin-right: 10px">{{ $item->{'work_title_' . app()->getLocale() } ? $item->{'work_title_' . app()->getLocale() } : $item->work_title_am }}
												</a>
                                                <p>{{ $item->{'work_content_' . app()->getLocale() } ? $item->{'work_content_' . app()->getLocale() } : $item->work_content_am }}</p>
                                            </div>
                                        </div>
                                        </div>
                                      @php $count++; @endphp
                                    @endforeach

                                  </div>
                            </div>
                        </div>
                        <div class="tab-pane container_section_about_us fade" id="section2_4" role="tabpanel"
                            aria-labelledby="section2_4-tab">
                            <div class="d-flex flex-column about_directions_applications directions_applications">
                                @foreach ($documents as $item)
                                    @foreach ($item->tabs as $tab)
                                        @if ($tab->name == 'about_budget')
                                            @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                            <div class="report_news d-flex flex-column">
                                                <a class="report_pdf report_pdf_news"
                                                    href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}"
                                                    class="mb-3" download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
                                                    <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                                        alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane container_section_about_us fade" id="section2_5" role="tabpanel"
                            aria-labelledby="section2_5-tab">
                            @foreach ($documents as $item)
                                @foreach ($item->tabs as $tab)
                                    @if ($tab->name == 'about_buy')
                                        @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                                        <div class="report_news d-flex flex-column">
                                            <a class="report_pdf report_pdf_news"
                                                href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}"
                                                class="mb-3" download="{{ $item->{'title_' . app()->getLocale() . '.' . $extension } ? $item->{'title_' . app()->getLocale() . '.' . $extension } : $item->title_am . '.' . $extension  }}">
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
            <div class="tab-pane constitution-pane container_section_about_us fade" id="section3" role="tabpanel"
                aria-labelledby="section3-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.constitution') }}</p>
                    </div>
                </div>

                <div class="about_directions_applications directions_applications">
                    @foreach ($pages as $item)
                        @if ($item->page == 'about_constitution')
                            <div class="pdf_title">
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp

                                <a class="report_pdf report_pdf_news"
                                    href="{{ asset('uploads/pages/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                    download="{{ $item->{'document_title_' . app()->getLocale() } ?? $item->document_title_am }}">
                                    <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                        alt="{{ $extension }}">{{ $item->{'document_title_' . app()->getLocale() } ?? $item->document_title_am }}
                                </a>
                            </div>
                            <div class="pdf_content">
                                {!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container_section_about_us fade" id="section4" role="tabpanel"
                aria-labelledby="section4-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.constitutional_law_defender') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column about_directions_applications directions_applications">
                    @foreach ($pages as $item)
                        @if ($item->page == 'about_defender_rights')
                            <div class="pdf_title flex-wrap">
                                <div class="audio-player">
                                    <audio controls controlsList="nodownload noplaybackrate">
                                        <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am) }}" type="audio/mpeg">
                                        Your Browser Does Not Support the radio.
                                    </audio>
                                </div>
                                @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp

                                <a class="report_pdf report_pdf_news"
                                    href="{{ asset('uploads/pages/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3" download="{{ $item->{'document_title_' . app()->getLocale() } ?? $item->document_title_am }}">
                                    <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                        alt="{{ $extension }}">{{ $item->{'document_title_' . app()->getLocale() } ?? $item->document_title_am }}
                                </a>
                            </div>
                            <div class="pdf_content">
                                {!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container_section_about_us fade" id="section5" role="tabpanel"
                aria-labelledby="section5-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.conventional_statuses') }}</p>
                    </div>
                </div>

                <div class="directions_applications">
                    @foreach($pages as $item)
                        @if($item->page == 'about_international_statuses')
                        <div class="audio-player">
                            <audio controls controlsList="nodownload noplaybackrate">
                                <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am) }}"
                                    type="audio/mpeg">
                                Your Browser Does Not Support the radio.
                            </audio>
                        </div>
                        <div class="audio-player">
                            <audio controls controlsList="nodownload noplaybackrate">
                                <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_en) }}"
                                    type="audio/mpeg">
                                Your Browser Does Not Support the radio.
                            </audio>
                        </div>
                        <div class="report_card">
                            <div class="reports_card_img">
                                <img src="{{ asset('img/search_statistics.png') }}" alt="report">
                            </div>
                            <div class="reports_card_text">
                                <p>{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="report_card">
                        <div class="reports_card_img">
                            <img src="{{ asset('img/search_statistics.png') }}" alt="report">
                        </div>
                        <div class="reports_card_text">
                            <p>{!! $text_1 !!}</p>
                        </div>
                    </div>
                    <div class="report_card">
                        <div class="reports_card_img">
                            <img src="{{ asset('img/search_statistics.png') }}" alt="report">
                        </div>
                        <div class="reports_card_text">
                            <p>{!! $text_2 !!}</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column about_directions_applications directions_applications">
                </div>
            </div>
            <div class="tab-pane container_section_about_us fade" id="section6" role="tabpanel"
                aria-labelledby="section6-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.advices_defender') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column about_directions_applications directions_applications">
                    @foreach ($staticTexts as $text)
                        @if ($text->page == 'about_advice')
                            <div class="soldier_rights_text">{!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}</div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container_section_about_us fade" id="section7" role="tabpanel"
                aria-labelledby="section7-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.history') }}</p>
                    </div>
                </div>
                <div class="d-flex flex-column about_directions_applications directions_applications_small">
                    <ul class="nav nav-tabs container d-flex scroll_nav about_as_small" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="about_history_structure  nav-link custom_list_group_action active" id="section7_1-tab"
                                data-bs-toggle="tab" data-bs-target="#section7_1" type="button" role="tab"
                                aria-controls="section7_1" aria-selected="true">{{ __('main.history_institution') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="about_history_former nav-link custom_list_group_action big_list_tab" id="section7_2-tab"
                                data-bs-toggle="tab" data-bs-target="#section7_2" type="button" role="tab"
                                aria-controls="section7_2" aria-selected="false">{{ __('main.former_defenders') }}
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane container_section_about_us fade show active" id="section7_1" role="tabpanel"
                            aria-labelledby="section7_1-tab">
                            <div class="defender_content">
                                @foreach ($mediaFile as $item)
                                    @foreach ($item->tabs as $mediaFile_tab)
                                            <div class="audio-player">
                                                <audio controls controlsList="nodownload noplaybackrate">
                                                    <source src="{{ asset('uploads/mediaFiles/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am) }}"
                                                        type="audio/mpeg">
                                                    Your Browser Does Not Support the radio.
                                                </audio>
                                            </div>
                                    @endforeach
                                @endforeach
                                @foreach ($staticTexts as $text)
                                    @if ($text->page == 'about_history_institution')
                                        <div class="defender_content_text">
                                            {!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($pages as $item)
                                @if ($item->page == 'about_history_institution')
                                    <div class="pdf_title flex-wrap">
                                        <div class="audio-player">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/pages/' . $item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    </div>
                                    <div class="pdf_content">
                                        {!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane container_section_about_us fade" id="section7_2" role="tabpanel"
                            aria-labelledby="section7_2-tab">

                            @foreach ($ombudsmen as $item)
                                @if ($item->defender == null)
                                    <div class="defender_header">
                                        <div class="defender_header_1">
                                            @if ($item->img)
                                                <img class="rounded" src="{{ asset('uploads/ombudsmen/' . $item->img) }}"
                                                    alt="defender">
                                            @else
                                                <img class="rounded" src="{{ asset('img/user.png') }}" alt="defender">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column flex-wrap justify-content-between"
                                            style="gap: 20px;">
                                            <div class="defender_header_2">
                                                <p class="defender_name">{{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}</p>
                                                {{-- <p class="defender_biography">Կենսագրություն</p> --}}
                                                @if ($item->audio_am || $item->audio_en)
                                                    <div class="audio-player">
                                                        <audio controls controlsList="nodownload noplaybackrate">
                                                            <source
                                                                src="{{ asset('uploads/ombudsmen/' . $item->{'audio_' . app()->getLocale() } ? $item->{'audio_' . app()->getLocale() } : $item->audio_am) }}"
                                                                type="audio/mpeg">
                                                            Your Browser Does Not Support the radio.
                                                        </audio>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="defender_header_3">
                                                <div class="defender_social_1">
                                                    @if ($item->phone)
                                                        <a href="tel:{{ $item->phone }}" class="defender_contacts">
                                                            <img src="{{ asset('img/icons/phone.png') }}" alt="phone">
                                                            <span>{{ $item->phone }}</span>
                                                        </a>
                                                    @endif

                                                    @if ($item->email)
                                                        <a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&to={{ $item['email'] }}"
                                                            class="defender_contacts">
                                                            <img src="{{ asset('img/icons/mail.png') }}" alt="mail">
                                                            <span>{{ $item->email }}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="defender_social_2">
                                                    @if ($item->fb_link)
                                                        <a class="fb defender_contacts" href="{{ $item->fb_link }}">
                                                            <img src="{{ asset('img/icons/fb.png') }}" alt="facebook">
                                                            <span>Facebook</span>
                                                        </a>
                                                    @endif
                                                    @if ($item->twitter_link)
                                                        <a class="defender_contacts"
                                                            href="{{ $item->twitter_link }}"><img
                                                                src="{{ asset('img/icons/tw.png') }}" alt="twitter">
                                                            <span>Twitter</span>
                                                        </a>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="defender_content">
                                        @if ($item->audio2_am || $item->audio2_en)
                                            <div class="audio-player">
                                                <audio controls controlsList="nodownload noplaybackrate">
                                                    <source src="{{ asset('uploads/ombudsmen/' . $item->{'audio2_' . app()->getLocale() } ? $item->{'audio2_' . app()->getLocale() } : $item->audio2_am) }}"
                                                        type="audio/mpeg">
                                                    Your Browser Does Not Support the radio.
                                                </audio>
                                            </div>
                                        @endif

                                        <div class="defender_content_text font_reset">
                                            <p>{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'about_advice')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>

            @endif
        @endforeach
    @endforeach
@endsection
@section('scripts')
<script>
    $('#myTab button[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    let target = $(e.target).data('target');
    $(target)
        .addClass('active show')
        .siblings('.tab-pane.active')
        .removeClass('active show')
    });
</script>
    <script src="{{ asset('js/font_awesome/all.min.js') }}"></script>
@endsection
