<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request) {
    	$category = new Category();

    	$category->name = $request->name;
    	$category->icon = $request->icon;
    	$category->save();

    	return redirect('admin');
    }

    public function editCat(Request $request) {
        $id = $request->id;

        $cat = Category::find($id);

        return view('categories/edit_cat',compact('cat'));
    }

    public function updateCat(Request $request,$id) {

    	$category = Category::find($id);
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();

        return redirect('admin');
    }

    public function deleteCat($id) {

    	$category = Category::find($id);
        $category->delete();

        return redirect('admin');
    }
}
