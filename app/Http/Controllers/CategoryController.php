<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Carbon;

use Auth;

use App\Models\category;

class CategoryController extends Controller
{


public function Allcat(){


return view('admin.category.index');




}


public function Addcat(Request $request ){

    $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',

    ],
[
'category_name.required'=>'please the category name is required'

],
[


'category_name.max'=>'sorry man the letter most be less than 255'

],







);

// category::insert([

// 'category_name'=>$request->category_name,

// 'user_id' =>Auth::user()->id,

// 'created_at' =>Carbon::now(),


// ]);

$category =new category;


$category->category_name=$request->category_name;


$category->user_id =Auth::user()->id;

$category->save();



return Redirect()->back()->with('success','category is inserted  in database');




    }





}
