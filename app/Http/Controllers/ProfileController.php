<?php

namespace App\Http\Controllers;

// use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function user(): View
    {
        return view('pages.admin.user', [
            'user' => Auth::user(),
        ]);
    }

    public function profile(): View
    {
        return view('pages.admin.users', [
            'user' => Auth::user(),
        ]);
    }

    

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();
    
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'email'      => 'required|email|max:255|unique:users,email,' . $user->id,
            'address'    => 'nullable|string|max:500',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Handle image upload if a file is uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if it exists
            if ($user->profile_photo_path) {
                Storage::delete('public/' . $user->profile_photo_path);
            }
    
            // Store new photo
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }
    
        // Update user details
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->phone      = $request->phone;
        $user->email      = $request->email;
        $user->address    = $request->address;
        $user->save();
    
        return redirect()->route('admin.user')->with('success', 'Profile updated successfully!');

    }
    
    public function updatePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $user = Auth::user();  // Get the logged-in user
    
        // Check if the current password matches the stored password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Redirect with success message
        return redirect()->route('admin.user')->with('success', 'Password updated successfully!');
    }
    
    
}
