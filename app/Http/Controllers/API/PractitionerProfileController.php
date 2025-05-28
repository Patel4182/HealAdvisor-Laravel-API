<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PractitionerProfileController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clinic_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $practitioner = $request->user();

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $path = $file->store('profile_photos', 'public');
            $data['profile_photo'] = $path;
        }

        $practitioner->update($data);

        return response()->json(['message' => 'Profile updated', 'profile' => $practitioner]);
    }

    public function update(Request $request)
    {
        return $this->store($request);
    }
}
