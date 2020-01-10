<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdatePatchRequest;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * One method of indexing
     * @param int $userId
     * @return View
     */
    public function index(int $userId): View
    {
        $user = User::findOrFail($userId);

        return view('profiles/index', [
            'user' => $user,
        ]);
    }

    /**
     * Another method of indexing
     * @param User $userId
     * @return View
     */
    public function edit(int $userId): View
    {
        $user = User::findOrFail($userId);
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    /**
     * @param ProfileUpdatePatchRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdatePatchRequest $request): RedirectResponse
    {
//        $data = request()->validate([
//            'title' => 'required',
//            'description' => 'required',
//            'url' => 'url',
//            'image' => '',
//        ]);

        $data = $request->validated();

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/" . auth()->user()->id);
    }
}
