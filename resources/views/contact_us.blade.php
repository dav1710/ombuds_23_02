@extends('layouts.app')
@section('title')
    Contact Us
@endsection

@section('content')
    <div id="contact_us" class="scroll_header">
        <ul class="nav nav-tabs container d-flex flex-row justify-content-evenly scroll_nav contact_us" id="myTab"
            role="tablist">
            <li class="nav-item" role="presentation">
                <button class="apply_main nav-link custom_list_group_action active" id="section1-tab" data-bs-toggle="tab"
                    data-bs-target="#section1" type="button" role="tab" aria-controls="section1"
                    aria-selected="true">{{ __('main.apply_to_defender') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="apply_questions nav-link custom_list_group_action" id="section2-tab" data-bs-toggle="tab"
                    data-bs-target="#section2" type="button" role="tab" aria-controls="section2"
                    aria-selected="false">{{ __('main.asked_questions') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="apply_contact nav-link custom_list_group_action" id="section3-tab" data-bs-toggle="tab"
                    data-bs-target="#section3" type="button" role="tab" aria-controls="section3"
                    aria-selected="false">{{ __('main.contact_us') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container_section fade show active" id="section1" role="tabpanel"
                aria-labelledby="section1-tab">
                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.apply_to_defender') }}</p>
                    </div>
                </div>
                <div class="apply mb-5">
                    <div class="d-flex apply_contact_us flex-wrap">
                        <div class="apply_contact_us_item d-flex align-items-center">
                            <p class="m-0">{{ __('main.have_a_id_card') }}</p>
							<img class="mx-4 apply_arrow" src="{{ asset('img/arrow.png') }}" alt="arrow">
                        </div>

                        <div class="apply_contact_us_item d-flex align-items-center">
							<div id="contact_us_device" class="d-flex">
                            	<img src="{{ asset('img/cart.png') }}" alt="arrow">
                            	<h3>{{ __('main.put_id_card') }}</h3>
							</div>
							<img class="mx-4 apply_arrow" src="{{ asset('img/arrow.png') }}" alt="arrow">
                        </div>

                        <div class="apply_contact_us_item">
                            <a href="javascript:void(0)" class="apply_defender_id_card">
                                <img src="{{ asset('img/login.png') }}" alt="login">{{ __('main.login') }}
                            </a>
                        </div>
                    </div>

                    <div class="apply_not_id position-relative">
                        <div class="apply_not_id_title">
                            <p>{{ __('main.not_id_card') }}</p>
                            <img class="arrow_down" src="{{ asset('img/arrow.png') }}" alt="arrow">
                        </div>
                        <form action="/applicant/send" class="apply_not_id_form" method="POST" enctype="multipart/form-data">
                            <div class="apply_not_id_form_left">
                                <label for="name">
                                    <input type="text" name="name" id="name" placeholder="{{ __('main.full_name') }}" minlenght="3" maxlength="30" required>
                                </label>
                                <label for="message">
                                    <textarea name="message" id="message" cols="20" rows="8" minlength="3" maxlength="250" placeholder="{{ __('main.message') }}" required></textarea>
                                </label>
                            </div>
                            <div class="apply_not_id_form_right">
                                <div class="apply_not_id_right_container">
                                    <label for="subject">
                                        <input type="text" name="subject" id="subject" minlength="3" maxlength="50" class="apply_subject" placeholder="{{ __('main.subject') }}" required>
                                    </label>
                                    <label for="email">
                                        <input type="email" id="email" name="email" placeholder="{{ __('main.email') }}" required>
                                    </label>
                                </div>
                                <div class="apply_not_id_form_errors mt-3 alert alert-danger">
                                    <ul></ul>
                                </div>
                                <div class="apply_not_id_form_buttons">
                                    <label for="file" class="apply_file">
                                        <input type="file" name="file" id="file">
                                        <img src="{{ asset('img/attach.png') }}" alt="attach">
                                        {{ __('main.attach_file') }}
                                    </label>
                                    <button type="submit" class="apply_submit">
                                        <img src="{{ asset('img/send_apply.png') }}" alt="send">
                                        {{ __('main.submit') }}
                                    </button>
                                </div>
                            </div>

                            <div class="apply_success_block position-absolute w-100 h-100 top-0 start-0" style="border-radius: 25px; background-color: #CFCFCF; display: none;">
                                <img class="apply_success_img w-25 position-absolute start-50 top-50" src="{{ asset('img/icons/green_check.png') }}" alt="success" style="transform: translate(-50%, -50%); display: none;">
                                <img class="apply_error_img w-25 position-absolute start-50 top-50" src="{{ asset('img/icons/red_check.png') }}" alt="error" style="transform: translate(-50%, -50%); display: none;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane container_section directions_applications fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.asked_questions') }}</p>
                    </div>
                </div>
				@foreach($staticTexts as $text)
					@if($text->page == "apply")
				        <div class="apply_rights_text">
				            <span class="apply_rights_text_title">
				                {!! $text->{'content_' . app()->getLocale() } ? $text->{'content_' . app()->getLocale() } : $text->content_am !!}
				            </span><br><br>
				        </div>
					@endif
				@endforeach
            </div>
            <div class="tab-pane container_section fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">

                <div class="d-flex align-items-baseline contact_us_action">
                    <div class="line_2"></div>
                    <div class="contact_us_action_title">
                        <p>{{ __('main.contact_us') }}</p>
                    </div>
                </div>
                <div class="contact_cards mb-4">
					@foreach($address as $item)
		                <div class="contact_card_item">
		                    <div class="card_content d-flex flex-column">
		                        <div class="card_item_title">
		                            <p>{{ $item->{'region_' . app()->getLocale() } ? $item->{'region_' . app()->getLocale() } : $item->region_am }}</p>
		                        </div>
		                        <div class="card_text">
		                            <div><img src="{{ asset('img/icons/work_time.png') }}" alt=""><span>
		                                    {{ $item->{'work_time_' . app()->getLocale() } ? $item->{'work_time_' . app()->getLocale() } : $item->work_time_am }}</span></div>
		                            <div><img src="{{ asset('img/icons/position.png') }}" alt=""><span
		                                    style="margin-left: 28px !important">{{ $item->{'address_' . app()->getLocale() } ? $item->{'address_' . app()->getLocale() } : $item->address_am }}</span></div>
		                            <div>
		                                <img src="{{ asset('img/icons/email.png') }}" alt="">
		                                <span>{{ $item['mail'] }}</span>
		                            </div>
		                            <div class="d-flex">
		                                <img src="{{ asset('img/icons/phone-call.png') }}" alt="">
		                                <span>{{ $item['phone'] }}</span><br>
		                            </div>
                                    @if($item->phone_messanger)
		                            <div class="d-flex" style="gap: 3px">
		                                <img src="{{ asset('img/icons/whatsapp.png') }}" alt="whatsapp">
		                                <img src="{{ asset('img/icons/viber.png') }}" alt="viber">
		                                {{ $item['phone_messanger'] }}
		                            </div>
                                    @endif
		                        </div>
		                    </div>
		                </div>
   					@endforeach
                </div>
            </div>
        </div>
    </div>


    @foreach ($mediaFile as $item)
        @foreach ($item->tabs as $tab)
            @if($tab->name == 'apply')
                <audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>
            @endif
        @endforeach
    @endforeach
@endsection
