<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get active categories
        $categories = Category::where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();

        // Get active products, filter by category if provided
        $productsQuery = Product::where('is_active', true)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        // Filter by category if category parameter is provided
        if ($request->has('category') && $request->category) {
            $productsQuery->where('category_id', $request->category);
        }

        $products = $productsQuery->get();
        $selectedCategory = $request->category;

        // Get branch WhatsApp numbers for floating button (Barsha / Al Rawada)
        $barshaWhatsApp = trim(env('RESTAURANT_WHATSAPP_BARSHA', ''));
        $alRawadaWhatsApp = trim(env('RESTAURANT_WHATSAPP_AL_RAWADA', ''));
        
        // Remove any spaces, dashes, or special characters (keep only digits)
        $barshaWhatsApp = preg_replace('/[^0-9]/', '', $barshaWhatsApp);
        $alRawadaWhatsApp = preg_replace('/[^0-9]/', '', $alRawadaWhatsApp);
        
        // Fallback to defaults if empty (UAE format)
        if (empty($barshaWhatsApp)) {
            $barshaWhatsApp = '971547864839';
        }
        if (empty($alRawadaWhatsApp)) {
            $alRawadaWhatsApp = '971547864838';
        }

        return view('welcome', compact('categories', 'products', 'selectedCategory', 'barshaWhatsApp', 'alRawadaWhatsApp'));
    }
}
