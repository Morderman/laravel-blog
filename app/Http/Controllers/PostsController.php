<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(): View
    {
        return view('posts/create');
    }

    /**
     * @param PostStorePostRequest $request
     * @return RedirectResponse
     */
    public function store(PostStorePostRequest $request): RedirectResponse
    {
//        \App\Post::create($data);
        $imagePath = $request->image->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $request->caption,
            'image'   => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);

//        auth()->user()->posts()->create($data);
//        dd(request()->all());
    }

    /**
     * @param \App\Post $postId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(\App\Post $postId): View
    {
        return view('posts.show', compact('postId'));
    }
}
