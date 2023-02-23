@extends('layouts.app')

@section('title')
    {{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/audio.css') }}">
@endsection

@section('content')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane container_section_about_us fade show active" id="section1" role="tabpanel"
            aria-labelledby="section1-tab">
            <div class="d-flex align-items-baseline contact_us_action">
                <div class="line_2"></div>
                <div class="contact_us_action_title">
                    <p>{{ __('main.employee') }}</p>
                </div>
            </div>
            <div class="d-flex flex-column about_directions_applications directions_applications_small">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane container_section_about_us fade show active biography-tab-pane" id="section1_1"
                        role="tabpanel" aria-labelledby="section1_1-tab">
                        <div class="defender_header">
                            <div class="defender_header_1">
                                @if ($item->img)
                                    <div id="lightgallery">
                                        <a href="{{ asset('uploads/employees/' . $item->img) }}">
                                            <img class="rounded w-100" src="{{ asset('uploads/employees/' . $item->img) }}" alt="{{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}">
                                        </a>
                                    </div>
                                @else
                                    <img class="rounded" src="{{ asset('img/user.png') }}" alt="defender">
                                @endif
                            </div>
                            <div class="d-flex flex-column flex-wrap justify-content-between" style="gap: 20px;">
                                <div class="defender_header_2">
                                    <p class="defender_name">{{ $item->{'name_' . app()->getLocale() } ? $item->{'name_' . app()->getLocale() } : $item->name_am }}</p>
                                    {{-- <p class="defender_biography">Կենսագրություն</p> --}}
                                    @if ($item->audio_am || $item->audio_en)
                                        <div class="audio-player">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/employees/' . $item->{'audio_' . app()->getLocale() } ? $item->{'audio_' . app()->getLocale() } : $item->audio_am) }}"
                                                    type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @endif
                                </div>
                                <div class="defender_header_3">
                                    <div class="defender_social_1">
                                        @if ($item->phone)
                                            <a href="tel:{{ $item->phone }}" class="defender_contacts"> <img
                                                    src="{{ asset('img/icons/phone.png') }}"
                                                    alt="phone"><span>{{ $item->phone }}</span></a>
                                        @endif

                                        @if ($item->email)
                                            <a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&to={{ $item['email'] }}"
                                                class="defender_contacts"> <img src="{{ asset('img/icons/mail.png') }}"
                                                    alt="mail"><span>{{ $item->email }}</span></a>
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
                                            <a class="defender_contacts" href="{{ $item->twitter_link }}"><img src="{{ asset('img/icons/tw.png') }}"
                                                    alt="twitter">
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
                                        <source src="{{ asset('uploads/employees/' . $item->{'audio2_' . app()->getLocale() } ? $item->{'audio2_' . app()->getLocale() } : $item->audio2_am) }}"
                                            type="audio/mpeg">
                                        Your Browser Does Not Support the radio.
                                    </audio>
                                </div>
                            @endif

                            <div class="defender_content_text font_reset">
                                <p>{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/zoom/lg-zoom.umd.min.js"></script>

    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            // plugins: [lgZoom, lgThumbnail],
            licenseKey: 'GPLv3',
            speed: 500,
            download: false,
            share: false,
            zoom: false
        });
    </script>
@endsection