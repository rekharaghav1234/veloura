<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
{
    $products = Product::latest()->paginate(5);

    return view(
        'admin.products.index',
        compact('products')
    );
}
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'        => 'required|string|max:255',
        
            'category_id' => 'required|exists:categories,id',

        'gender' => 'required|in:Men,Women,Kids',
        
            'price'       => 'required|numeric|min:1',
        
            'stock'       => 'required|integer|min:0',
        
            'description' => 'required|string|max:5000',
        
            'images'      => 'required|array|min:1|max:4',
        
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        
        ],[
            'images.required'   => 'Please upload at least one image.',
            'images.array'      => 'Invalid image format.',
            'images.min'        => 'Upload at least one image.',
            'images.max'        => 'Maximum 4 images are allowed.',
        
            'images.*.image'    => 'Each file must be an image.',
            'images.*.mimes'    => 'Only JPG, JPEG, PNG and WEBP images are allowed.',
            'images.*.max'      => 'Each image size must be less than 2MB.',
        ]);
   
        $images = [];

        if ($request->hasFile('images')) {
        
            foreach ($request->file('images') as $image) {
        
                $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
        
                $image->move(public_path('uploads/products'), $imageName);
        
                $images[] = $imageName;
            }
        }
        // dd($images);
        // dd($request->all());
       
    Product::create([

    'category_id' => $request->category_id,

    'name' => $request->name,

    'gender' => $request->gender,

    'slug' => Str::slug($request->name).'-'.time(),

    'description' => $request->description,

    'images' => json_encode($images),

    'price' => $request->price,

    'stock' => $request->stock,

    'featured' => 1,

]);
  
        return redirect('/admin/products')
                ->with('success', 'Product Added Successfully');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);

    $categories = Category::all();

    return view(
        'admin.products.edit',
        compact('product', 'categories')
    );
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name'        => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'gender'      => 'required|in:Men,Women,Kids',
        'price'       => 'required|numeric|min:1',
        'stock'       => 'required|integer|min:0',
        'description' => 'required|string|max:5000',

        'images'      => 'nullable|array|max:4',
        'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $images = json_decode($product->images, true) ?? [];

    if ($request->hasFile('images')) {

        // Purani images delete
        foreach ($images as $img) {

            $path = public_path('uploads/products/'.$img);

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $images = [];

        foreach ($request->file('images') as $image) {

            $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/products'), $imageName);

            $images[] = $imageName;
        }
    }

    $product->update([

        'category_id' => $request->category_id,
        'name'        => $request->name,
        'gender'      => $request->gender,
        'slug'        => Str::slug($request->name).'-'.time(),
        'description' => $request->description,
        'images'      => json_encode($images),
        'price'       => $request->price,
        'stock'       => $request->stock,

    ]);
    $product->save();

    return redirect('/admin/products')
            ->with('success','Product Updated Successfully');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect('/admin/products')
            ->with('success', 'Product Deleted');
}

public function orders()
{
    $orders = Order::latest()->paginate(5); // ✅ get() ki jagah paginate(5)

    return view('admin.orders.index', compact('orders'));
}

public function orderDetails($id)
{
    $order = Order::findOrFail($id);

    return view(
        'admin.orders.details',
        compact('order')
    );
}
public function updateOrderStatus($id)
{
    $order = Order::findOrFail($id);

    if($order->status == 'Pending')
    {
        $order->status = 'Delivered';
    }
    else
    {
        $order->status = 'Pending';
    }

    $order->save();

    return redirect()->back();
}
}