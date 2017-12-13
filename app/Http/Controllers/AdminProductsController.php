<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        //return $input;

        Product::create($input);

        session()->flash('product_created', 'Product has been created');

        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::pluck('name', 'id');

        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        //
        $product = Product::findOrFail($id);

        if($file = $request->file('photo_id')) {
            $input = $request->all();

            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        } else {
            $input = $request->except('photo_id');
        }

        $product->update($input);

        session()->flash('product_updated', 'Product has been updated');

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        Photo::find($product->photo->id)->delete();

        unlink(public_path().$product->photo->file);

        $product->delete();

        session()->flash('product_deleted', 'Product has been deleted');
    }

    public function deleteProducts(Request $request) {

        //
        //return $request->all();
        if(isset($request->delete_selected) && !empty($request->checkBoxArray)) {

            $products = Product::findOrFail($request->checkBoxArray);

            foreach($products as $product) {

                if($product->photo != null) {
                    unlink(public_path() . $product->photo->file);
                    Photo::findOrFail($product->photo_id)->delete();
                }

                $product->delete();
            }
        } else {
            return redirect()->back();
        }

        session()->flash('delete_selected', 'Selected products have been deleted');

        return redirect('/admin/products');
    }
}
