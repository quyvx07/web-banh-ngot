<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    public function index()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4);
        $sale_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        $cart = Session::get('cart');
        $product_type = ProductType::all();
        return view('layout.index', compact('slide', 'new_product', 'sale_product', 'cart', 'product_type'));
    }

    public function getProductType($type)
    {
        $product_type = Product::where('id_type', $type)->get();
        $product_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $type = ProductType::all();
        $type_sp = ProductType::findOrFail($type);
        return view('layout.ProductType', compact('product_type', 'product_khac', 'type', 'type_sp'));
    }

    public function getProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::where("id_type", $product->id_type)->paginate(3);
        return view('layout.ProductDetail', compact('product', 'products'));
    }

    public function getContact()
    {
        return view('layout.contact');
    }

    public function getAbout()
    {
        return view('layout.about');
    }

    public function getAdCart($productId)
    {
        $product = Product::findOrFail($productId);
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
        } else {
            $oldCart = null;
        }
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        Session::put('cart', $cart);
        Session::flash('success', 'Thêm sản phẩm khỏi giỏ hàng thành công');
        return redirect()->back();
    }

    public function getShoppingCart()
    {
        $cart = Session::get('cart');
        return view('layout.shopping_cart', compact('cart'));
    }

    public function checkOut()
    {
        return view('layout.checkout');
    }


}
