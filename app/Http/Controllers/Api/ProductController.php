<?php

namespace App\Http\Controllers\Api;

//import Model "Product"
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "ProductResource"
use App\Http\Resources\ProductResource;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $prods = Product::latest()->paginate(5);

        //return collection of posts as a resource
        return new ProductResource(true, 'Data User', $prods);
    }
    public function show($id)
    {
        //find post by ID
        $prod = Product::find($id);

        //return single post as a resource
        return new ProductResource(true, 'Detail Data Product!', $prod);
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'account_name'     => 'required',
            'account_number'     => 'required',
            'bank_id'   => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $prod = Product::create([

            'bank_id'   => $request->bank_id,
            'account_name'     => $request->account_name,
            'account_number'     => $request->account_number,
            'status'   => $request->status,
        ]);

        //return response
        return new ProductResource(true, 'Get account', $prod);
    }
    public function edit(Product $product)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [

            'bank_id'   => 'required',
            'account_name'     => 'required',
            'account_number'     => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $prod = Product::find($id);

        //update post without image
        $prod->update([

            'bank_id'   => $request->bank_id,
            'account_name'     => $request->account_name,
            'account_number'     => $request->account_number,
            'status'   => $request->status,
            'info'      => $request->info
        ]);


        //return response
        return new ProductResource(true, 'Data Product Berhasil Diubah!', $prod);
    }

    public function destroy($id)
    {

        //find post by ID
        $prod = Product::find($id);
        //delete post
        $prod->delete();

        //return response
        return new ProductResource(true, 'Data Berhasil Dihapus!', null);
    }
}
