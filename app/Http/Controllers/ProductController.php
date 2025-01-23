<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplepaginate(4);
        // $products = Product::get(); //fetching data from tables
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);


        //image upload code
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->type = $request->type;


        $product->save();
        return back()->withSuccess('Product Created!!!');
    }

    public function edit($id)
    {
        $product = Product::where('_id', $id)->first();
        return view('products.edit', ['product' => $product]);

        // dd($product->description);

    }

    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $product = Product::where('_id', $id)->first();


        //image upload code
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated!!!');
    }

    public function delete($id)
    {
        $product = Product::where('_id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted.');
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        // if ($request->has('name')) {
        //     $query->where('name', 'like', '%' . $request->input('name') . '%');
        // }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            // dd("First else");
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        } elseif ($request->filled('min_price')) {
            // dd("second else");
            $query->where('price', '>=', $request->input('min_price'));
        } elseif ($request->filled('max_price')) {
            // dd("third else");
            $query->where('price', '<=', $request->input('max_price'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $products = $query->get();
        // dd($products);
        // dd($query->getBindings());
        return view('products.search', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('type', 'like', '%' . $query . '%')
            ->orWhere('category', 'like', '%' . $query . '%')
            ->get();

        return view('products.search', compact('products'));
    }
}
