<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.category.index',[
            'title'=>'Dashboard Category',
            'company'=>'KitaBantu',
            'list'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.category.create',[
            'title'=>'Dashboard Category',
            'company'=>'KitaBantu',
            'subteks'=>'Create Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required',
        ]);

        $name = $request->input('name');

        $slug = str::slug($name);

        $originalSlug = $slug;
        $counter= 1;

        while (Category::where('slug', $slug)->exists()){
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Category::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        flash()->success('Category Successfull Added Has Been');
        return redirect('/dashboard/admin/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // return view('dashboard.admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.admin.category.edit',compact('category'),[
            "title"=>'Dashboard Category',
            "company"=>'KitaBantu',
            "subteks"=>'Edit Category',
            "category"=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules =[
            'name'=>'required'
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:categories';
        }
        $validateData = $request->validate($rules);

        Category::where('id',$category->id)
        ->update($validateData);


        flash()->success('Category Successfull Updated Has Been');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        flash()->success('Category deleted successfully');

        return redirect()->route('category.index');
    }
}
