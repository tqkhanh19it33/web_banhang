<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $new_product = DB::table('tbl_product')->where('product_new','0')->orderBy('product_id','desc')->get();
        $all_new = DB::table('tbl_new')->select('tbl_new.*')->orderBy('tbl_new.new_id','desc')->get();
        return view('pages.home')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('new_product', $new_product)
            ->with('all_slider', $all_slider)
            ->with('all_new', $all_new);
    }
    public function search(Request $request){
        $key =  $request->keywords;
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $all_new = DB::table('tbl_new')->select('tbl_new.*')->orderBy('tbl_new.new_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->where('product_status','0')->get();
        return view('pages.product.search')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('search_product',$search_product)
            ->with('all_slider', $all_slider)
            ->with('all_new', $all_new);
    }

    public function show_news(){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $new_product = DB::table('tbl_product')->where('product_new','0')->orderBy('product_id','desc')->get();
        $all_new = DB::table('tbl_new')->select('tbl_new.*')->where('tbl_new.new_status','0')->orderBy('tbl_new.new_id','desc')->get();
        return view('pages.new.show_news')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('new_product', $new_product)
            ->with('all_slider', $all_slider)
            ->with('all_new', $all_new);
    }

}
