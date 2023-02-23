<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use App\Models\Tab;
use App\Http\Requests\Admin\MediaFileRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class MediaFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaFile = MediaFile::orderBy('created_at','desc')->get();
        return view('admin.mediaFile.index', [
            'mediaFile' => $mediaFile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mediaFile.create', [
			'tabs' => Tab::all()
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaFileRequest $request)
    {

		$new_mediaFile = new MediaFile;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $mediaFile ) {
				$filename = $mediaFile->hashName();
				File::put(public_path('uploads/mediaFiles/') . $filename, file_get_contents($mediaFile));
				$new_mediaFile->$doctype = $filename;
			}
		}

		$new_mediaFile->save();
		$new_mediaFile->tabs()->attach($request->tabs);
		return redirect()->route('mediaFile.index')->with('success', 'Աուդիոն հաջողությամբ ավելացել է');
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
    public function edit(MediaFile $mediaFile)
    {
        return view('admin.mediaFile.edit', [
            'mediaFile' => $mediaFile,
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
	public function update(MediaFileRequest $request, $id){
		$old_mediaFile = MediaFile::findOrFail($id);

        if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $mediaFile ) {
				$filename = $mediaFile->hashName();
				if($old_mediaFile->$doctype) {
                    File::delete(public_path('uploads/mediaFiles/' . $old_mediaFile->$doctype));
				}
				File::put(public_path('uploads/mediaFiles/') . $filename, file_get_contents($mediaFile));

				$old_mediaFile->$doctype = $filename;
			}
		}
        $old_mediaFile->update();
		$old_mediaFile->tabs()->sync($request->tabs);
        return redirect()->route('mediaFile.index')->with('success','Աուդիոն հաջողությամբ փոփոխվել է');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mediaFile = MediaFile::findOrFail($id);
		$docfiles = [$mediaFile->file_am, $mediaFile->file_en];

		if($docfiles) {
			foreach($docfiles as $file) {
                File::delete(public_path('uploads/mediaFiles/' . $file));

			}
		}

        $mediaFile->delete();
        return redirect()->route('mediaFile.index')->with('success','Աուդիոն հաջողությամբ ջնջվել է');
    }
}







