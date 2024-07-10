<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'about' => 'nullable|string',
            'city' => 'nullable|string',
            'Region' => 'nullable|string',
            'country' => 'nullable|string',
            'ip' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the authenticated user
        $user = Auth::user();

        // Return a 404 response if the user is not found
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->about = $request->input('about');
        $user->city = $request->input('city');
        $user->Region = $request->input('Region');
        $user->country = $request->input('country');
        $user->ip = $request->input('ip');

        $user->save();

        // Handle image upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $userImage = uniqid() . '.' . $image->extension();

            // Delete the existing image file, if any
            if (File::exists(public_path('assets/images/user/' . $user->image))) {
                File::delete(public_path('assets/images/user/' . $user->image));
            }

            // Move the new image file
            $image->move(public_path('assets/images/user'), $userImage);

            // Update the user's image attribute
            $user->update(['image' => 'assets/images/user/' . $userImage]);
        }

        return response()->json(['message' => 'User profile updated successfully']);
    }
}
