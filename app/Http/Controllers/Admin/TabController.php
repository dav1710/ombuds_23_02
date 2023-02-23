<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTabRequest;
use App\Http\Requests\Admin\UpdateTabRequest;
use App\Models\Tab;
use Illuminate\Http\Request;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = Tab::orderBy('created_at','desc')->get();


        return view('admin.tabs.index', [
            'tabs' => $tabs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tabs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTabRequest $request)
    {
        $tab = Tab::create([
            'name' => $request->name,
            'name_am' => $request->name_am,
            'name_en' => $request->name_en
        ]);
        return redirect()->route('tab.index')
                    ->with('message','Tab created successfully.');
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
    public function edit(Tab $tab)
    {
        return view('admin.tabs.edit', [
            'tab' => $tab
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTabRequest $request, Tab $tab)
    {
        $tab->update([
            'name' => $request->name,
            'name_am' => $request->name_am,
            'name_en' => $request->name_en
        ]);
        return redirect()->route('tab.index')
        ->with('message','Tab updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tab::find($id)->delete();
        return redirect()->back()->with('success','Tab հաջողությամբ ջնջվել է');
    }
}
