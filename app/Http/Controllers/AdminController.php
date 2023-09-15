<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function login(Request $request, Post $post)
    {
        $request->validate([
            'username' => 'required|max:30',
            'password' => 'required',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $username, 'password' => $password])) {

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

            return view('admin.index', compact('post', 'posts', 'categories', 'order')); // Gideceğin sayfa...
        } else {
            return redirect()->back()->with('error', 'yok');
        }
    }
}
