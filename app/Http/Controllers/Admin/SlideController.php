<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\Admin\SlideRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::orderBy('created_at', 'desc')->get();
        return view('admin.slide.index', [
            'slide' => $slide
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(1920, 720)->save(public_path('uploads/slides/' . $filename));
            $data['img'] = $filename;
        }

        Slide::create($data);
        return redirect()->route('slide.index')->with('success', 'Սլայդը հաջողությամբ ավելացել է');
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
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit', [
            'slide' => $slide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $slide->title_am = $request->title_am;
        $slide->title_en = $request->title_en;

        if ($request->hasFile('img')) {
            if ($slide->img) {
                File::delete(public_path('uploads/slides/' . $slide->img));
            }
            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(1920, 720)->save(public_path('uploads/slides/' . $filename));
            $slide->img = $filename;
        }
        $slide->update();
        return redirect()->route('slide.index')->with('success', 'Սլայդը հաջողությամբ փոփոխվել է');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        if ($slide->img) {
            File::delete(public_path('uploads/slides/' . $slide->img));
        }

        $slide->delete();
        return redirect()->route('slide.index')->with('success', 'Սլայդը has been deleted');
    }
}
