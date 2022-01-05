<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;

use Illuminate\support\Carbon;


class BrandController extends Controller
{


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
    $name_gen = hexdec(uniqid());

    $img_ext = strtolower($brand_image->getClientOriginalExtension());
     $img_name = $name_gen . '.' . $img_ext;

     $upload_location = 'image/brand/';

     $last_img = $upload_location . $img_name;

     $brand_image->move($upload_location,$img_name);






     Brand::insert([

'brand_name' =>$request->brand_name,

'brand_image'=>    $last_img,

'created_at'=>Carbon::now(),

     ]);

     return Redirect()->back()->with('success','Brand file is inserted   in database');




}



// public function add(Request $request)
// {
//     $request->validate([
//         'brand_name' => 'required|unique:brands|min:4',
//         'brand_image' => 'required|mimes:jpg,bmp,png'
//     ]);

//     $brand = new Brand();
//     $brand_image = $request->file('brand_image');
//     if ($brand_image) {
//         // without Intervention/image pacakge
//         // $name_gen = hexdec(uniqid());
//         // $img_ext = strtolower($brand_image->extension());
//         // $img_name = $name_gen . '.' . $img_ext;
//         // $upload_location = 'image/brand/'; // inside public directory
//         // $last_img = $upload_location . $img_name;
//         // $brand_image->move($upload_location, $img_name);
//         // $brand->logo = $last_img;

//         // with Intervention/image pacakge
//         $name_gen = hexdec(uniqid()) . '.' . $brand_image->extension();
//         Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);
//         // Image::make($brand_image)->save('image/brand/' . $name_gen); // not resize
//         $last_img = 'image/brand/' . $name_gen;
//         $brand->brand_image = $last_img;
//     }

//     $brand->brand_name = $request->brand_name;
//     $brand->save();

//     return Redirect()->back()->with('success', 'Brand successfully created');
// }




}
