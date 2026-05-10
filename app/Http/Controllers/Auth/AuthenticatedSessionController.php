<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();
        $sessionCart = session()->get('cart', []);
        $dbCarts = \App\Models\Cart::with('product.images')->where('user_id', $user->id)->get();

        foreach ($dbCarts as $dbCart) {
            $cartKey = $dbCart->product_id . '_' . $dbCart->size;

            if (!isset($sessionCart[$cartKey])) {
                $image = $dbCart->product->images->first();
                $sessionCart[$cartKey] = [
                    'id' => $dbCart->product_id,
                    'name' => $dbCart->product->name,
                    'quantity' => $dbCart->quantity,
                    'price' => $dbCart->product->price,
                    'size' => $dbCart->size,
                    'image' => $image ? $image->url : null
                ];
            }
        }

        session()->put('cart', $sessionCart);

        \App\Models\Cart::where('user_id', $user->id)->delete();

        foreach ($sessionCart as $item) {
            \App\Models\Cart::create([
                'user_id' => $user->id,
                'product_id' => $item['id'],
                'size' => $item['size'],
                'quantity' => $item['quantity']
            ]);
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
