<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class EditProfileController extends Controller
{
    public function index($id)
{
    $profile = Profile::where('user_id', $id)->first();

    if (!$profile) {
        return view('profile', [
            'userId' => $id,
            'email' => '',
            'username' => '',
            'nama' => '',
            'no_hp' => '',
            'profile_picture' => asset('assets/default-avatar.png'),
        ]);
    }

    return view('profile', [
        'userId' => $id,
        'email' => $profile->email ?? '',
        'username' => $profile->username ?? '',
        'nama' => $profile->nama ?? '',
        'no_hp' => $profile->phone_number ?? '',
        'profile_picture' => $profile->profile_picture
            ? asset('uploads/profiles/' . $profile->profile_picture)
            : asset('assets/default-avatar.png'),
    ]);
}

    public function getProfile($id)
    {
        $profile = Profile::where('user_id', $id)->first();

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Profile retrieved successfully',
            'data' => $profile
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $profile = Profile::where('user_id', $id)->first();

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found'
            ], 404);
        }

        $profile->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }

    public function updateProfilePicture(Request $request, $id)
    {
        if (!$request->hasFile('profile_picture')) {
            return response()->json([
                'success' => false,
                'message' => 'No file uploaded'
            ], 400);
        }

        $file = $request->file('profile_picture');
        $fileName = 'profile-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/profiles'), $fileName);

        $profile = Profile::where('user_id', $id)->first();
        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found'
            ], 404);
        }

        $profile->update(['profile_picture' => $fileName]);

        return response()->json([
            'success' => true,
            'message' => 'Profile picture updated successfully',
            'data' => [
                'profile_picture' => $fileName
            ]
        ]);
    }
}