<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.post.index',[
            'title'=>'Dashboard Post',
            'company'=>'KitaBantu',
            'list'=>Post::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.post.create',[
            'title'=>'Dashboard Post',
            'company'=>'KitaBantu',
            'subteks'=>'Create Post',
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id' =>'required',
            'photo'=>'required|image|max:2048'
        ]);

       try{
        DB::beginTransaction();

        $name = $request->input('name');

        $category_id = $request->input('category_id');

        $slug = str::slug($name);

        $originalSlug = $slug;
        $counter= 1;

        while (Post::where('slug', $slug)->exists()){
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

       $post = Post::create([
            'name' => $name,
            'category_id' =>$category_id,
            'slug' => $slug
        ]);

            // Menambahkan foto ke MediaLibrary
            if ($request->hasFile('photo')) {
                $post->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        DB::commit();

            flash()->success('Post Successfull Added Has Been');
        return redirect()->route('post.index');

       }catch (\Throwable $th) {
        // jika terjadi error

        // batalkan simpan data user
        DB::rollBack();

        // kembalikan pesan error
        !app()->isProduction()
            ? flash()->addError($th->getMessage())
            : flash()->addError('Terjadi kesalahan pada server, coba lagi');

        return back()->withInput();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.admin.post.edit', compact('post'),[
            "title"=>'Dashboard Post',
            "company"=>'KitaBantu',
            "subteks"=>'Edit Post',
            'categories'=> Category::all(),
            "post"=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            'name'=>'required',
            'category_id' =>'required',
            'photo'=>'image|max:2048'
        ];
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:categories';
        }

        if ($request->hasFile('photo')) {
            // // hapus photo lama
            $post->clearMediaCollection('photos');

            // upload photo baru
            $post->addMediaFromRequest('photo')->toMediaCollection('photos');
            // Menambahkan foto ke MediaLibrary
        }

        $validateData = $request->validate($rules);

        Post::where('id',$post->id)
        ->update($validateData);




        flash()->success('Post Successfull Updated Has Been');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash()->success('Category deleted successfully');

        return redirect()->route('category.index');
    }
}
