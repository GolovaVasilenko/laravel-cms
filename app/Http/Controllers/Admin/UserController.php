<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\MediaUploadService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', ['users' => User::query()->orderByDesc('created_at')->get()]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $user)
    {
        return view('admin.user.add', ['roles' => Role::all(), 'info' => $user->infoLabels]);
    }

    /**
     * @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request, MediaUploadService $media, UserService $service)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        if(!$user) {
            return back()->with('error', 'Error creation user!');
        }

        $user->assignRole($validated['roles']);

        if($request->hasFile('avatar')) {
            $user->avatar = $media->uploadImage($request->file('avatar'), 'avatars');
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'user created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user, UserService $service)
    {
        return view('admin.user.edit', ['roles' => Role::all(), 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param MediaUploadService $media
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user, MediaUploadService $media)
    {
        $data = $request->except(['_token', '_method', 'avatar', 'roles']);
        $user->update($data);

        $user->syncRoles($request->get('roles'));

        if($request->hasFile('avatar')) {
            $user->avatar = $media->uploadImage($request->file('avatar'), 'avatars');
            $user->save();
        }
        return redirect()->route('users.edit', ['user' => $user])->with('success', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
