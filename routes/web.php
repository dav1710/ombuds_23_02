<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CookieController;

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\OmbudsmanController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TabController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\MediaFileController;
use App\Http\Controllers\Admin\StaticTextController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cache', function() {
    Artisan::call("cache:clear");
    return 'Optimized cache';
});

// //Clear route cache:
// Route::get('/rollback', function() {
// 	Artisan::call('migrate:rollback');
//     return 'Migrate Rollback';
// });

// //Clear config cache:
// Route::get('/config-cache', function() {
//  	Artisan::call('config:cache');
//  	return 'Config cache has been cleared';
// });

// // Clear view cache:
// Route::get('/view-clear', function() {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });
Route::get('/seed', function() {
    Artisan::call('db:seed --class=UserSeeder');
    return 'refresh cache has been cleared';
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'refresh cache has been cleared';
});

Route::post('/hash', [LanguageController::class, 'hash']);
Route::get('locale/{language}', [LanguageController::class, 'language']);

Route::controller(HomeController::class)->group(function () {
	Route::get('/', 'index')->name('home');
	Route::get('/apply', 'contactUs')->name('contactUs');
	Route::get('/directions', 'directions')->name('directions');
	Route::get('/reports', 'reports')->name('reports');
	Route::get('/courses', 'courses')->name('courses');
	Route::get('/cooperation/membership', 'cooperation_membership')->name('cooperation.membership');
	Route::get('/cooperation/program', 'cooperation_program')->name('cooperation.program');
	Route::get('/media','media')->name('media');
	Route::get('/media_interviews','media_interview')->name('media_interview');
	Route::get('/media_videos','media_videos')->name('media_videos');
	Route::get('/media_announcements','media_announcements')->name('media_announcements');
	Route::get('/media_stories','media_success')->name('media_stories');
	Route::get('/media/search','searchMedia')->name('searchMedia');
	Route::get('/media_interviews/search','searchMediaInterviews')->name('searchMediaInterviews');
	Route::get('/media_videos/search','searchMediaVideos')->name('searchMediaVideos');
	Route::get('/media_announcements/search','searchMediaAnnouncements')->name('searchMediaAnnouncements');
	Route::get('/media_stories/search','searchMediaStories')->name('searchMediaStories');
	Route::get('/about','about')->name('about');
	Route::get('/torture','torture')->name('torture');
	Route::get('/soldier_rights','soldier_rights')->name('soldier_rights');
	Route::get('/women_rights','women_rights')->name('women_rights');
	Route::get('/child_rights','child_rights')->name('child_rights');
	Route::get('/invalid_rights','invalid_rights')->name('invalid_rights');
	Route::get('/statistics','statistics')->name('statistics');
	Route::get('/information','information')->name('information');
	Route::get('/business_rights','business_rights')->name('business_rights');
	Route::get('/decisions','decisions')->name('decisions');
	Route::get('/news','news')->name('news');
	Route::get('/interviews','interviews')->name('interviews');
	Route::get('/videos','videos')->name('videos');
	Route::get('/posts','posts')->name('posts');
	Route::get('/success_stories','success_stories')->name('success_stories');
	Route::get('/education_awareness','education_awareness')->name('education_awareness');
	Route::get('/membership','membership')->name('membership');
	Route::get('/program_collaboration','program_collaboration')->name('program_collaboration');

	//Global Search
	Route::get('/search', 'search')->name('search');
});
    // Route::get('media/{page_number}', HomeController::class, 'media');

// Admin Panel
Route::middleware('auth')->group(function () {
	Route::get('/admin', [AdminHomeController::class, 'admin'])->name('admin');

	Route::prefix('admin')->group(function () {
		Route::resources([
			'address' => AddressController::class,
			'ombudsman' => OmbudsmanController::class,
			'slide' => SlideController::class,
			'tab' => TabController::class,
			'document' => DocumentController::class,
			'statistics' => StatisticsController::class,
			'vacancy' => VacancyController::class,
			'mediaFile' => MediaFileController::class,
			'staticText' => StaticTextController::class,
			'page' => PageController::class,
		]);

		Route::resource('employee', EmployeeController::class)->except('show');
		Route::resource('news', NewsController::class)->except('show');

		Route::get('/link', [LinkController::class, 'index'])->name('link.index');
		Route::put('/link/update', [LinkController::class, 'update'])->name('link.update');
		Route::get('/link/edit', [LinkController::class, 'edit'])->name('link.edit');
		Route::get('/applicant', [ApplicantController::class, 'index'])->name('applicant.index');
	});
});

// Applicant
Route::resource('applicant', ApplicantController::class)->except('store', 'index');
Route::post('/applicant/send', [ApplicantController::class, 'store'])->name('applicant.store');

// Show
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee');
Route::get('news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('statistics/{id}', [StatisticsController::class, 'show']);

// Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Cookies
Route::post('/cookie/set', [CookieController::class, 'set']);
Route::post('/cookie/destroy', [CookieController::class, 'destroy']);
Route::get('/cookie/get', [CookieController::class, 'get']);