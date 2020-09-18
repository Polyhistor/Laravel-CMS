<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = auth()->user()->posts;
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {

        $this->authorize('store', Post::class);

        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'post was created');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        // $this->authorize('view', $post);
        if (auth()->user()->can('view', $post)) {
            return view('admin.posts.edit', ['post' => $post]);
        };
    }

    public function destroy(Post $post, Request $request)
    {

        $this->authorize('delete', $post);
        $post->delete();
        $request->session()->flash('message', 'Post was deleted');

        return back();
    }

    public function update(Post $post, Request $request)
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);

        $post->save();

        $request->session()->flash('post-update-message', 'Post was updated');

        return redirect()->route('post.index');
    }
}
