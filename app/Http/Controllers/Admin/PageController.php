<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;
use App\Models\Tab;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        return view('admin.pages.index', [
            'pages' => $pages,
            'doctypes' => ['file_am', 'file_en', 'file2_am', 'file2_en', 'file3_am', 'file3_en']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create', [
            'tabs' => Tab::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {

        $new_page = new Page;

        $new_page->page = $request->page;
        $new_page->title_am = $request->title_am;
        $new_page->title_en = $request->title_en;
        $new_page->subject_am = $request->subject_am;
        $new_page->subject_en = $request->subject_en;
        $new_page->content_am = $request->content_am;
        $new_page->content_en = $request->content_en;
        $new_page->document_title_am = $request->document_title_am;
        $new_page->document_title_en = $request->document_title_en;

        if ($request->allFiles()) {
            foreach ($request->allFiles() as $doctype => $page) {

                $ext = $page->getClientOriginalExtension();
                $filename = $page->hashName();

                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                    Image::make($request->file($doctype))->resize(null, 750, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('uploads/pages/' . $filename));
                } else {
                    File::put(public_path('uploads/pages/' . $filename), file_get_contents($page));
                }
                $new_page->$doctype = $filename;
            }
        }
        $new_page->save();
        return redirect()->route('page.index')->with('message', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
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
    public function update(UpdatePageRequest $request, $id)
    {
        $page = Page::findOrFail($id);

        $page->page = $request->page;
        $page->title_am = $request->title_am;
        $page->title_en = $request->title_en;
        $page->subject_am = $request->subject_am;
        $page->subject_en = $request->subject_en;
        $page->content_am = $request->content_am;
        $page->content_en = $request->content_en;
        $page->document_title_am = $request->document_title_am;
        $page->document_title_en = $request->document_title_en;

        if ($request->allFiles()) {
            foreach ($request->allFiles() as $doctype => $file) {
                $ext = $file->getClientOriginalExtension();

                $filename = $file->hashName();

                if ($file) {
                    File::delete(public_path('uploads/pages/' . $page->$doctype));

                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                        Image::make($request->file($doctype))->resize(null, 1024, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('uploads/pages/' . $filename));
                    } else {
                        File::put(public_path('uploads/pages/') . $filename, file_get_contents($file));
                    }
                }
                $page->$doctype = $filename;
            }
        }
        $page->update();

        return redirect()->route('page.index')
            ->with('message', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctypes = ['file_am', 'file_en', 'file2_am', 'file2_en', 'file3_am', 'file3_en'];
        $page = Page::findOrFail($id);

        foreach ($doctypes as $doctype) {
            if ($page->$doctype) {
                File::delete(public_path('uploads/pages/' . $page->$doctype));
            }
        }

        $page->delete();
        return redirect()->back()->with('success', 'Page հաջողությամբ ջնջվել է');
    }
}
