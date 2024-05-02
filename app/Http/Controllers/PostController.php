<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $cluster = array(
            'posts' => Post::latest()->simplePaginate(6),
            'authors' => User::all(),
        );

        return view('posts.index', ['cluster' => $cluster]);
    }

    public function showCreatePostForm()
    {
        return view('posts.create', ['page' => 'Create Post', 'categories' => Category::all()]);
    }

    public function showEditPostForm(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'page' => 'Edit Post', 'categories' => Category::all()]);
    }

    public function show(Post $post)
    {
        $categories = Category::withCount('posts')->get();
        return view('posts.detail', ['post' => $post, 'page' => 'Post Detail', 'categories' => $categories]);
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

        return redirect('/posts/manage')->with('message', 'Post created successfully!');
    }

    public function update(Request $request, Post $post)
    {

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required|string',
            'tags' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('uploads', 'public');
        }


        $post->update($formFields);
        return redirect('/posts/manage')->with('message', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $post->delete();

        return back()->with('message', 'Post deleted successfully!');
    }

    public function manage(Post $post)
    {

        return view('posts.manage', ['posts' => auth()->user()->posts()->get(), 'page' => 'Manage Posts']);
    }
}
