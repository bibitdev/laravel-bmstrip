<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // -------------------- Categories --------------------
    /**
     * List categories for admin management.
     */
    public function categoriesIndex()
    {
        $categories = Category::orderBy('name')->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a new category.
     */
    public function categoriesStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    /**
     * Update an existing category.
     */
    public function categoriesUpdate(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    /**
     * Delete a category.
     */
    public function categoriesDestroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }

    // -------------------- Wisatas --------------------
    /**
     * List wisatas for admin management.
     */
    public function wisatasIndex()
    {
        $wisatas = Wisata::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.wisatas.index', compact('wisatas'));
    }

    /**
     * Show create wisata form.
     */
    public function wisatasCreate()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.wisatas.create', compact('categories'));
    }

    /**
     * Store a new wisata.
     */
    public function wisatasStore(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:wisatas,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'published' => 'sometimes|boolean',
        ]);

        $data['published'] = $request->has('published');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/wisata'), $filename);
            $data['image'] = $filename;
        }

        Wisata::create($data);

        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata berhasil ditambahkan.');
    }

    /**
     * Show edit wisata form.
     */
    public function wisatasEdit(Wisata $wisata)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.wisatas.edit', compact('wisata', 'categories'));
    }

    /**
     * Update an existing wisata.
     */
    public function wisatasUpdate(Request $request, Wisata $wisata)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:wisatas,slug,' . $wisata->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'published' => 'sometimes|boolean',
        ]);

        $data['published'] = $request->has('published');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($wisata->image && file_exists(public_path('uploads/wisata/' . $wisata->image))) {
                unlink(public_path('uploads/wisata/' . $wisata->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/wisata'), $filename);
            $data['image'] = $filename;
        }

        $wisata->update($data);

        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata berhasil diupdate.');
    }

    /**
     * Delete a wisata.
     */
    public function wisatasDestroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata berhasil dihapus.');
    }

    // -------------------- Users --------------------
    /**
     * List users.
     */
    public function usersIndex()
    {
        $users = User::orderBy('name')->paginate(50);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Update user's role.
     */
    public function usersUpdate(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => 'required|string|in:user,admin',
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    /**
     * Delete a user.
     */
    public function usersDestroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }
}
