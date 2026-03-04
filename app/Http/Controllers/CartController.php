<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $items = [];
        $subtotal = 0;
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $itemSubtotal = $product->price * $quantity;

                $items[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'name_ar' => $product->name_ar,
                    'price' => $product->price,
                    'currency' => $product->currency ?? 'AED',
                    'image' => $product->image,
                    'quantity' => $quantity,
                    'subtotal' => $itemSubtotal,
                ];
                $subtotal += $itemSubtotal;
                $total += $itemSubtotal;
            }
        }

        return view('cart', compact('items', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        
        if (!$product->is_active) {
            return response()->json(['success' => false, 'message' => 'Product is not available'], 400);
        }

        $cart = Session::get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }

        Session::put('cart', $cart);
        
        $cartCount = array_sum($cart);

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart!',
            'cart_count' => $cartCount
        ]);
    }

    public function update(Request $request, $productId)
    {
        $quantity = $request->input('quantity', 1);
        
        if ($quantity < 1) {
            return $this->remove($productId);
        }

        $cart = Session::get('cart', []);
        $cart[$productId] = $quantity;
        Session::put('cart', $cart);

        $product = Product::findOrFail($productId);
        $subtotal = $product->price * $quantity;
        
        $total = 0;
        foreach (Session::get('cart', []) as $id => $qty) {
            $p = Product::find($id);
            if ($p) {
                $total += $p->price * $qty;
            }
        }

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'total' => $total,
            'cart_count' => array_sum($cart)
        ]);
    }

    public function remove($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);

        $total = 0;
        foreach ($cart as $id => $qty) {
            $product = Product::find($id);
            if ($product) {
                $total += $product->price * $qty;
            }
        }

        return response()->json([
            'success' => true,
            'total' => $total,
            'cart_count' => array_sum($cart)
        ]);
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $items = [];
        $subtotal = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $itemSubtotal = $product->price * $quantity;

                $items[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'name_ar' => $product->name_ar,
                    'price' => $product->price,
                    'currency' => $product->currency ?? 'AED',
                    'image' => $product->image,
                    'quantity' => $quantity,
                    'subtotal' => $itemSubtotal,
                ];
                $subtotal += $itemSubtotal;
            }
        }

        // Flat delivery fee per order (applied at checkout)
        $deliveryFee = 5.00; // AED
        $grandTotal = $subtotal + $deliveryFee;

        // Branch WhatsApp numbers from env
        // Format: Country code + number without leading zero, no spaces, no quotes
        // Example (UAE): 971 + 547864839 = 971547864839
        // .env keys: RESTAURANT_WHATSAPP_BARSHA, RESTAURANT_WHATSAPP_AL_RAWADA
        $barshaWhatsApp = trim(env('RESTAURANT_WHATSAPP_BARSHA', ''));
        $alRawadaWhatsApp = trim(env('RESTAURANT_WHATSAPP_AL_RAWADA', ''));
        
        // Remove any spaces, dashes, or special characters (keep only digits)
        $barshaWhatsApp = preg_replace('/[^0-9]/', '', $barshaWhatsApp);
        $alRawadaWhatsApp = preg_replace('/[^0-9]/', '', $alRawadaWhatsApp);
        
        // Fallback to defaults if empty
        if (empty($barshaWhatsApp)) {
            $barshaWhatsApp = '971547864839'; // Default Barsha
        }
        if (empty($alRawadaWhatsApp)) {
            $alRawadaWhatsApp = '971547864838'; // Default Al Rawada
        }
        
        $branches = [
            'barsha' => [
                'key' => 'barsha',
                'label' => 'Barsha Branch',
                'whatsapp' => $barshaWhatsApp,
            ],
            'al_rawada' => [
                'key' => 'al_rawada',
                'label' => 'Al Rawada Branch',
                'whatsapp' => $alRawadaWhatsApp,
            ],
        ];
        
        return view('checkout', compact('items', 'subtotal', 'deliveryFee', 'grandTotal', 'branches'));
    }

    public function clear()
    {
        Session::forget('cart');
        return response()->json(['success' => true]);
    }

    public function count()
    {
        $cart = Session::get('cart', []);
        return response()->json(['count' => array_sum($cart)]);
    }
}
