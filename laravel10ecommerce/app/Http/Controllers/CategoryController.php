<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $image = $request->image;

        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('category',$imagename);

            $category->image = $imagename;
        }
        
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully.');
    }            
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'slug' => 'required|max:255|unique:categories,slug,' . $id,
            'image' => 'nullable|image|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $image = $request->image;

        if ($image) {
            // Delete the old image if it exists
            if ($category->image && file_exists(public_path('category/' . $category->image))) {
                unlink(public_path('category/' . $category->image));
            }

            // Save the new image
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('category'), $imagename);
            $category->image = $imagename;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        if ($category->image && file_exists(public_path('category/' . $category->image))) {
            unlink(public_path('category/' . $category->image));
        }
        
        $category->delete();
        
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }


}
