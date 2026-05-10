<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller {
    public function showDelivery() {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        $user = auth()->user();
        $deliveryData = session()->get('checkout.delivery', []);

        return view('delivery_details', [
            'user' => $user,
            'deliveryData' => $deliveryData
        ]);
    }

    public function processDelivery(Request $request) {
        $validated = $request->validate([
            'deliveryMethod' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:255'
        ]);

        session()->put('checkout.delivery', $validated);

        return redirect()->route('checkout.contact');
    }

    public function showContact() {
        if (!session()->has('checkout.delivery')) {
            return redirect()->route('checkout.delivery');
        }

        $user = auth()->user();
        $contactData = session()->get('checkout.contact', []);
        $deliveryData = session()->get('checkout.delivery', []);

        return view('contact_info', [
            'user' => $user,
            'contactData' => $contactData,
            'deliveryData' => $deliveryData
        ]);
    }

    public function processContact(Request $request) {
        $validated = $request->validate([
            'paymentMethod' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:255'
        ]);

        session()->put('checkout.contact', $validated);

        return redirect()->route('checkout.summary');
    }

    public function showSummary() {
        if (!session()->has('checkout.contact')) {
            return redirect()->route('checkout.contact');
        }

        $cart = session()->get('cart', []);
        $deliveryData = session()->get('checkout.delivery');
        $contactData = session()->get('checkout.contact');

        $cost = 0;
        foreach ($cart as $item) {
            $cost += $item['price'] * $item['quantity'];
        }

        $discount = 0;
        $deliveryCost = $deliveryData['deliveryMethod'] === 'homeDelivery' ? 3 : 0;
        $totalCost = $cost - $discount + $deliveryCost;
        $vat = $totalCost * 0.23;

        return view('checkout', [
            'cart' => $cart,
            'deliveryData' => $deliveryData,
            'contactData' => $contactData,
            'cost' => $cost,
            'discount' => $discount,
            'deliveryCost' => $deliveryCost,
            'totalCost' => $totalCost,
            'vat' => $vat
        ]);
    }

    public function placeOrder(Request $request) {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        $deliveryData = session()->get('checkout.delivery');
        $contactData = session()->get('checkout.contact');

        $cost = 0;
        foreach ($cart as $item) {
            $cost += $item['price'] * $item['quantity'];
        }

        $deliveryCost = $deliveryData['deliveryMethod'] === 'homeDelivery' ? 3 : 0;
        $totalPrice = $cost + $deliveryCost;

        DB::transaction(function () use ($cart, $deliveryData, $contactData, $totalPrice) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'delivery_method' => $deliveryData['deliveryMethod'],
                'payment_method' => $contactData['paymentMethod'],
                'total_price' => $totalPrice,
                'first_name' => $contactData['first_name'],
                'last_name' => $contactData['last_name'] ?? '',
                'email' => $contactData['email'],
                'phone' => $contactData['phone'],
                'country' => $contactData['country'],
                'street' => $contactData['street'],
                'city' => $contactData['city'] ?? '',
                'zip_code' => $contactData['zip_code']
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
        });

        session()->forget(['cart', 'checkout.delivery', 'checkout.contact']);

        return redirect('/')->with('status', 'Order placed successfully');
    }
}
