<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        $cartItems = Cart::instance('cart')->content();
        $cartWishlist = Cart::instance('wishlist')->content();

        // Eager load transactions and order items
        $orders = Order::with(['transaction', 'orderItems.product'])
                        ->where('user_id', $users->id)
                        ->get();

        return view('users.index', compact('users', 'orders', 'cartItems', 'cartWishlist'));
    }
    


}
