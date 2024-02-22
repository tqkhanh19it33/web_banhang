<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_product(){
        $this->AuthLogin();
        return view('/admin.category.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.category.all_category_product')->with('all_category_product', $all_category_product);
        return view('/admin_layout')->with('admin.category.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_describe'] = $request->category_describe;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category_product')->insert($data);
        return Redirect::to('/all-category-product');
    }

    public function hide_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status' => 0]);
        // Session::put('message', 'Hiện danh mục sản phẩm thành công!');
        return Redirect::to('/all-category-product');
    }

    public function show_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status' => 1]);
        // Session::put('message', 'Ẩn danh mục sản phẩm thành công!');
        return Redirect::to('/all-category-product');
    }

    public function edit_category_product($category_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_id)->get();
        $manager_category_product = view('admin.category.update_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.category.update_category_product', $manager_category_product);

    }

    public function update_category_product(Request $request, $category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_describe'] = $request->category_describe;

        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        return Redirect::to('/all-category-product');
    }

    public function delete_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        return Redirect::to('/all-category-product');
    }
    //end admin
    public function show_category($category_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $name_category = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id', $category_id)->where('product_status', '0')->get();
        return view('pages.category.show_category')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('category_by_id', $category_by_id)
        ->with('name_category', $name_category)
        ->with('all_slider', $all_slider);
    }

}
