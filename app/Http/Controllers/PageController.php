<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

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
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
        // dd($new_product);
        // print_r($slide);
        // exit;
        // return view('page.trangchu');
        // return view('page.trangchu',['slide'=>$slide]);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
        return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }
    public function getChitiet(Request $req)
    {
        $sanpham = Product::where('id', $req->id)->first();
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham', compact('sanpham', 'sp_tuongtu'));
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
