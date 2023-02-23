<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatisticRequest;
use App\Models\StaticText;
use App\Models\Statistic;
use App\Models\Tab;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistic::orderBy('created_at','desc')->get();
        return view('admin.statistics.index', [
            'statistics' => $statistics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistics.create', [
			'tabs' => Tab::all()
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatisticRequest $request)
    {
        $data = $request->all();

        $filename = $request->file('preview_image')->getClientOriginalName();
        // dd($filename);
        Image::make($request->file('preview_image'))->resize(null, 400)->save(public_path('uploads/statistics/' . $filename));
        $data['preview_image'] = $filename;


        Statistic::create($data);
		return redirect()->route('statistics.index')->with('success', 'Վիճակագրությունը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('statistics_page', [
            'statistics' => Statistic::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', [
            'statistic' => $statistic,
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
    public function update(StatisticRequest $request, $id)
    {
        $statistics = Statistic::findOrFail($id);
        $statistics->link = $request->link;
        if ($request->hasFile('preview_image')) {
            if ($statistics->preview_image) {
                File::delete(public_path('uploads/statistics/' . $statistics->preview_image));
            }
            $filename = $request->file('preview_image')->hashName();
            $img = Image::make($request->file('preview_image'))->resize(null, 400)->save(public_path('uploads/statistics/' . $filename));
            $statistics->preview_image = $filename;
        }
        $statistics->update();
        return redirect()->route('statistics.index')->with('success', 'Վիճակագրությունը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statistics = Statistic::findOrFail($id);

        if ($statistics->preview_image) {
            File::delete(public_path('uploads/statistics/' . $statistics->preview_image));
        }

        $statistics->delete();
        return redirect()->route('statistics.index')->with('success','Վիճակագրությունը հաջողությամբ ջնջվել է');
    }
}
