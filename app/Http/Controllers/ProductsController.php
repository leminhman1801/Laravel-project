<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        do {
            $id = Str::random(10);
            $existingProduct = Products::where('ID', $id)->first();
        } while ($existingProduct);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
        $product = Products::create([
            'ID' => $id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
        ]);

       
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function details($id)
    {
        $product = Products::find($id);
        return view('products.details', ['product' => $product]);
    }
    
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
        Products::where('ID',$id)->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    public function delete($id) {
        
        Products::where('ID',$id)->delete();
        return redirect()->back();
      
    }
    public function trash()
    {
        $products = Products::onlyTrashed()->get();
        
        return view('products.trash-products', compact('products'));
    }
    public function restore($id)
    {
        $product = Products::where('ID', $id);
        $product->restore();
    
    return redirect()->route('products.index')->with('success', 'Product restored successfully.');
    }
    public function destroy($id) {
        
        Products::where('ID',$id)->forceDelete();
        return redirect()->back();
      
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Products::where('name', 'like', '%'.$query.'%')->get();
        return view('products.index', compact('products'));
    }
}
