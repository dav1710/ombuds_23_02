<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Models\Tab;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(50);

        return view('admin.news.index', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tabs = Tab::all();
        return view('admin.news.create', [
            'tabs' => $tabs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
		$new_news = new News;
		$new_news->title_am = $request->title_am;
        $new_news->title_en = $request->title_en;
        $new_news->content_am = $request->content_am;
        $new_news->content_en = $request->content_en;
        $new_news->created_at = $request->created_at;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $news ) {
                if(is_array($news)) {
                    foreach ($request->$doctype as $file) {
                        if ($file->getError()) {
                            return redirect()->back()->withErrors('Ֆայլը գոյություն չունի կամ ընթեռնելի չի');
                        }
                        $filename = $file->hashName();
                        Image::make($file)->fit(600, 400)->save(public_path('uploads/news/' . $filename));
                        $data[] = $filename;
                        $new_news->$doctype = json_encode($data, true);
                    }
                    unset($data);
                }
                else {
                    $filename = $news->hashName();
                    File::put(public_path('uploads/news/') . $filename, file_get_contents($news));
                    $new_news->$doctype = $filename;
                }
			}
		}
		$new_news->save();
        $new_news->tabs()->attach($request->tabs);

        return redirect()->route('news.index')->with('success','Նորությունը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('news', [
            'news' => News::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        abort(403);
        return view('admin.news.edit', [
            'news' => $news,
			'tabs' => Tab::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $old_news = News::findOrFail($id);

		$old_news->title_am = $request->title_am;
        $old_news->title_en = $request->title_en;
        $old_news->content_am = $request->content_am;
        $old_news->content_en = $request->content_en;
        $old_news->created_at = $request->created_at;

		if($request->allFiles()) {
            foreach ($request->allFiles() as $doctype => $news ) {
                if(is_array($news)) {
                    if($old_news->$doctype) {
                        foreach (json_decode($old_news->$doctype) as $i => $old_file) {
                            File::delete(public_path('uploads/news/' . $old_file));
                        }
                    }

                    foreach ($news as $file) {
                        if ($file->getError()) {
                            return redirect()->back()->withErrors('The file does not exist or is not readable');
                        }
                        $filename = $file->hashName();
                        Image::make($file)->fit(500, 400)->save(public_path('uploads/news/' . $filename));
                        $data[] = $filename;
                        $old_news->$doctype = json_encode($data, true);

                    }
                    unset($data);
                }
                else {
                    File::delete(public_path('uploads/news/' . $old_news->$doctype));
                    $filename = $news->hashName();
                    File::put(public_path('uploads/news/') . $filename, file_get_contents($news));
                    $old_news->$doctype = $filename;
                }
			}
		}

        $old_news->update();
        $old_news->tabs()->sync($request->tabs);

        return redirect()->route('news.index')->with('success', 'Նորությունը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $files = array_merge($news->images(), $news->audios());

        foreach ($files as $file) {
            File::delete(public_path('uploads/news/' . $file));
        }

        $news->delete();
        return redirect()->route('news.index')->with('success','Նորությունը հաջողությամբ ջնջվել է');
    }
}
