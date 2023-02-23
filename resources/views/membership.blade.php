@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
@endsection
@section('title')
    Membership
@endsection

@section('styles')
	<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection

@section('content')
    <div class="tab-pane decisions-tab container_section fade show">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.membership') }}</p>
            </div>
        </div>
        <div class="directions_applications">
			<div>
				<h4 style="margin-bottom: 30px;">Սեմինար-քննարկում Թվինինգ ծրագրի շրջանակներում</h4>

			</div>

			<div class="holder">
                        <div class="audio green-audio-player">
                            <div class="loading">
                                <div class="spinner"></div>
                            </div>
                            <div class="play-pause-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                                    <path fill="#566574" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon"
                                        id="playPause" />
                                </svg>
                            </div>

                            <div class="controls">
                                <span class="current-time">0:00</span>
                                <div class="slider" data-direction="horizontal">
                                    <div class="progress">
                                        <div class="pin" id="progress-pin" data-method="rewind"></div>
                                    </div>
                                </div>
                                <span class="total-time">0:00</span>
                            </div>
                            <audio crossorigin>
                                <source src="{{ asset('audio/song.mp3') }}" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>

			<div class="news-date">
				<img src="{{ asset('img/calendar.png') }}">
				<p>22.06.2022 / 11:49</p>
			</div>
			<div class="news_content">
				<div class="news_content_header">
					<img src="{{ asset('img/image16.png') }}">


				</div>

				<p class="news_content_text">
					թեմայով սեմինար: Այն կազմակերպվել է հիբրիդային ձևաչափով, որին մասնակցել են ներկայացուցիչներ տարբեր շահագրգիռ գերատեսչություններից։
Միջոցառման նպատակն էր երկրների միջև փորձի փոխանակումը ռիսկերի քարտեզավորման և դրանց գնահատման ոլորտում:

Սեմինարի ընթացքում ծրագրի եվրոպացի փորձագետները ներկայացրել են եվրոպական մի շարք երկրների փորձը տվյալ բնագավառում։

Հայկական կողմն իր հերթին ներկայացրել է տեղական մակարդակում ռիսկի կառավարման գործում աշխարհագրական տեղեկատվական համակարգի կիրառությունը, դերն ու նշանակությունը։

Ներկայացվել է նաև ՄԱԿ-ի Տիեզերքի և խոշոր աղետների խարտիայի հետ իրականացվող գործընթացները և դրա շրջանակներում ԱԻՆ կարողությունների զարգացման հնարավորությունները։ <a href="">Ավելի մանրամասն</a>
				</p>
			</div>
			<a class="news_return_link" href="">Վերադառնալ ցուցակին <img src="{{ asset('img/icons/link_arrow.png') }}"></a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/player.js') }}"></script>
    <script src="{{ asset('js/font_awesome/all.min.js') }}"></script>
@endsection
