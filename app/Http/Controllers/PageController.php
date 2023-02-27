<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    //
    public function getIndex()
    {
        $slide = Slide::all();
        // $new_product = Product::where('new', 1)->get();
        //tien hanh phan trang 4sp
        $new_product = Product::where('new', 1)->paginate(4);
        //tao bien sp khuyen mai 
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 'unit_price')->paginate(8);
        // dd($new_product);
        // print_r($slide);
        // exit;
        // return view('page.trangchu');
        // return view('page.trangchu',['slide'=>$slide]);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }
    public function getLoaiSp()
    {
        return view('page.loai_sanpham');
    }
    public function getChitiet()
    {
        return view('page.chitiet_sanpham');
    }
    public function getLienHe()
    {
        return view('page.lienhe');
    }
    public function getGioiThieu()
    {
        return view('page.gioithieu');
    }
}
