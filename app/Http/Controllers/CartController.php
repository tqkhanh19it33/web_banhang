<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Filesystem\Filesystem;
use  Illuminate\Http\UploadedFile;


class CartController extends Controller
{
    public function add_cart(Request $request){
        $product_ID = $request->product_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$product_ID)->first();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        return view('pages.cart.show_cart')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('all_slider', $all_slider);
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request){
        $rowId = $request->row_id_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
