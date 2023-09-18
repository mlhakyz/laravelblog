<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request, Post $post)
    {

        $request->validate([
            'username' => 'required|max:30',
            'password' => 'required',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        //$bilgi = Bilgiler::whereId(3)->first();
        if (Auth::attempt(['email' => $username, 'password' => $password])) {
            session()->put('username', $username);
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
    public function index(Post $post)
    {
        $posts = Post::query();

        $posts = $posts->get();

        $categories = Category::query();

        $categories->orderBy('name');

        $categories = $categories->get();
        return view('admin.index', compact('post', 'posts', 'categories')); // Gideceğin sayfa...
    }
    public function getLogout()
    {
        Auth::logout();
        session()->forget('username');
        return redirect()->route('adminlogin');
    }
    public function category(Request $request, Post $post)
    {
        $categories = Category::query();
        $order = $request->get('order');

        if ($order === "desc") {
            $categories->orderByDesc('name');
        } else {
            $categories->orderBy('name');
        }

        $categories = $categories->get();

        return view('admin.category', compact('categories', 'order'));
    }
}
