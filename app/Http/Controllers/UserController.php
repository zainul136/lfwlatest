<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show($id)


    {
        $user = User::find($id);
        $relatives = $user->relatives;

        //return view('user.show', compact('user', 'relatives'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $user = User::query()->where('id', $user->id)->first();
        $profile = UserInformation::query()->where('user_id', $user->id)->first();
        $dateOfBirth = $profile->date_of_birth ??'';
        $age = Carbon::parse($dateOfBirth)->age;

        return view('home', [
            'user' => $user,
            'profile' => $profile,
            'age' => $age
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user_information = UserInformation::query()->where('user_id', $user->id)->first();

        $request->validate([
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country_selector_code' => 'required',
            'address' => 'required|string|max:255',
        ]);

        // Fields that should remain disabled are not included in the fillable array.
        $user_information->fillable([
            'date_of_birth', 'gender', 'phone_number', 'city', 'country', 'address',
        ]);

        $age = Carbon::parse($user_information->date_of_birth)->age ?? '';

        $user_information->fill([
            'date_of_birth' => $request->input('date_of_birth'),
            'phone_number' => $request->input('phone'),
            'city' => $request->input('city'),
            'country' => $request->input('country_selector_code'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = public_path('user_media/' . $user->id . '/profile_picture/');

            if ($user_information->profile_picture) {
                $previousPicturePath = $directory . $user_information->profile_picture;
                if (File::exists($previousPicturePath)) {
                    File::delete($previousPicturePath);
                }
            }
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $file->move($directory, $fileName);
            $user_information->profile_picture = $fileName;
        }

        $user_information->save();

        // Redirect to the profile edit page with a success message
        return redirect()->route('home')->with('status', 'Profile updated successfully.')->with([
            'user' => $user,
            'user_information' => $user_information,
            'age' => $age
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {


        $user = Auth::user();
        $user_information = UserInformation::query()->where('user_id', $user->id)->first();

        $request->validate([
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country_selector_code' => 'required',
            'address' => 'required|string|max:255',
        ]);

        $age = Carbon::parse($user_information->date_of_birth)->age ?? '';

        $user_information->fill([
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'city' => $request->input('city'),
            'country' => $request->input('country_selector_code'),
            'address' => $request->input('address'),
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = public_path('user_media/' . $user->id . '/profile_picture/');

            if ($user_information->profile_picture) {
                $previousPicturePath = $directory . $user_information->profile_picture;
                if (File::exists($previousPicturePath)) {
                    File::delete($previousPicturePath);
                }
            }

            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $file->move($directory, $fileName);
            $user_information->profile_picture = $fileName;
        }

        $user_information->save();

        // Redirect to the profile edit page with a success message
        return redirect()->route('home')->with('status', 'Profile updated successfully.')->with([
            'user' => $user,
            'user_information' => $user_information,
            'age' => $age
        ]);
    }

    public function getUserInfo(Request $request, $userId): JsonResponse
    {
        // Retrieve user information based on the $userId parameter
        $userInformation = UserInformation::query()->where('user_id', $userId)->first();
        $user = User::query()->where('id', $userId)->first();
        if ($userInformation) {
            // Prepare the data you want to send back as JSON
            $userData = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'profile_picture' => $userInformation->profile_picture,
            ];

            return response()->json($userData);
        } else {
            // Handle the case where the user information is not found
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
