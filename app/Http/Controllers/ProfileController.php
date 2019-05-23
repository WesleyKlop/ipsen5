<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function submit(Request $request)
    {
        /** @var Candidate $candidate */
        $candidate = $request->user();
        $profile = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'bio' => 'max:255',
            'party' => 'required|max:255',
            'function' => 'max:255',
            'profile_picture' => 'image',
        ]);

        // Handle Uploaded file. Saved as /profile/$userId.$extension
        $imageFile = $request->file('profile_picture');
        $imageFileName = $candidate->user_id . '.' . ($imageFile->guessExtension() ?? '.jpg');
        $result = $imageFile->storeAs('public/profiles', $imageFileName);

        // Update User profile
        $candidate->profile->update($profile);
        return ['candidate' => $candidate, 'fileResult' => $result];
    }
}
