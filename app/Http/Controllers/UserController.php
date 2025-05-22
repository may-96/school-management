<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'role'       => 'required|in:admin,member',
            'status'     => 'required|in:active,inactive',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'status'     => $request->status,
            'profile_photo_path' => $profilePhotoPath,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    // public function update(Request $request, User $user)
    // {
    //     $data = $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name'  => 'required|string|max:255',
    //         'role'       => ['required', Rule::in(['admin', 'member'])],
    //         'status'     => ['required', Rule::in(['active', 'inactive'])],
    //         'email'      => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
    //         'password'   => 'nullable|string|min:8|confirmed',
    //     ]);

    //     $user->name   = $data['first_name'] . ' ' . $data['last_name'];
    //     $user->role   = $data['role'];
    //     $user->status = $data['status'];
    //     $user->email  = $data['email'];
    //     if ($data['password'] ?? false) {
    //         $user->password = Hash::make($data['password']);
    //     }
    //     $user->save();

    //     return back()->with('success', 'User updated successfully!');
    // }

    public function destroy(User $user)
    {
        Log::info("Trying to delete user: " . $user->id);
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
