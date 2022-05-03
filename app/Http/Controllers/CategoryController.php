<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $allCategoriesCount = Category::count(); 
       
        $categories = Category::all();

        if($categories->isEmpty()){
            session()->flash('delete', 'No Category Found! Create a new one!!!');
            return redirect()->route('categories.create');
        }
            return view('admin.category.index', compact('categories', 'allCategoriesCount'));
    }

    public function managecategory(){
        return view('admin.category.master');
    }


    public function create()
    {
        $category = new Category;
        return view('admin.category.create', compact('category'));
    }

 
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
       
        $category->save();
        session()->flash('save', 'Category Saved!!!');
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;

        $category->update();
        session()->flash('update', 'Category Updated!!!');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('delete', 'Category Deleted!!!');
        return redirect()->route('categories.index');
    }
}