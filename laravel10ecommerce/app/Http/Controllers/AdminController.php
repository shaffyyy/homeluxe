<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('utype', 'ADM')->get();
        $u_users = User::where('utype', 'USR')->get();
        $products = Product::paginate(12);
        $productsCount = Product::count();
        $brands = Brand::all();
        $categories = Category::all();
        // Fetch all orders and eager load necessary relationships
        $orders = Order::with(['transaction', 'orderItems.product'])->get();
    
        return view('admin.index', [
            'users'=> $users,
            'u_users'=> $u_users,
            'products'=> $products,
            'productsCount'=> $productsCount,
            'categories'=> $categories,
            'brands'=> $brands,
            'orders'=> $orders,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email', 'phone_number', 'address'));

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}