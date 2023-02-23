<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Http\Requests\Admin\AddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::orderBy('created_at','desc')->get();
        return view('admin.address.index', [
            'address' => $address
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
		Address::create($request->all());
		return redirect()->route('address.index')->with('success','Հասցեն հաջողությամբ ավելացել է');
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
    public function edit(Address $address)
    {
        return view('admin.address.edit', [
            'address' => $address,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(AddressRequest $request, $id){
        Address::findOrFail($id)->update($request->all());
        return redirect()->route('address.index')->with('success','Հասցեն հաջողությամբ փոփոխվել է');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::findOrFail($id)->delete();
        return redirect()->route('address.index')->with('success','Հասցեն հաջողությամբ ջնջվել է');
    }
}





