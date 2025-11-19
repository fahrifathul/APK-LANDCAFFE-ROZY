<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['menus' => function ($q) {
            $q->where('is_available', true)->orderBy('name');
        }])->orderBy('name')->get();

        // Pick some favorite menus (latest available) to showcase on home page
        $favoriteMenus = Menu::with('category')
            ->where('is_available', true)
            ->latest()
            ->take(4)
            ->get();

        // Simple best sellers (latest for now). Replace with real metrics when available
        $bestSellers = Menu::with('category')
            ->where('is_available', true)
            ->latest()
            ->take(8)
            ->get();

        // All menus to show on home page (without prices)
        $allMenus = Menu::with('category')
            ->where('is_available', true)
            ->orderBy('name')
            ->get();

        return view('home', compact('categories', 'favoriteMenus', 'bestSellers', 'allMenus'));
    }

    public function menu(Request $request)
    {
        $categoryId = $request->query('category');
        $search = $request->query('q');
        $categories = Category::orderBy('name')->get();

        $query = Menu::with('category')->where('is_available', true);
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
        $menus = $query->orderBy('name')->paginate(12)->withQueryString();

        return view('public.menu', compact('categories', 'menus', 'categoryId', 'search'));
    }

    public function about()
    {
        return view('public.about');
    }
}
