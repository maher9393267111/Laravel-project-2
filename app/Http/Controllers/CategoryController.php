<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

]





);


    }



}
