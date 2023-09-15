<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // if(auth()->guest() || auth()->user()->username !== 'dogolius'){
        //     abort(403);
        // }

        $this->authorize('admin');

        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:40',
            'slug' => 'required',
            'image' => 'image|file|max:5120',
        ]);

        if($request->file('image')){
            $imagePath = $request->file('image')->store('public/categories-images');
            $validatedData['image'] = preg_replace('[public/]', '', $imagePath);
        }

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category  berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        foreach($posts as $post){
            if($post->image){
                $post_image = $post->image;
                unlink(storage_path('app/public/'.$post_image));
            }
            Post::destroy($post->id);
        }
        if($category->image){
            $category_image = $category->image;
            unlink(storage_path('app/public/'.$post_image));
        }
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category berhasil dihapus');
    }
}
