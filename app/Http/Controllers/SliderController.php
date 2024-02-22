<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Filesystem\Filesystem;
use  Illuminate\Http\UploadedFile;
session_start();

class SliderController extends Controller
{
    public function management_slider(){
        $all_slider = DB::table('tbl_slider')->select('tbl_slider.*')->orderBy('tbl_slider.slider_id','desc')->get();
        $manager_slider = view('admin.slider.management_slider')->with('all_slider', $all_slider);
        return view('admin.slider.management_slider')->with('all_slider', $all_slider)->with('manager_slider', $manager_slider);
    }

   
    public function add_slider(){
        return view('admin.slider.add_slider');
    }
    public function save_slider(Request $request){
        $data = array();
        $data['slider_h1'] = $request->slider_h1;
        $data['slider_h2'] = $request->slider_h2;
        $data['slider_p'] = $request->slider_p;
        $data['slider_status'] = $request->slider_status;
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/slider', $new_image);
            $data['slider_image'] = $new_image;
            DB::table('tbl_slider')->insert($data);
            return Redirect::to('/management-slider');
        }
        $data['slider_image'] = '';
        
        DB::table('tbl_slider')->insert($data);
        return Redirect::to('/add-slider');
    }
    public function hide_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id', $slider_id)->update(['slider_status' => 0]);
        // Session::put('message', 'Hiện thương hiệu sản phẩm thành công!');
        return Redirect::to('/management-slider');
    }
    public function show_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id', $slider_id)->update(['slider_status' => 1]);
        // Session::put('message', 'Ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('/management-slider');
    }
    public function delete_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id', $slider_id)->delete();
        return Redirect::to('/management-slider');
    }
    public function edit_slider($slider_id){
        $edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
        $manager_slider = view('admin.slider.update_slider')->with('edit_slider', $edit_slider);
        return view('admin_layout')->with('admin.slider.update_slider', $manager_slider);
    }
    public function update_slider(Request $request, $slider_id){
        $data = array();
        $data['slider_h1'] = $request->slider_h1;
        $data['slider_h2'] = $request->slider_h2;
        $data['slider_p'] = $request->slider_p;
        $data['slider_status'] = $request->slider_status;
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/slider', $new_image);
            $data['slider_image'] = $new_image;
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
            return Redirect::to('/management-slider');
        }
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
        return Redirect::to('/management-slider');
    }
}
