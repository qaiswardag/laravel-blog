<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

//The Seven Restful Controller Actions in Controllers
// index, show, create, store, edit, update, destroy

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(10)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    // create
    public function create()
    {
        return view('admin.posts.create');
    }

    // store
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
}
