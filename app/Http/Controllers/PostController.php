<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $values = $request->except('_token');
        $values['user_id'] = auth()->id();
        
        $post = Post::create($values);
        
        return redirect()->route('post.edit', $post->id)->with('success', '登録に成功しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        abort_if(auth()->id() !== $post->user_id, 403);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_if(auth()->id() !== $post->user_id, 403);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        abort_if(auth()->id() !== $post->user_id, 403);

        $values = $request->except('_token');
        $post->update($values);
     
        return redirect()->route('post.edit', $post->id)->with('success', '編集に成功しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_if(auth()->id() !== $post->user_id, 403);

        $post->delete();
     
        return redirect('post')->with('success', '削除に成功しました。');
    }
}
