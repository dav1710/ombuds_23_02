@extends('layouts.app')
@section('title')
    Decisions
@endsection

@section('content')
    <div class="tab-pane decisions-tab container_section fade show">
        <div class="d-flex align-items-baseline contact_us_action">
            <div class="line_2"></div>
            <div class="contact_us_action_title">
                <p>{{ __('main.defender_decisions') }}</p>
            </div>
        </div>
        <div class="d-flex directions_applications flex-column">
            @foreach ($documents as $item)
                @foreach ($item->tabs as $tab)
                    @if ($tab->name == 'decisions')
                        @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                        <div class="report_news d-flex flex-column">
                            <a class="report_pdf report_pdf_news"
                                href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}" class="mb-3"
                                download="{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}">
                                <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                    alt="{{ $extension }}">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}
                            </a>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

	@foreach ($mediaFile as $item)
		@foreach ($item->tabs as $tab)
			@if($tab->name == 'decisions')
				<audio src="{{ asset('uploads/mediaFiles/' . ($item->{'file_' . app()->getLocale() } ? $item->{'file_' . app()->getLocale() } : $item->file_am)) }}" id="autoplay_audio"></audio>
				
			@endif
		@endforeach
	@endforeach
@endsection
