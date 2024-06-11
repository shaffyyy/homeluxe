<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Cart; // Import the Cart facade

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'locality' => 'required|string|max:255',
            'landmark' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            's_name' => 'nullable|string|max:255',
            's_phone' => 'nullable|string|max:15',
            's_locality' => 'nullable|string|max:255',
            's_landmark' => 'nullable|string|max:255',
            's_address' => 'nullable|string|max:255',
            's_city' => 'nullable|string|max:255',
            's_country' => 'nullable|string|max:255',
            's_state' => 'nullable|string|max:255',
            's_zip' => 'nullable|string|max:10',
            'sameAsBilling' => 'nullable|boolean',
            'saveAddress' => 'nullable|boolean',
            'payment_method' => 'required|string|in:cod,debit,paypal',
        ]);

        // Log the authenticated user ID
        Log::info('Authenticated User ID:', ['user_id' => Auth::id()]);

        // Retrieve the cart items
        $cartItems = Cart::instance('cart')->content();

        // Calculate order details
        $subtotal = Cart::instance('cart')->subtotal(2, '.', ''); // Example calculation
        $discount = 0; // Example value
        $tax = Cart::instance('cart')->tax(2, '.', ''); // Example calculation
        $total = Cart::instance('cart')->total(2, '.', ''); // Example calculation

        // Log the cart items and totals
        Log::info('Cart items:', $cartItems->toArray());
        Log::info('Order totals:', compact('subtotal', 'discount', 'tax', 'total'));

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'locality' => $validated['locality'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'country' => $validated['country'],
            'landmark' => $validated['landmark'],
            'zip' => $validated['zip'],
            'type' => 'home', // Adjust if needed
            'status' => 'ordered', // Default status
            'is_shipping_different' => isset($validated['sameAsBilling']) ? !$validated['sameAsBilling'] : false,
        ]);

        // Log the created order
        Log::info('Created order:', $order->toArray());

        // Add order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'options' => json_encode($item->options), // Add options if any
                'rstatus' => false,
            ]);
        }

        // Handle shipping details
        if ($order->is_shipping_different) {
            Shipping::create([
                'order_id' => $order->id,
                'name' => $validated['s_name'],
                'phone' => $validated['s_phone'],
                'locality' => $validated['s_locality'],
                'address' => $validated['s_address'],
                'city' => $validated['s_city'],
                'state' => $validated['s_state'],
                'country' => $validated['s_country'],
                'landmark' => $validated['s_landmark'],
                'zip' => $validated['s_zip'],
                'type' => 'home', // Adjust if needed
            ]);
        }

        // Create a transaction
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'mode' => $validated['payment_method'],
            'status' => 'pending', // Default status
        ]);

        // Clear the cart
        Cart::instance('cart')->destroy();

        // Redirect to the success page with the transaction ID
        return redirect()->route('order.success', ['transactionId' => $transaction->id]);
    }

    public function success($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        return view('thankyou', compact('transaction'));
    }
}
