<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::orderBy('created_at','desc')->get();
        return view('admin.employee.index', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $new_employee = new Employee;
		$new_employee->name_am = $request->name_am;
        $new_employee->name_en = $request->name_en;
        $new_employee->position_am = $request->position_am;
        $new_employee->position_en = $request->position_en;
        $new_employee->content_am = $request->content_am;
        $new_employee->content_en = $request->content_en;
        $new_employee->fb_link = $request->fb_link;
        $new_employee->twitter_link = $request->twitter_link;
        $new_employee->phone = $request->phone;
        $new_employee->email = $request->email;

		if($request->allFiles()) {
			foreach ($request->allFiles() as $doctype => $employee ) {
				$filename = $employee->hashName();

				if($doctype == 'img') {
					Image::make($request->file('img'))->resize(null, 720, function($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('uploads/employees/' . $filename));
				}
				else {
                    File::put(public_path('uploads/employees/') . $filename, file_get_contents($employee));
				}

				$new_employee->$doctype = $filename;
			}
		}
		$new_employee->save();

		return redirect()->route('employee.index')->with('success', 'Աշխատակիցը հաջողությամբ ավելացել է');
    }

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employees', [
            'item' => Employee::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(UpdateEmployeeRequest $request, $id){
		$employee = Employee::findOrFail($id);

		$employee->name_am = $request->name_am;
        $employee->name_en = $request->name_en;
        $employee->position_am = $request->position_am;
        $employee->position_en = $request->position_en;
        $employee->content_am = $request->content_am;
        $employee->content_en = $request->content_en;
        $employee->fb_link = $request->fb_link;
        $employee->twitter_link = $request->twitter_link;
        $employee->phone = $request->phone;
        $employee->email = $request->email;

		if($request->allFiles()) {
			foreach($request->allFiles() as $doctype => $file) {
				$filename = $file->hashName();
				if($file) {
                    File::delete(public_path('uploads/employees/' .$employee->$doctype));

					if($doctype == 'img') {
						Image::make($request->file($doctype))->resize(null, 720, function($constraint) {
							$constraint->aspectRatio();
						})->save(public_path('uploads/employees/' . $filename));
					}
					else {
                        File::put(public_path('uploads/employees/') . $filename, file_get_contents($file));
					}
				}
				$employee->$doctype = $filename;
			}
		}
        $employee->update();
        return redirect()->route('employee.index')->with('success', 'Աշխատակիցը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $files = [$employee->img, $employee->audio_am, $employee->audio_en, $employee->audio2_am, $employee->audio2_en];

		foreach($files as $file) {
			File::delete(public_path('uploads/employees/' . $file));
        }

        $employee->delete();
        return redirect()->route('employee.index')->with('success','Աշխատակիցը հաջողությամբ ջնջվել է');
    }
}





