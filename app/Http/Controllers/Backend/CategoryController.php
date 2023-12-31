<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Services;

class CategoryController extends Controller
{
    public function CategoryView(){

    	$category = Category::latest()->get();
    	return view('admin.category.category_view',compact('category'));
    } //end


    public function CategoryStore(Request $request){

        $request->validate([
             'category_name' => 'required',

         ],[
             'category_name.required' => 'Input Brand Name',

         ]);



     Category::insert([
         'category_name' => $request->category_name,
         'brand_bn' => $request->brand_bn,


         ]);

         $notification = array(
             'message' => 'Brand Inserted Successfully',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);

     } // end method

     public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('admin.category.category_edit',compact('category'));

    }


    public function CategoryUpdate(Request $request ,$id){



      Category::findOrFail($id)->update([
		'category_name' => $request->category_name,
		'slug' => strtolower(str_replace(' ', '-',$request->category_name)),

    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.category')->with($notification);


    } // end method

    public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Brand Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method


    public function frontCategory($frontCat_id){

        $fron_cat = Services::where('category_id',$frontCat_id)->get();

        return view('frontend.categoryAll.category',compact('fron_cat'));


    }



}
