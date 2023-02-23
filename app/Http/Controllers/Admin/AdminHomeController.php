<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Address;
use App\Models\Applicant;
use App\Models\MediaFile;
use App\Models\Employee;
use App\Models\News;
use App\Models\Slide;
use App\Models\Tab;
use App\Models\Ombudsman;
use App\Models\StaticText;

class AdminHomeController extends Controller
{
    public function admin()
    {
        return view('admin.admin', [
		/*	'tab_count' => count(Tab::all()),
			'staticText_count' => count(StaticText::all()), */
			'document_count' => count(Document::all()),
			'news_count' => count(News::all()),
			'address_count' => count(Address::all()),
			'mediaFile_count' => count(MediaFile::all()),
			'employee_count' => count(Employee::all()),
			'slide_count' => count(Slide::all()),
			'ombudsman_count' => count(Ombudsman::all()),
			'applicant_count' => count(Applicant::all())
		]);
    }
}
