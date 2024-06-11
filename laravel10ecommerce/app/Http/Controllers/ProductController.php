<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:products|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required|max:255',
            'stock_status' => 'required|in:instock,outofstock',
            'featured' => 'boolean',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image|max:2048',
            'images.*' => 'image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $data = $request->all();

        // Handling the main image
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('/products'), $imageName);
            $data['image'] = $imageName;
        }

        // Handling additional images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $images[] = $imageName;
            }
            $data['images'] = json_encode($images);
        }

        Product::create($data);

        return redirect()->back()->with('success', 'Product added successfully.');
    }
    public function destroy($id)
    {
        // if ($product->image && file_exists(public_path('products/' . $product->image))) {
        //     unlink(public_path('products/' . $product->image));
        // }

        // $product->delete();

        // return redirect()->back()->with('success', 'Product deleted successfully.');

        $product = Product::findOrFail($id);
        
        if ($product->image && file_exists(public_path('category/' . $product->image))) {
            unlink(public_path('products/' . $product->image));
        }
        
        $product->delete();
        
        return redirect()->back()->with('success', 'product deleted successfully.');
    }

    // public function page()
    // {
    //     $products = Product::with(['category', 'brand'])->paginate(10);
    //     return view('products.index', compact('products'));
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:products,slug,'.$id.'|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required|max:255',
            'stock_status' => 'required|in:instock,outofstock',
            'featured' => 'boolean',
            'quantity' => 'required|integer|min:1',
            'image' => 'image|max:2048',
            'images.*' => 'image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::findOrFail($id);

        $data = $request->all();

        // Handling the main image
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('/products'), $imageName);
            $data['image'] = $imageName;
        }

        // Handling additional images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('/products'), $imageName);
                $images[] = $imageName;
            }
            $data['images'] = json_encode($images);
        }

        $product->update($data);

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function index(Request $request)
    {
        $products = Product::paginate(12);
        $users = User::where('utype', 'ADM')->get();
        $u_users = User::where('utype', 'USR')->get();
        $productsCount = Product::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.index', [
            'users' => $users,
            'u_users' => $u_users,
            'products' => $products,
            'productsCount' => $productsCount,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $products = Product::query();

        if ($search) {
            $products = $products->where('name', 'LIKE', "%{$search}%")
                                 ->orWhere('slug', 'LIKE', "%{$search}%")
                                 ->orWhere('SKU', 'LIKE', "%{$search}%");
        }

        $products = $products->paginate(12);

        $users = User::where('utype', 'ADM')->get();
        $u_users = User::where('utype', 'USR')->get();
        $productsCount = Product::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.index', [
            'users' => $users,
            'u_users' => $u_users,
            'products' => $products,
            'productsCount' => $productsCount,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
