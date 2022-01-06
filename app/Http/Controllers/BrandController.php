<?php

namespace App\Http\Controllers;
use App\Models\Multipic;
use Illuminate\Http\Request;

use App\Models\Brand;

use Illuminate\support\Carbon;

use Image;

class BrandController extends Controller
{



//middlware auth


public function __construct()
{
    $this->middleware('auth');
}




public function Allbrand(){

$brands = Brand::latest()->paginate(5);


return view('admin.brand.index',compact('brands'));

}

public function Storebrand(Request $request){

    $validated = $request->validate([

'brand_name' =>'required|unique:brands|min:5',
'brand_image' =>'required|mimes:jpg,jpeg,png'

    ],

    [
        'brand_name.required' =>'plaese input brand name',

        'brand_image.min' => 'plase the rand name most be bigger than 3 letter'



    ]



    );


    $brand_image = $request->file('brand_image');


    // $img_ext = strtolower($brand_image->getClientOriginalExtension());
    //  $img_name = $name_gen . '.' . $img_ext;

    //  $upload_location = 'image/brand/';

    //  $last_img = $upload_location . $img_name;

    //  $brand_image->move($upload_location,$img_name);


    $name_gen = hexdec(uniqid()) . '.' . $brand_image->extension();
    Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

    $last_img = 'image/brand/' . $name_gen;








     Brand::insert([

'brand_name' =>$request->brand_name,

'brand_image'=>    $last_img,

'created_at'=>Carbon::now(),

     ]);

     return Redirect()->back()->with('success','Brand file is inserted   in database');




}

public function Edit($id){

    $brands = Brand::find($id);


return view('admin.brand.edit',compact('brands'));



}




public function update(Request $request, $id)
{
    $request->validate([
        'brand_name' => 'required|min:4',
        'brand_image' => 'mimes:jpg,bmp,png'
    ]);

     $old_image = $request->old_image;
    $brand_image = $request->file('brand_image');
    // if ($old_logo && $brand_image) {
    //     unlink($old_logo);
    // }

     $brand = Brand::find($id);

    if ($brand_image) {
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload_location = 'image/brand/'; // inside public directory
        $last_img = $upload_location . $img_name;
        $brand_image->move($upload_location, $img_name);


        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' =>Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Brand successfully updated');

    } else {

        Brand::find($id)->update([
            'brand_name' => $request->name
        ]);

        return Redirect()->back()->with('success', 'Brand successfully updated');
    }

    // return Redirect()->back()->with('success', 'Brand successfully updated');
}



public function delete($id){


    $image = Brand::find($id);


    $old_image =$image->brand_image;

    unlink($old_image);



    Brand::find($id)->delete($id);

    return Redirect()->back()->with('success', 'Brand deleted successfully ');



}



public function Multipic(){

    $images =Multipic::all();

return view('admin.multi.index',compact('images'));




}



public function Multiadd(Request $request){



    $image = $request->file('image');

foreach($image as $multi_image)

{





    $name_gen = hexdec(uniqid()) . '.' . $multi_image->extension();
    Image::make($multi_image)->resize(300, 200)->save('image/multi/' . $name_gen);

    $last_img = 'image/multi/' . $name_gen;








     Multipic::insert([



'image'=>    $last_img,

'created_at'=>Carbon::now(),

     ]);
    }; //foreach end

     return Redirect()->back()->with('success','mult images file is inserted   in database');












}







}
