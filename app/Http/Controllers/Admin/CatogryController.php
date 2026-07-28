<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CatogryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::latest()->paginate(10);
    
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
{
    return view('admin.categories.create');
}
public function store(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255|unique:categories,name',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ],[
        'name.required' => 'Category name is required.',
        'name.unique'   => 'Category already exists.',
        'image.required'=> 'Please select a category image.',
        'image.image'   => 'Only image files are allowed.',
        'image.mimes'   => 'Only JPG, JPEG, PNG and WEBP images are allowed.',
        'image.max'     => 'Image size must be less than 2MB.',
    ]);

    $imageName = time().'_'.uniqid().'.'.$request->image->getClientOriginalExtension();

    $request->image->move(
        public_path('uploads/categories'),
        $imageName
    );

    Category::create([
        'name'  => $request->name,
        'slug'  => Str::slug($request->name),
        'image' => $imageName,
    ]);

    return redirect('/admin/categories')
    ->with('success', 'Category Added Successfully');
}
public function edit($id)
{
    $category = Category::findOrFail($id);

    return view('admin.categories.edit', compact('category'));
}



public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $request->validate([
        'name'  => 'required|unique:categories,name,' . $id,
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imageName = $category->image;

    if ($request->hasFile('image')) {

        // Purani image delete
        if ($category->image && file_exists(public_path('uploads/categories/' . $category->image))) {
            unlink(public_path('uploads/categories/' . $category->image));
        }

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/categories'),
            $imageName
        );
    }

    $category->update([
        'name'  => $request->name,
        'slug'  => Str::slug($request->name),
        'image' => $imageName,
    ]);

    return redirect('/admin/categories')
            ->with('success', 'Category Updated Successfully');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);

    $category->delete();

    return redirect('/admin/categories')
            ->with('success', 'Category Deleted Successfully');
}

}
