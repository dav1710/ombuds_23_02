<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\Admin\UpdateLinkRequest;

class LinkController extends Controller
{
    public function index() 
	{
		return view('admin.link.index', [
			'link' => Link::first()
		]);
	}

	public function edit() 
	{
		return view('admin.link.edit', [
			'link' => Link::first()
		]);
	}

	public function update(UpdateLinkRequest $request)
	{
		Link::first()->update($request->all());

		return redirect()->route('link.index')->with('success', 'Հղումը հաջողությամբ փոփոխվել է');
	}
}
