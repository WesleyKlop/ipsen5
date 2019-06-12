<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Proposition;
use Illuminate\Http\Request;
use Storage;

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
        // Check if a new file has been giver or use the old extension.
        if ($imageFile) {
            $extension = $imageFile->guessExtension() ?? '.jpg';
            $imageFileName = $candidate->user_id . '.' . ($extension);
            $result = $imageFile->storeAs('public/profiles', $imageFileName);
        } else {
            $extension = $candidate->profile->image_extension;
        }

        // Update User profile
        $candidate->profile->update([
            'first_name' => $profile['first_name'],
            'last_name' => $profile['last_name'],
            'bio' => $profile['bio'],
            'party' => $profile['party'],
            'function' => $profile['function'],
            'image_extension' => $extension,
        ]);
        return $imageFile ? ['candidate' => $candidate, 'fileResult' => $result] : ['candidate' => $candidate];
    }
}
