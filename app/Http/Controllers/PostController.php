<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    // show all listings
    public function index()
    {

        $cluster = array(
            'posts' => Post::latest()->paginate(6),
            'categories' => Category::all(),
            'authors' => User::all(),
        );

        return view('posts.index', ['cluster' => $cluster]);
    }


    // move to create post page 
    public function showCreatePostForm()
    {
        return view('posts.create', ['page' => 'Create Post']);
    }


    // navigate to post edit page
    public function showEditPostForm(Post $post)
    {
        // dd(auth()->id());
        // dd($post);
        // $post = DB::table('posts')
        //     ->latest()
        //     ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        //     // ->rightJoin('comments', 'posts.id', '=', 'comments.post_id')
        //     ->join('categories', 'posts.category_id', '=', 'categories.id')
        //     ->select('posts.*', 'users.name as author_name', 'categories.name as category', 'users.email')
        //     ->where('posts.user_id', auth()->id())
        //     ->where('posts.id', $request->id + 0)
        //     ->where('posts.status', 1)
        //     ->get();
        // dd($post);
        return view('posts.edit', ['post' => $post, 'page' => 'Edit Post']);
    }

    // Show single post
    public function show(Post $post)

    {
        // dd($post);
        // dd($request->user_id);
        // $post =    DB::table('posts')

        //     ->latest()
        //     ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        //     // ->rightJoin('comments', 'posts.id', '=', 'comments.post_id')
        //     ->join('categories', 'posts.category_id', '=', 'categories.id')
        //     ->select('posts.*', 'users.name as author_name', 'categories.name as category', 'users.email')
        //     ->where('posts.id', $request->id + 0)
        //     ->where('posts.status', 1)
        //     ->get();
        // dd($post[0]->user_id);
        return view('posts.detail', ['post' => $post, 'page' => 'Post Detail']);
    }


    // save post into database
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

    // update post data
    public function update(Request $request, Post $post)
    {
        // dd($post);
        // dd($post->user_id);
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // dd($post);
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        // dd('w');
        // if ($request->hasFile('image')) {
        //     $formFields['image'] = $request->file('image')->store('uploads', 'public');
        // }

        $post->update($formFields);
        return back()->with('message', 'Post updated successfully!');
    }


    // delete it from ui and not database
    public function destroy(Request $request, Post $post)
    {
        // Make sure logged in user is owner
        // dd($post);
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // updating table rather than destroy data
        $formFields['status'] = 0;
        $post->update($formFields);

        // $listing->delete();
        return back()->with('message', 'Post deleted successfully!');
    }

    // get all post to manage them
    public function manage(Request $request)
    {
        // dd(auth()->id());
        $posts =    DB::table('posts')

            ->latest()
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            // ->rightJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as author_name', 'categories.name as category', 'users.email')
            ->where('posts.user_id', auth()->id())
            ->where('posts.status', 1)
            // ->paginate(6);
            ->get();
        // dd($posts);
        // dd(auth()->id());
        return view('posts.manage', ['posts' => $posts, 'page' => 'Manage Posts']);
        // return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}
