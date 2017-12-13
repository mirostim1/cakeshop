<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index() {

        //
        $categories = Category::all();

        $products = Product::all();

        return view('products.index', compact('categories', 'products'));
    }

    public function show($name) {

        //
        $categories = Category::all();

        if($name == 'All') {

            $products = Product::all();

            $cat = 'All Products';

        } else {

            $cat = Category::where('name', '=', $name)->firstOrFail();

            $products = Product::all()->where('category_id', $cat->id);

            $cat = $cat->name;
        }

        return view('products.index', compact('categories', 'products', 'cat'));
    }

    public function product($slug) {

        //
        $categories = Category::all();

        $product = Product::where('slug', $slug)->firstOrFail();

        //return $product->name;

        return view('product.index', compact('categories', 'product'));
    }

    public function sort(Request $request) {

        //
        $categories = Category::all();

        if($request->category == 'All Products') {
            $cat = 'All Products';

            if($request->sort == 1 || $request->sort == 3) {
                if($request->sort == 1) {
                    $sortby = 'price';
                } elseif($request->sort == 3) {
                    $sortby = 'name';
                }

                $products = Product::all()->sortBy($sortby);

            } elseif($request->sort == 2 || $request->sort == 4) {
                if($request->sort == 2) {
                    $sortby = 'price';
                } elseif($request->sort == 4) {
                    $sortby = 'name';
                }

                $products = Product::all()->sortByDesc($sortby);
            }

            $cat = $request->category;

            return view('products.index', compact('categories', 'products', 'cat'));

        } else {
            $cat = Category::where('name', '=', $request->category)->firstOrFail();

            if($request->sort == 1 || $request->sort == 3) {

                if($request->sort == 1) {
                    $sortby = 'price';
                } elseif($request->sort == 3) {
                    $sortby = 'name';
                }

                $products = Product::all()->where('category_id', '=', $cat->id)->sortBy($sortby);
            }

            if($request->sort == 2 || $request->sort == 4) {

                if($request->sort == 2) {
                    $sortby = 'price';
                } elseif($request->sort == 4) {
                    $sortby = 'name';
                }

                $products = Product::all()->where('category_id', '=', $cat->id)->sortByDesc($sortby);
            }

            $cat = $request->category;

            return view('products.index', compact('categories', 'products', 'cat'));
        }
    }
}
