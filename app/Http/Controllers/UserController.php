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
            'first_name'     => 'nullable|string|max:25',
            'last_name'      => 'nullable|string|max:25',
            'email'          => 'required|email|max:30|unique:users,email',
            'password'       => 'required|string|min:6',
            'phone'          => 'nullable|string|max:15',
            'status'         => ['nullable', Rule::in(['active', 'inactive'])],
            'profile_photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        User::create([
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
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:25',
            'last_name'  => 'nullable|string|max:25',
            'phone'      => 'nullable|string|max:15',
            'status'     => ['nullable', Rule::in(['active', 'inactive'])],
            'email'      => ['required', 'email', 'max:30', Rule::unique('users')->ignore($user->id)],
            'password'   => 'nullable|string|min:6',
        ]);

        // Update user fields
        $user->first_name = $validatedData['first_name'] ?? $user->first_name;
        $user->last_name  = $validatedData['last_name'] ?? $user->last_name;
        $user->phone      = $validatedData['phone'] ?? $user->phone;
        $user->status     = $validatedData['status'] ?? $user->status;
        $user->email      = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
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
