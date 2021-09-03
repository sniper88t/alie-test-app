<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);      
    }

    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'manufactured_year' => $request->input('manufacture_year'),
        ]);
        $product->save();

        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        var_dump($product);
        $product->update($request->all());

        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product deleted!');
    }

    public function upload(Request $request){
            
        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $product = new Product;

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $product->name = time().'_'.$request->file->getClientOriginalName();
            $product->path = '/storage/' . $file_path;
            $product->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }
}
