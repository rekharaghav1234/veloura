<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/banners'), $imageName);

        Banner::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image' => $imageName,
            'status' => 1,
        ]);

        return redirect()->route('admin.banners')
            ->with('success','Banner Added Successfully');
    }

    public function edit($id)
{
    $banner = Banner::findOrFail($id);

    return view('admin.banner.edit', compact('banner'));
}

public function update(Request $request, $id)
{
    $banner = Banner::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'subtitle' => 'nullable',
        'button_text' => 'nullable',
        'button_link' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    if ($request->hasFile('image')) {

        if ($banner->image && file_exists(public_path('uploads/banners/'.$banner->image))) {
            unlink(public_path('uploads/banners/'.$banner->image));
        }

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/banners'), $imageName);

        $banner->image = $imageName;
    }

    $banner->title = $request->title;
    $banner->subtitle = $request->subtitle;
    $banner->button_text = $request->button_text;
    $banner->button_link = $request->button_link;
    $banner->status = $request->status;

    $banner->save();

    return redirect()->route('admin.banners')
            ->with('success','Banner Updated Successfully');
}
}