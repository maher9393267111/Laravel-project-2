<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Carbon;

use Illuminate\Support\Facades\DB;

use Auth;

use App\Models\category;

class CategoryController extends Controller
{


 public function __construct()
{
    $this->middleware('auth');
}






public function Allcat(){

// $categories=DB::table('categories')->join('users','categories.user_id','users.id')
// ->select('categories.*','users.name')->latest()->paginate(5);






$categories = Category::latest()->paginate(5);

// $categories =DB::table('categories')->latest()->paginate(5);

$trashed_categories = category::onlyTrashed()->latest()->paginate(3);

return view('admin.category.index',compact('categories','trashed_categories'));




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

category::insert([

'category_name'=>$request->category_name,

'user_id' =>Auth::user()->id,

'created_at' =>Carbon::now(),


]);



//-----------------------------------------------
// $category =new category;


// $category->category_name=$request->category_name;


// $category->user_id =Auth::user()->id;

// $category->save();

//--------------------------------------------------------


// $data =array();


// $data['category_name']=$request->category_name;

// $data['user_id'] = Auth::user()->id;

// DB::table('categories')->insert($data);


return Redirect()->back()->with('success','category is inserted  in database');




    }


    public function Edit($id){

        $categories = category::find($id);


return view('admin.category.edit',compact('categories'));



    }

    public function Update(Request $request, $id){

        $update = category::find($id)->update([

'category_name' =>$request->category_name,

'user_id' =>Auth::user()->id


        ]);

        return Redirect()->route('all.category')->with('success','category is upated succsesfuly man');






    }


public function Softdelete($id){


$categories =category::find($id)->delete();


return Redirect()->back()->with('success','the item is deleted successfully');

}


public function Restore($id){

$restore =category::withTrashed()->find($id)->restore();


return Redirect()->back()->with('success','the table is restored successfully');



}



public function Delete($id){

$pdelete =category::onlyTrashed()->find($id)->forceDelete();

    return Redirect()->back()->with('success','the table is deleted for ever successfully');


}




}
