<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController {
    public function add(Request $request) {
        $productId = $request->input('product_id');
        $size = $request->input('sizeOptions');
        $action = $request->input('action', 'add');

        $cartKey = $productId . '_' . $size;
        $cart = session()->get('cart', []);

        if ($action === 'decrease') {
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity']--;
                if ($cart[$cartKey]['quantity'] <= 0)
                    unset($cart[$cartKey]);
            }
        }
        elseif ($action === 'remove') {
            unset($cart[$cartKey]);
        }
        else {
            if (isset($cart[$cartKey]))
                $cart[$cartKey]['quantity']++;
            else {
                $product = Product::find($productId);
                $image = $product->images->first();

                $cart[$cartKey] = [
                    'id' => $productId,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'size' => $size,
                    'image' => $image ? $image->url : null
                ];
            }
        }

        session()->put('cart', $cart);
        ##dd(session()->get('cart'));

        return redirect()->back();
    }
}
