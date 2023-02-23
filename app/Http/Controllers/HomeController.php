<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Slide;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Address;
use App\Models\MediaFile;
use App\Models\StaticText;
use App\Models\Ombudsman;
use App\Models\Statistic;
use App\Models\Vacancy;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
			'slides' => Slide::all()
		]);
    }
	public function search()
	{
        if(request(['search'])) {
            $news = News::latest()->filter(request(['search']))->get();
            $documents = Document::latest()->filter(request(['search']))->get();
            $results = $news->merge($documents);

            $perPage = 3; // qanaky amen page-um
            $currentPage = request()->input('page', 1);

            $paginated = new LengthAwarePaginator(
                $results->forPage($currentPage, $perPage),
                $results->count(),
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]
            );

            return view('search', [
                'results' => $paginated,
                'search' => request('search'),
            ]);
        }
        else {
            return redirect()->back();
        }
	}
    public function contactUs()
    {
        return view('contact_us', [
			'address' => Address::all(),
			'staticTexts' => StaticText::all()
		]);
    }
    public function directions()
    {
        return view('directions', [
			'staticTexts' => StaticText::all(),
			'documents' => Document::all(),
            'pages' => Page::all(),
		]);
    }
    public function reports()
    {
        return view('reports', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
            'pages' => Page::all()
		]);
    }
    public function courses()
    {
        $query = News::latest()->get();
        return view('courses', [
			'documents' => Document::all(),
			'news' => $query,
		]);
    }
    public function cooperation_membership()
    {
        $cooperation_membership = News::select('news.*')
            ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
            ->where('tab_news.tab_id', '=', '9')
            ->latest()
            ->paginate(25);

        return view('cooperation_membership', [
			'news_membership' => $cooperation_membership,
		]);
    }

    public function cooperation_program() {
        $cooperation_program = News::select('news.*')
            ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
            ->where('tab_news.tab_id', '=', '10')
            ->latest()
            ->paginate(25);

        return view('cooperation_program', [
            'news_program' => $cooperation_program,
            'static_texts' => StaticText::all(),
        ]);
    }

    
    public function media(){
        $query_news = News::select('news.*')
                          ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                          ->where('tab_news.tab_id', '=', '11')
                          ->whereNotNull('news.content_' . app()->getLocale())
                          ->latest()
                          ->paginate(18);

        return view('media_news', [
                'query_news' => $query_news
                ]);
    }
    public function media_interview(){
        $query_interview = News::select('news.*')
                            ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                            ->where('tab_news.tab_id', '=', '12')
                            ->whereNotNull('news.content_' . app()->getLocale())
                            ->latest()
                            ->paginate(18);

        return view('media_interview', [
                'query_inteview' => $query_interview,
                ]);
    }
    public function media_videos(){
        $query_videos = News::select('news.*')
                            ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                            ->where('tab_news.tab_id', '=', '13')
                            ->whereNotNull('news.content_' . app()->getLocale())
                            ->latest()
                            ->paginate(18);

        return view('media_videos', [
                'query_videos' => $query_videos
                ]);
    }
    public function media_announcements(){
        $query_announcements = News::select('news.*')
                                    ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                                    ->where('tab_news.tab_id', '=', '14')
                                    ->whereNotNull('news.content_' . app()->getLocale())
                                    ->latest()
                                    ->paginate(18);

        return view('media_announcements', [
                'query_announcements' => $query_announcements,
                ]);
    }
    public function media_success(){
        $query_success = News::select('news.*')
                            ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                            ->where('tab_news.tab_id', '=', '15')
                            ->whereNotNull('news.content_' . app()->getLocale())
                            ->latest()
                            ->paginate(18);

        return view('media_stories', [
                'query_success' => $query_success,
                ]);
    }

    public function searchMedia(Request $request){
        $fromDate = $request->date_start.' 00:00:00';
        $toDate   = $request->date_end.' 23:59:59';
        $search   = $request->search_word;

        $query_news = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '11')
                ->where('title_am', 'LIKE', '%'.$search.'%')
                ->whereBetween('created_at', [ $fromDate, $toDate])
                ->latest()
                ->paginate(18);

        return view('media_news', [
                'query_news' => $query_news,
                'search' => $search,
                ]);
    }
    public function searchMediaInterviews(Request $request){
        $fromDate = $request->date_start.' 00:00:00';
        $toDate   = $request->date_end.' 23:59:59';
        $search   = $request->search_word;

        $query_interview = News::select('news.*')
                    ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                    ->where('tab_news.tab_id', '=', '12')
                    ->where('title_am', 'LIKE', '%'.$search.'%')
                    ->whereBetween('created_at', [ $fromDate, $toDate])
                    ->latest()
                    ->paginate(18);

        return view('media_interview', [
                'query_inteview' => $query_interview,
                ]);
    }
    public function searchMediaVideos(Request $request){
        $fromDate = $request->date_start.' 00:00:00';
        $toDate   = $request->date_end.' 23:59:59';
        $search   = $request->search_word;

        $query_videos = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '13')
                ->where('title_am', 'LIKE', '%'.$search.'%')
                ->whereBetween('created_at', [ $fromDate, $toDate])
                ->latest()
                ->paginate(18);

        return view('media_videos', [
                'query_videos' => $query_videos,
                ]);
    }
    public function searchMediaAnnouncements(Request $request){
        $fromDate = $request->date_start.' 00:00:00';
        $toDate   = $request->date_end.' 23:59:59';
        $search   = $request->search_word;

        $query_announcements =News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '14')
                ->where('title_am', 'LIKE', '%'.$search.'%')
                ->whereBetween('created_at', [ $fromDate, $toDate])
                ->latest()
                ->paginate(18);

        return view('media_announcements', [
                'query_announcements' => $query_announcements,
                ]);
    }
    public function searchMediaStories(Request $request){
        $fromDate = $request->date_start.' 00:00:00';
        $toDate   = $request->date_end.' 23:59:59';
        $search   = $request->search_word;

        $query_success = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '15')
                ->where('title_am', 'LIKE', '%'.$search.'%')
                ->whereBetween('created_at', [ $fromDate, $toDate])
                ->latest()
                ->paginate(18);

        return view('media_stories', [
                'query_success' => $query_success,
                ]);
    }
    public function about()
    {
        return view('about', [
			'employees' => Employee::all(),
			'ombudsmen' => Ombudsman::all(),
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'vacancies' => Vacancy::all(),
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 41)->first()->content_am,
            'text_2' => StaticText::where('id', 42)->first()->content_am,
		]);
    }
    public function torture()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '29')
                ->latest()
                ->paginate(25);

        return view('torture', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'news' => $query,
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 27)->first()->content_am,
            'text_2' => StaticText::where('id', 28)->first()->content_am,
            'text_3' => StaticText::where('id', 29)->first()->content_am,
		]);
    }
    public function soldier_rights()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '34')
                ->latest()
                ->paginate(25);
        return view('soldier_rights', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'news' => $query,
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 30)->first()->content_am,
            'text_2' => StaticText::where('id', 31)->first()->content_am,
            'text_3' => StaticText::where('id', 32)->first()->content_am,
            'text_4' => StaticText::where('id', 33)->first()->content_am,
            'text_5' => StaticText::where('id', 34)->first()->content_am,
            'text_6' => StaticText::where('id', 52)->first()->content_am,
            'text_7' => StaticText::where('id', 53)->first()->content_am,
            'text_8' => StaticText::where('id', 54)->first()->content_am
		]);
    }
    public function women_rights()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '38')
                ->latest()
                ->paginate(25);

        return view('women_rights', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'news' => $query,
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 35)->first()->content_am,
            'text_2' => StaticText::where('id', 36)->first()->content_am,
            'text_3' => StaticText::where('id', 37)->first()->content_am,
            'text_4' => StaticText::where('id', 38)->first()->content_am,
		]);
    }
    public function child_rights()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '42')
                ->latest()
                ->paginate(25);

        return view('child_rights', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'news' => $query,
            'pages' => Page::all()
		]);;
    }
    public function invalid_rights()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '46')
                ->latest()
                ->paginate(25);

        return view('invalid_rights', [
			'documents' => Document::all(),
			'staticTexts' => StaticText::all(),
			'news' => $query,
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 39)->first()->content_am,
            'text_2' => StaticText::where('id', 40)->first()->content_am,
		]);
    }
    public function statistics()
    {
        return view('statistics', [
			'statistics' => Statistic::all()
		]);
    }
    public function employee()
    {
        return view('employees', [
			'item' => Employee::all()
		]);
    }
    public function information()
    {
        return view('information', [
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 43)->first()->content_am,
            'text_2' => StaticText::where('id', 44)->first()->content_am,
            'text_3' => StaticText::where('id', 45)->first()->content_am,
            'text_4' => StaticText::where('id', 46)->first()->content_am,
            'text_5' => StaticText::where('id', 47)->first()->content_am
		]);
    }
    public function business_rights()
    {
        $query = News::select('news.*')
                ->join('tab_news', 'tab_news.news_id', '=', 'news.id')
                ->where('tab_news.tab_id', '=', '50')
                ->latest()
                ->paginate(25);

        return view('business_rights', [
            'documents' => Document::all(),
            'news' => $query,
            'pages' => Page::all(),
            'text_1' => StaticText::where('id', 48)->first()->content_am,
            'text_2' => StaticText::where('id', 49)->first()->content_am,
            'text_3' => StaticText::where('id', 50)->first()->content_am,
            'text_4' => StaticText::where('id', 51)->first()->content_am
		]);
    }
	public function decisions()
    {
        return view('decisions', [
			'documents' => Document::all()
		]);
    }

}

