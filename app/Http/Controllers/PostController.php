<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Post $post)
    {
        $posts = Post::query();
        if ($request->has('category_id')) {
            $posts->where('category_id', $request->get('category_id'));
        }
        $posts = $posts->get();

        $categories = Category::query();
        $order = $request->get('order');

        if ($order === "desc") {
            $categories->orderByDesc('name');
        } else {
            $categories->orderBy('name');
        }

        $categories = $categories->get();

        // compact('var1', 'var2') ---> ['var1' => $var1, 'var2' => $var2]
        // farklı avantajları/dezavantajları var

        return view('layout.index', compact('post', 'posts', 'categories', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'editor' => 'required|string',
            'title' => 'required|string|max:250',
            'content' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $post = new Post;

        $post->category()->associate($request->input('category_id'));
        $post->editor = $request->input('editor');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image_url =  $profileImage;

        $post->save();

        return redirect()->route('admin', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $posts = Post::query();
        $posts = $posts->get();
        return view('post.show', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'editor' => 'required|string',
            'title' => 'required|string|max:250',
            'content' => 'nullable|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post->category()->associate($request->input('category_id'));
            $post->editor = $request->input('editor');
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->image_url =  $profileImage;
        } else {
            $post->category()->associate($request->input('category_id'));
            $post->editor = $request->input('editor');
            $post->title = $request->input('title');
            $post->content = $request->input('content');
        }
        $post->save();

        return redirect()->route('admin', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin');
    }
}
