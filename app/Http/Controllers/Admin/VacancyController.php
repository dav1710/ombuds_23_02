<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy = Vacancy::orderBy('created_at','desc')->get();
        return view('admin.vacancy.index', [
            'vacancy' => $vacancy,
			'doctypes' => ['document_am', 'document_en']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        $new_document = new Vacancy;
		$new_document->work_title_am = $request->work_title_am;
        $new_document->work_title_en = $request->work_title_en;
        $new_document->work_subject_am = $request->work_subject_am;
        $new_document->work_subject_en = $request->work_subject_en;
        $new_document->work_content_am = $request->work_content_am;
        $new_document->work_content_en = $request->work_content_en;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $document ) {
                $filename = $document->hashName();
                File::put(public_path('uploads/vacancy/' . $filename), file_get_contents($document));
				$new_document->$doctype = $filename;
			}
		}

		$new_document->save();
		return redirect()->route('vacancy.index')->with('success', 'Աշխատանքը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Vacancy::findOrFail($id);
		$file = $document->document_am;

		if($file != $document->document_am) {
			$file = $document->document_en;
		}

		$path = Storage::disk('public')->get('vacancy/' . $file);
		return response($path)->header('Content-Type', 'application/pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.vacancy.edit', [
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacancyRequest $request, $id)
    {
        $old_vacancy = Vacancy::findOrFail($id);
		$old_vacancy->work_title_am = $request->work_title_am;
        $old_vacancy->work_title_en = $request->work_title_en;
        $old_vacancy->work_subject_am = $request->work_subject_am;
        $old_vacancy->work_subject_en = $request->work_subject_en;
        $old_vacancy->work_content_am = $request->work_content_am;
        $old_vacancy->work_content_en = $request->work_content_en;

        if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $vacancy ) {
                $ext = $vacancy->getClientOriginalExtension();

                $filename = $vacancy->hashName();
                if ($vacancy) {
                    File::delete(public_path('uploads/vacancy/' . $old_vacancy->$doctype));
                    File::put(public_path('uploads/vacancy/') . $filename, file_get_contents($vacancy));
                }
				$old_vacancy->$doctype = $filename;
			}
		}
        $old_vacancy->update();
        return redirect()->route('vacancy.index')->with('success', 'Աշխատանքը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
		$docfiles = [$vacancy->document_am, $vacancy->document_en];

		if($docfiles) {
			foreach($docfiles as $file) {
                File::delete(public_path('uploads/vacancy/' . $file));
			}
		}

        $vacancy->delete();
        return redirect()->route('vacancy.index')->with('success','Աշխատանքը հաջողությամբ ջնջվել է');
    }
}
