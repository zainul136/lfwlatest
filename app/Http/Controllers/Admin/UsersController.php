<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Country;
use App\Models\Post;
use App\Models\StaffMember;
use App\Models\User;
use App\Models\UserInformation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\NoReturn;
use function Sodium\add;

class UsersController extends Controller
{

    public  function userInformation(){
        $users = User::query()->with('userInformation')->get();

        return view('admin.zenix.dashboard.userInformation',compact('users'));
    }
    public function appProfile()
    {
        $user  = Auth::user();
        $userInformation = $user->userInformation;
        $age = optional($userInformation)->date_of_birth
            ? Carbon::parse($userInformation->date_of_birth)->age
            : "";

        return view('admin.zenix.app.profile',compact('user','age'));

    }

    public  function addNewUser(){
        $countries =  Country::all();
        return view('admin.zenix.dashboard.editUser',compact('countries'));
    }
    public  function addStaffUser(){
        $countries =  Country::all();
        return view('admin.zenix.dashboard.AddStaffUser',compact('countries'));
    }
    public  function staffInformation(){
        $staffs = StaffMember::query()->with('user.userInformation')->get();
        return view('admin.zenix.dashboard.staffInformation',compact('staffs'));
    }
    public function storeNewStaff(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'phone' => 'nullable|string',
                'date_of_birth' => 'required|date',
                'country' => 'required|string',
                'city' => 'required|string',
                'gender' => 'required|in:Male,Female',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            UserInformation::create([
                'user_id' => $user->id,
                'date_of_birth' => $validatedData['date_of_birth'],
                'country' => $validatedData['country'],
                'phone_number' => $validatedData['phone'],
                'city' => $validatedData['city'],
                'gender' => $validatedData['gender'],
            ]);

           $addNewStaff = new  StaffMember();
            $addNewStaff->user_id = $user->id;
            $addNewStaff->save();

            return redirect()->back()->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user.');
        }
    }

    public function storeNewUser(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'phone' => 'nullable|string',
                'date_of_birth' => 'required|date',
                'country' => 'required|string',
                'city' => 'required|string',
                'gender' => 'required|in:Male,Female',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            UserInformation::create([
                'user_id' => $user->id,
                'date_of_birth' => $validatedData['date_of_birth'],
                'country' => $validatedData['country'],
                'phone_number' => $validatedData['phone'],
                'city' => $validatedData['city'],
                'gender' => $validatedData['gender'],
            ]);

            return redirect()->back()->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user.');
        }
    }

    public function updateStaffRecord(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'date_of_birth' => 'required|date',
            'country' => 'required|string',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);

        $userInformation = UserInformation::where('user_id', $request->user_id)->first();
        $userInformation->update([
            'date_of_birth' => $validatedData['date_of_birth'],
            'country' => $validatedData['country'],
        ]);

        return redirect('admins/staff-information')->with('success', 'User updated successfully');
    }

    public function updateStaffProfileRecord(Request $request)
    {


        $userid  =  Auth::id();
        $user = User::query()->find($userid);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        $userInformation = UserInformation::where('user_id', $userid)->first();
        $userInformation->address = $request->address;
        $userInformation->city = $request->city;
        if($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = public_path('user_media/' . $userid . '/profile_picture/');

            if ($userInformation->profile_picture) {
                $previousPicturePath = $directory . $userInformation->profile_picture;
                if (File::exists($previousPicturePath)) {
                    File::delete($previousPicturePath);
                }
            }
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $file->move($directory, $fileName);
            $userInformation->profile_picture = $fileName;
        }
        $userInformation->save();

        return redirect()->back()->with('success', 'User updated successfully');
    }
 public function updateUserRecord(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'date_of_birth' => 'required|date',
            'country' => 'required|string',
        ]);
        $user = User::findOrFail($request->user_id);
        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);

        $userInformation = UserInformation::where('user_id', $request->user_id)->first();
        $userInformation->update([
            'date_of_birth' => $validatedData['date_of_birth'],
            'country' => $validatedData['country'],
        ]);

        return redirect('admins/userInformation')->with('success', 'User updated successfully');
    }


    public function softDelete(User $user)
    {
        $staff =  StaffMember::query()->where('user_id','=',$user->id)->first();
        if($staff){
            $staff->delete();
        }

        $user->delete();
        return redirect()->route('user-information')->with('message', 'User has been soft-deleted.');
    }

    public function softStaffDelete(User $user)
    {

        $staff = StaffMember::query()->where('user_id','=',$user->id)->first();

        if ($staff){
            $staff->delete();
        }
        $user->delete();
        return redirect()->route('staff-information')->with('message', 'User has been soft-deleted.');
    }

    public function getDeletedUser(){
        $users = User::onlyTrashed()->get();

        return view('admin.zenix.dashboard.deletedUser',compact('users'));
    }

    public function restoreUser($userId)
    {
        $user = User::withTrashed()->find($userId);

        if ($user) {
            $user->restore();
            return redirect()->route('user-information')->with('success', 'User restored successfully');
        } else {
            return redirect()->route('user-information')->with('error', 'User not found');
        }
    }

    public function permanentDeletedUser($id)
    {
        $user = User::query()->findOrFail($id);
        if ($user){

            $user->delete();


        }
        return redirect()->route('user-information')->with('message', 'User has been permanently deleted.');
    }


}
