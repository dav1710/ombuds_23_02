<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Mail\SendMail;
use App\Models\Applicant;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.applicant.index', ['applicants' => Applicant::latest()->get()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            File::put(public_path('uploads/applicants/') . $file->hashName(), file_get_contents($file));
            $data['file'] = $file->hashName();
        }
        
        $applicant = Applicant::create($data);
        
        Mail::to($applicant->email)->send(new SendMail($applicant));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);

        if ($applicant->file) {
            File::delete(public_path('uploads/applicants/' . $applicant->file));
        }

        $applicant->delete();
        return redirect()->route('applicant.index')->with('success', 'Դիմորդի հայտը հաջողությամբ ջնջվել է');
    }
}
