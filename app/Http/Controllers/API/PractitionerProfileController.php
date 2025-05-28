<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PractitionerProfileController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'slug' => 'required|string|max:255|unique:practitioners,slug,' . ($user->practitioner->id ?? 'NULL'),
            'clinic_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $data['name'] = $user->name; // fixed from user

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $path = $file->store('profile_photos', 'public');
            $data['profile_photo'] = $path;
        }

        // Check if practitioner exists for this user
        $practitioner = $user->practitioner;

        if ($practitioner) {
            // Update existing
            $practitioner->update($data);
            return response()->json(['message' => 'Practitioner profile updated', 'profile' => $practitioner]);
        } else {
            // Create new
            $practitioner = $user->practitioner()->create($data);
            return response()->json(['message' => 'Practitioner profile created', 'profile' => $practitioner]);
        }
    }

    public function show(Request $request)
    {
        $practitioner = $request->user()->practitioner;

        if (!$practitioner) {
            return response()->json(['message' => 'Practitioner profile not found'], 404);
        }

        return response()->json($practitioner);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $practitioner = $user->practitioner;

        if (!$practitioner) {
            return response()->json(['message' => 'Practitioner profile not found'], 404);
        }

        $data = $request->validate([
            'slug' => 'sometimes|required|string|max:255|unique:practitioners,slug,' . $practitioner->id,
            'clinic_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $path = $file->store('profile_photos', 'public');
            $data['profile_photo'] = $path;
        }

        $practitioner->update($data);

        return response()->json(['message' => 'Profile updated', 'profile' => $practitioner]);
    }
}
