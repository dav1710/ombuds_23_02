@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font_awesome/all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
@endsection
@section('title')
    {{ $search }}
@endsection

@section('content')
    <div class="tab-pane decisions-tab container_section show">
        <div class="d-flex flex-wrap justify-content-between mb-5 search_results_header" style="gap: 10px;">
            <div class="d-flex align-items-baseline contact_us_action">
                <div class="line_2"></div>
                <div class="contact_us_action_title d-flex justify-content-between w-100">
                    <p class="mb-0">{{ __('main.search_results') }}</p>
                </div>
            </div>
            <form action="{{ route('search') }}" method="get" class="news_search_form search_page_form">
                <input type="text" name="search" value="{{ $search }}" required>
                <button type="submit">
                    <img src="{{ asset('img/search.png') }}">
                    <span>{{ __('main.search') }}</span>
                </button>
            </form>
        </div>
        <div class="search_results">
            @foreach ($results as $item)
                <div class="search_result">
                    @php
                        $title = $item->{'title_' . app()->getLocale()} ?? $item->title_am;
                        $content = $item->{'content_' . app()->getLocale()} ?? $item->content_am;
                        $pattern = '/' . $search . '/';
                        $replacement = '<ins class="text-decoration-underline"  style="color: #55959D">' . $search . '</ins>';
                        $title = preg_replace($pattern, $replacement, $title);
                        $content = preg_replace($pattern, $replacement, $content);
                    @endphp
                    @if (get_class($item) == 'App\Models\News')
                        <h3 class="search_result_news_title">{{ __('main.news') }} - {!! $title !!}</h3>
                        <div>{!! $content !!}</div>
                        <a class="search_result_news_link"
                            href="{{ route('news.show', $item->id) }}">{{ route('news.show', $item->id) }}</a>
                    @else
                        @php $extension = substr($item->document_am, strrpos($item->document_am, '.') + 1, strlen($item->document_am)) @endphp
                        <a href="{{ asset('uploads/documents/' . ($item->{'document_' . app()->getLocale() } ? $item->{'document_' . app()->getLocale() } : $item->document_am)) }}"
                            download="{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/icons/' . $extension . '.png') }}"
                                    alt="{{ $extension }}">
                                <h3 class="search_result_document_title">{{ __('main.documents') }} - {!! $title !!}</h3>
                            </div>
                        </a>
                    @endif
                </div>
            @endforeach

            <div class="pagination_news">
                {!! $results->appends(['search' => $search])->links() !!}
            </div>

            @if ($results->values()->isEmpty())
                <h4 class="p-4 text-center text-light rounded-pill mx-auto"
                    style="max-width: 600px; background: rgba(124, 148, 105, 0.78)">{{ __('main.nothing_found') }}
            @endif
        </div>
    </div>


@endsection