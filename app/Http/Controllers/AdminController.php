<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Auth;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    public function admin()
    {
    	$users = User::paginate(10);
    	$total = User::all();

        $cats = Category::all();


		return view('admin',compact('users','total','cats'));
    }

    public function editUser(Request $request,$id) {

        $user = User::find($id);

        $user->type = $request->type;
        $user->save();

        return redirect('admin');
    }
}
