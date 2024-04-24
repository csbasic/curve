<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {

        $cluster = array(
            'posts' => Post::latest()->simplePaginate(6),
            'categories' => Category::all(),
            'authors' => User::all(),
        );

        return view('posts.index', ['cluster' => $cluster]);
    }

    public function showCreatePostForm()
    {
        return view('posts.create', ['page' => 'Create Post']);
    }

    public function showEditPostForm(Post $post)
    {

        return view('posts.edit', ['post' => $post, 'page' => 'Edit Post']);
    }

    public function show(Post $post)

    {
        return view('posts.detail', ['post' => $post, 'page' => 'Post Detail']);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('uploads', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);

        return redirect('/')->with('message', 'Post created successfully!');
    }

    public function update(Request $request, Post $post)
    {

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }


        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $post->update($formFields);
        return back()->with('message', 'Post updated successfully!');
    }

    public function destroy(Request $request, Post $post)
    {

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }


        $formFields['status'] = 0;
        $post->update($formFields);

        return back()->with('message', 'Post deleted successfully!');
    }

    public function manage(Request $request)
    {

        $posts =    DB::table('posts')

            ->latest()
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as author_name', 'categories.name as category', 'users.email')
            ->where('posts.user_id', auth()->id())
            ->where('posts.status', 1)
            ->get();

        return view('posts.manage', ['posts' => $posts, 'page' => 'Manage Posts']);
    }
}
