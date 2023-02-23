<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function media(){
        return view('media');
    }


    // public function search(Request $request){
    //     $fromDate = $request->fromDate;
    //     $toDate   = $request->toDate;
    //     $search = $request->search;

    //     $query = DB::table('news')
    //             ->select()
    //             ->when(!empty($search) && !empty($fromDate) && !empty($toDate), function($q) {
    //                 return $q->where('created_at', '>=', request('fromDate'))
    //                         ->where('created_at', '<=', request('toDate'))
    //                         ->where('title_am', 'LIKE', '%'.request('search').'%')
    //                         ->orWhere('content_am', 'LIKE', '%'.request('search').'%');
    //             })->when(!empty($search) && empty($fromDate) && empty($toDate), function($q) {
    //                 return $q->where('title_am', 'LIKE', '%'.request('search').'%')
    //                         ->orWhere('content_am', 'LIKE', '%'.request('search').'%');
    //             })->get();


    //     return view('media')->with('query', $query);
    // }
}
