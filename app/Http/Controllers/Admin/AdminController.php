<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_categories' => Category::count(),
            'active_categories' => Category::where('is_active', true)->count(),
        ];

        $recent_products = Product::with('category')->latest()->take(5)->get();
        $recent_categories = Category::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_products', 'recent_categories'));
    }
}
