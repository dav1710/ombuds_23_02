<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ombudsman;
use App\Http\Requests\Admin\OmbudsmanRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class OmbudsmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ombudsman = Ombudsman::orderBy('created_at','desc')->get();
        return view('admin.ombudsman.index', [
            'ombudsman' => $ombudsman,
			'doctypes' => ['audio_am', 'audio_en', 'audio2_am', 'audio2_en']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ombudsman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OmbudsmanRequest $request)
    {
        $new_ombudsman = new Ombudsman;
		$new_ombudsman->defender = $request->defender;
		$new_ombudsman->name_am = $request->name_am;
        $new_ombudsman->name_en = $request->name_en;
        $new_ombudsman->subject_am = $request->subject_am;
        $new_ombudsman->subject_en = $request->subject_en;
        $new_ombudsman->content_am = $request->content_am;
        $new_ombudsman->content_en = $request->content_en;
        $new_ombudsman->phone = $request->phone;
        $new_ombudsman->email = $request->email;
        $new_ombudsman->fb_link = $request->fb_link;
        $new_ombudsman->twitter_link = $request->twitter_link;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $ombudsman ) {
				$filename = $ombudsman->hashName();

				if($doctype == 'img') {
					Image::make($request->file($doctype))->resize(null, 250, function($constraint) {
						$constraint->aspectRatio();
					})->save(public_path('uploads/ombudsmen/' . $filename));
				}
				else if($doctype == 'audio_am' || $doctype == 'audio_en' || $doctype == 'audio2_am' || $doctype == 'audio2_en'){
                    File::put(public_path('uploads/ombudsmen/') . $filename, file_get_contents($ombudsman));
				}

				$new_ombudsman->$doctype = $filename;
			}
		}
		$new_ombudsman->save();

		return redirect()->route('ombudsman.index')->with('success', 'Պաշտպանը հաջողությամբ ավելացել է');
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
    public function edit(Ombudsman $ombudsman)
    {
        return view('admin.ombudsman.edit', [
            'ombudsman' => $ombudsman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(OmbudsmanRequest $request, $id){
		$ombudsman = ombudsman::findOrFail($id);

		$ombudsman->defender = $request->defender;
		$ombudsman->name_am = $request->name_am;
        $ombudsman->name_en = $request->name_en;
        $ombudsman->subject_am = $request->subject_am;
        $ombudsman->subject_en = $request->subject_en;
        $ombudsman->content_am = $request->content_am;
        $ombudsman->content_en = $request->content_en;
        $ombudsman->phone = $request->phone;
        $ombudsman->email = $request->email;
        $ombudsman->fb_link = $request->fb_link;
        $ombudsman->twitter_link = $request->twitter_link;

		if($request->allFiles()) {

			foreach($request->allFiles() as $doctype => $file) {
				$filename = $file->hashName();
				if($file) {
                    File::delete(public_path('uploads/ombudsmen/' .$ombudsman->$doctype));

					if($doctype == 'img') {
						Image::make($request->file($doctype))->resize(null, 250, function($constraint) {
							$constraint->aspectRatio();
						})->save(public_path('uploads/ombudsmen/' . $filename));
					}
					else if($doctype == 'audio_am' || $doctype == 'audio_en' || $doctype == 'audio2_am' || $doctype == 'audio2_en') {
                        File::put(public_path('uploads/ombudsmen/') . $filename, file_get_contents($file));
					}
				}

				$ombudsman->$doctype = $filename;
			}
		}
        $ombudsman->update();
        return redirect()->route('ombudsman.index')->with('success', 'Պաշտպանը հաջողությամբ փոփոխվել է');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ombudsman = Ombudsman::findOrFail($id);
		$doctypes = ['img', 'audio_am', 'audio_en', 'audio2_am', 'audio2_en'];



		foreach($doctypes as $doctype) {
			if($ombudsman->$doctype) {
                File::delete(public_path('uploads/ombudsmen/' .$ombudsman->$doctype));
			}
		}

        $ombudsman->delete();
        return redirect()->route('ombudsman.index')->with('success','Պաշտպանը հաջողությամբ ջնջվել է');
    }
}





