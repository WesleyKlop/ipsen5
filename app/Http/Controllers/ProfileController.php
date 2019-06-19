<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Profile;
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
        unset($profile['profile_picture']);

        // Handle Uploaded file. Saved as /profile/$userId.$extension
        $imageFile = $request->file('profile_picture');

        if ($imageFile) {
            $extension = $imageFile->guessExtension() ?? '.jpg';
            $imageFileName = $candidate->user_id . '.' . ($extension);
            $result = $imageFile->storeAs('public/profiles', $imageFileName);

            $profile['image_extension'] = $extension;
        }

        // Update User profile
        $candidate->profile->update($profile);

        $response = ['candidate' => $candidate];
        if ($imageFile) {
            $response['fileResult'] = $result;
        }

        return $response;
    }

    public function createNewProfile(string $userId, string $email)
    {
        return Profile::create([
            'user_id' => $userId,
            'first_name' => '',
            'last_name' => '',
            'function' => '',
            'party' => '',
            'bio' => '',
            'image_extension' => '',
            'email'=> $email,
        ]);
    }
}
