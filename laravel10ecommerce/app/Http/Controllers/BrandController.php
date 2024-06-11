<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands',
            'image' => 'nullable|image|max:2048',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/brands'), $imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->back()->with('success', 'Brand added successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        
        if ($brand->image && file_exists(public_path('brands/' . $brand->image))) {
            unlink(public_path('brands/' . $brand->image));
        }
        
        $brand->delete();
        
        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }
}
