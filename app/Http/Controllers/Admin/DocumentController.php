<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Tab;
use App\Http\Requests\Admin\DocumentRequest;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::orderBy('created_at','desc')->get();
        return view('admin.document.index', [
            'document' => $document,
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
        return view('admin.document.create', [
			'tabs' => Tab::all(),
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
		$new_document = new Document;
		$new_document->title_am = $request->title_am;
        $new_document->title_en = $request->title_en;
        $new_document->created_at = $request->created_at;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $document ) {
                File::put(public_path('uploads/documents/') . $document->hashName(), file_get_contents($document));
				$new_document->$doctype = $document->hashName();
			}
		}
		$new_document->save();
		$new_document->tabs()->attach($request->tabs);
		return redirect()->route('document.index')->with('success', 'Փաստաթուղթը հաջողությամբ ավելացել է');
    }

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$document = Document::findOrFail($id);
		$file = $document->document_am;

		if(!$file) {
			$file = $document->document_en;
		}

		$path = File::get(public_path('uploads/documents/' . $file));
		return response($path)->header('Content-Type', 'application/pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('admin.document.edit', [
            'document' => $document,
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
	public function update(DocumentRequest $request, $id){
        abort(404);
		$old_document = Document::findOrFail($id);
		$old_document->title_am = $request->title_am;
		$old_document->title_en = $request->title_en;
		$old_document->created_at = $request->created_at;

        if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $document ) {
				if($old_document->$doctype) {
                    File::delete(public_path('uploads/documents/' . $old_document->$doctype));
				}
				File::put(public_path('uploads/documents/') . $document->getClientOriginalName(), file_get_contents($document));
				$old_document->$doctype = $document->getClientOriginalName();
			}
		}
        $old_document->update();
		$old_document->tabs()->sync($request->tabs);
        return redirect()->route('document.index')->with('success', 'Փաստաթուղթը հաջողությամբ փոփոխվել է');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
		$docfiles = [$document->document_am, $document->document_en];

		if($docfiles) {
			foreach($docfiles as $file) {
				File::delete(public_path('uploads/documents/' . $file));
			}
		}

        $document->delete();
        return redirect()->route('document.index')->with('success', 'Փաստաթուղթը հաջողությամբ ջնջվել է');
    }
}
