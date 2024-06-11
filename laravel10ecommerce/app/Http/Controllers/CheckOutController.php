<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
class CheckOutController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $cartItems = Cart::instance('cart')->content();
        return view('checkOut', ['cartItems'=>$cartItems, 'user'=>$user]);
    }
}
