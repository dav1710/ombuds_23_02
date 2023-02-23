<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaticTextRequest;
use App\Models\StaticText;
use App\Models\Tab;

class StaticTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staticText = StaticText::orderBy('created_at','desc')->get();
        return view('admin.staticText.index', [
            'staticText' => $staticText
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staticText.create', [
			'tabs' => Tab::all()
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaticTextRequest $request)
    {
        StaticText::create($request->all());
		return redirect()->route('staticText.index')->with('success', 'Տեքստը հաջողությամբ ավելացել է');
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
    public function edit(StaticText $staticText)
    {
        return view('admin.staticText.edit', [
            'staticText' => $staticText,
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
    public function update(StaticTextRequest $request, $id)
    {
        StaticText::findOrFail($id)->update($request->all());
        return redirect()->route('staticText.index')->with('success', 'Տեքստը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaticText::findOrFail($id)->delete();
        return redirect()->route('staticText.index')->with('success','Տեքստը հաջողությամբ ջնջվել է');
    }
}
