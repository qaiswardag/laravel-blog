<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // request data from create post view
        //        ddd(request()->all());


        $validated = request()->validate([
            'title' => ['required'],
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', 'min:1', 'max:255', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        // add user to $validated
        $validated['user_id'] = auth()->id();

        $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($validated);

        return redirect('/');


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // which post are we editing?: the one associated with the uri
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {


        $validated = request()->validate([
            'title' => ['required'],
            'thumbnail' => ['image'],
            'slug' => ['required', 'min:1', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);


        if (isset($validated['thumbnail'])) {
            $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }


        $post->update($validated);

        return back()->with('success', 'Post have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post have been delete');

    }
}
