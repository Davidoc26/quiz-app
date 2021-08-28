<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRolesRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::with('roles')->get(),
        ]);
    }

    /**
     * @param User $user
     * @return Response
     */
    public function edit(User $user): Response
    {
        $user->load('roles');
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * @param UpdateUserRequest $updateUserRequest
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $updateUserRequest, User $user): RedirectResponse
    {
        $user->update([
            'name' => $updateUserRequest->get('name'),
            'email' => $updateUserRequest->get('email'),
        ]);

        return redirect()->back();
    }

    /**
     * @param UpdateRolesRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateRoles(UpdateRolesRequest $request, User $user): RedirectResponse
    {
        $user->roles()->syncWithoutDetaching(Role::find($request->get('id')));

        return redirect()->back();
    }
}
