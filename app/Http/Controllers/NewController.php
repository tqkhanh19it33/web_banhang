<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class NewController extends Controller
{
   
    public function all_new(){
        $all_new = DB::table('tbl_new')->select('tbl_new.*')->orderBy('tbl_new.new_id','desc')->get();
        $manager_new = view('admin.new.all_new')->with('all_new', $all_new);
        return view('admin.new.all_new')->with('all_new', $all_new)->with('manager_new', $manager_new);
    }
    public function add_new(){
        return view('admin.new.add_new');
    }

    public function save_new(Request $request){
        $data = array();
        $data['new_title'] = $request->new_title;
        $data['new_desc'] = $request->new_desc;
        $data['new_content'] = $request->new_content;
        $data['new_status'] = $request->new_status;
        $get_image = $request->file('new_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/new', $new_image);
            $data['new_image'] = $new_image;
            DB::table('tbl_new')->insert($data);
            return Redirect::to('/all-new');
        }
        $data['new_image'] = '';
        
        DB::table('tbl_new')->insert($data);
        return Redirect::to('/add-new');
    }
    public function hide_new($new_id){
        DB::table('tbl_new')->where('new_id', $new_id)->update(['new_status' => 0]);
        // Session::put('message', 'Hiện thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-new');
    }
    public function show_new($new_id){
        DB::table('tbl_new')->where('new_id', $new_id)->update(['new_status' => 1]);
        // Session::put('message', 'Ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-new');
    }
    public function delete_new($new_id){
        DB::table('tbl_new')->where('new_id', $new_id)->delete();
        return Redirect::to('/all-new');
    }
    public function edit_new($new_id){
        $edit_new = DB::table('tbl_new')->where('new_id',$new_id)->get();
        $manager_new = view('admin.new.update_new')->with('edit_new', $edit_new);
        return view('admin_layout')->with('admin.new.update_new', $manager_new);
    }
    public function update_new(Request $request, $new_id){
        $data = array();
        $data['new_title'] = $request->new_title;
        $data['new_desc'] = $request->new_desc;
        $data['new_content'] = $request->new_content;
        $data['new_status'] = $request->new_status;
        $get_image = $request->file('new_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/new', $new_image);
            $data['new_image'] = $new_image;
            DB::table('tbl_new')->where('new_id',$new_id)->update($data);
            return Redirect::to('/all-new');
        }
        DB::table('tbl_new')->where('new_id',$new_id)->update($data);
        return Redirect::to('/all-new');
    }

    public function new_details($new_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $details_new = DB::table('tbl_new')->where('tbl_new.new_id', $new_id)->get();
        return view('pages.new.new_details')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('new_details', $details_new)
        ->with('all_slider', $all_slider);
    }
}
