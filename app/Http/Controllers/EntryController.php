<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Category;
use Auth;

class EntryController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFeed() {

        $user_id = Auth::user()->id;

    	$entries = Entry::where('user_id',$user_id)
            ->orderBy('date', 'DESC')
            ->orderBy('updated_at','DESC')
            ->get();

        $dates = Entry::where('user_id',$user_id)
            ->orderBy('date', 'DESC')
            ->distinct()
            ->paginate(4,['date']);

        $year = Entry::where('user_id',$user_id)
            ->whereYear('date','=',date('Y'))
            ->sum('expense');

        $month = Entry::where('user_id',$user_id)
            ->whereMonth('date',date('m'))
            ->whereYear('date',date('Y'))
            ->sum('expense');

        $cats = Category::all();


        return view('entries.feed',compact('entries','dates','year','month','cats'));
    }

    public function postEntry(Request $request) {

    	$new_entry = new Entry();

        $new_entry->user_id = Auth::user()->id;
    	$new_entry->title = $request->title;
    	$new_entry->date = date("y-m-d",strtotime($request->date));
    	$new_entry->expense = $request->expense;
    	$new_entry->category_id = $request->category;
    	$new_entry->save();

    }

    public function editModal(Request $request) {
        $id = $request->id;

        $entry = Entry::find($id);
        $cats = Category::all();

        return view('entries/edit_modal',compact('entry','cats'));
    }

    public function updateEntry(Request $request) {
        $id = $request->id;

        $entry = Entry::find($id);
        $entry->title = $request->title;
        $entry->date = date("y-m-d",strtotime($request->date));
        $entry->expense = $request->expense;
        $entry->category_id = $request->category;
        $entry->save();
    }

    public function deleteEntry(Request $request) {
        $id = $request->id;

        $entry = Entry::find($id);
        $entry->delete();
    }

    public function infiniteScroll() {

        $user_id = Auth::user()->id;

        $entries = Entry::where('user_id',$user_id)
            ->orderBy('date', 'DESC')
            ->orderBy('updated_at','DESC')
            ->get();

        $dates = Entry::where('user_id',$user_id)
            ->orderBy('date', 'DESC')
            ->distinct()
            ->paginate(4,['date']);

        return view('entries.feed_entries',compact('entries','dates'));
    }

    public function showSummary($month,$year) {

        $monthNow = $month;
        $yearNow = date("Y",strtotime($year."-01-01"));

        $user_id = Auth::user()->id;

        $allEntries = Entry::where('user_id',$user_id)
            ->whereYear('date',$year);

        $entries = Entry::where('user_id',$user_id)
            ->whereMonth('date',$month)
            ->whereYear('date',$year)
            ->get();

        $cats = Category::all();

        $total = $entries->sum('expense');

        return view('entries.summary',compact('total','cats','entries','monthNow','yearNow','allEntries')); 
    }


}

