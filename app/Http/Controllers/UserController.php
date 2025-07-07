<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller

{
    public function index()
    {
        $users = User::with(['students', 'teachers', 'vouchers', 'payments'])->get();
        return view('pages.admin.users', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|string|min:6',
            'phone'          => 'required|string|max:15',
            'status'         => 'required|in:active,inactive',
            'profile_photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user = User::create([
            'first_name'         => $request->first_name,
            'last_name'          => $request->last_name,
            'email'              => $request->email,
            'password'           => Hash::make($request->password),
            'phone'              => $request->phone,
            'status'             => $request->status,
            'profile_photo_path' => $profilePhotoPath,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }


    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'required|string|max:15',
            'status'     => ['required', Rule::in(['active', 'inactive'])],
            'email'      => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password'   => 'nullable|string|min:8|confirmed',
        ]);

        $user->first_name = $data['first_name'];
        $user->last_name  = $data['last_name'];
        $user->phone      = $data['phone'];
        $user->status     = $data['status'];
        $user->email      = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return back()->with('success', 'User updated successfully!');
    }


    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            abort(403, 'You are not allowed to delete an admin.');
        }

        Log::info("Trying to delete user: " . $user->id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
