<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at','desc')->get();


        return view('admin.news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('img');
        $random = Str::random(15, 999);
        $image_ext = strtolower($image->getClientOriginalExtension());
        $filename  = time().'.'.$random .'.'. $image_ext;
        $path = public_path('img/project/'.$filename);
        Image::make($image)->resize(null,460 , function($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        $last_image = 'img/project/'.$filename;

        News::insert([
            'title' => $request->title,
            'img' => $last_image,
            'created_at' => Carbon::now()
        ]);



        return redirect()->back()->with('success','Slide was added successfully');
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
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_image = $request->old_image;

        $image = $request->file('img');

        if ($image)
        {
            $random = Str::random(15, 999);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $filename  = time().'.'.$random .'.'. $image_ext;
            $path = public_path('img/project/'.$filename);
            Image::make($image)->resize(null, 320, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            $last_image = 'img/project/'.$filename;

            unlink($old_image);
            News::find($id)->update([
            'title' => $request->title,
            'img' => $last_image,
            'created_at' => Carbon::now()
            ]);
            return redirect()->back()->with('success', 'Սլայդը հաջողությամբ փոփոխվել է');
        }
        else
        {
            News::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
                ]);
                return redirect()->back()->with('success', 'Սլայդի վերնագիրը հաջողությամբ փոփոխվել է');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = News::find($id);
        $old_image = $image->img;
        unlink($old_image);

        News::find($id)->delete();

        return redirect()->back()->with('success','Սլայդը հաջողությամբ ջնջվել է');
    }
}
