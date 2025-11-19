<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category')->orderBy('name')->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $relativePath = 'menus/'.uniqid().'.jpg';
            $fullPath = storage_path('app/public/'.$relativePath);
            // Ensure directory exists
            if (!is_dir(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }
            // Resize/cover and save optimized JPEG
            Image::read($file)
                ->cover(800, 600)
                ->save($fullPath, 85);
            $data['image'] = $relativePath;
        }

        $data['is_available'] = $request->boolean('is_available');

        $menu = Menu::create($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => "Admin membuat menu: {$menu->name}",
        ]);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $file = $request->file('image');
            $relativePath = 'menus/'.uniqid().'.jpg';
            $fullPath = storage_path('app/public/'.$relativePath);
            if (!is_dir(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }
            Image::read($file)
                ->cover(800, 600)
                ->save($fullPath, 85);
            $data['image'] = $relativePath;
        }

        $data['is_available'] = $request->boolean('is_available');

        $menu->update($data);
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => "Admin memperbarui menu: {$menu->name}",
        ]);
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        $name = $menu->name;
        $menu->delete();
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => "Admin menghapus menu: {$name}",
        ]);
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
