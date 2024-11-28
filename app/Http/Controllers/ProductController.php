<?php

namespace App\Http\Controllers;

use App\Config\Configuration;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use League\Flysystem\Adapter\Local;


class ProductController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('createProduct');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'description' => 'string',
        ]);

        $errors = $validator->errors();

        foreach ($errors->all() as $error) {
            echo $error . '<br>';
        }

        if ($validator->fails()) {
            return redirect(Configuration::PRODUCTS_CREATE_PATH);
        }

        $imageName = null;
        if ($request->hasFile(Configuration::KEY_VALUE_IMAGE)) {
            $imageName = time() . '.' . $request->file(Configuration::KEY_VALUE_IMAGE)->getClientOriginalExtension();
            $destinationPath = base_path(Configuration::PUBLIC_IMAGES_PATH . $request->sku);
            $request->file(Configuration::KEY_VALUE_IMAGE)->move($destinationPath, $imageName);
        }

        $product = new Product;
        $product->fill($request->except([Configuration::KEY_VALUE_IS_PUBLISHED, Configuration::KEY_VALUE_IMAGE]));
        $product->is_published = $request->has(Configuration::KEY_VALUE_IS_PUBLISHED);
        $product->image = $imageName;
        $product->save();

        return redirect(Configuration::PRODUCTS_LIST_PATH);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('editProduct', compact('product'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->except([Configuration::KEY_VALUE_IS_PUBLISHED, Configuration::KEY_VALUE_IMAGE]));
        $product->is_published = $request->has(Configuration::KEY_VALUE_IS_PUBLISHED);
        if ($request->hasFile(Configuration::KEY_VALUE_IMAGE)) {
            $imageName = time() . '.' . $request->file(Configuration::KEY_VALUE_IMAGE)->getClientOriginalExtension();
            $destinationPath = base_path(Configuration::PUBLIC_IMAGES_PATH . $request->sku);
            $request->file(Configuration::KEY_VALUE_IMAGE)->move($destinationPath, $imageName);
            $product->image = $imageName;
        }
        $product->save();

        return redirect(Configuration::PRODUCTS_LIST_PATH);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function delete($id)
    {
        Product::destroy($id);

        return redirect(Configuration::PRODUCTS_LIST_PATH);
    }
}
