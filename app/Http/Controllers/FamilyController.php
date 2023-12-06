<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\FamilyChild;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUniqueIds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Sodium\increment;

class FamilyController extends Controller
{
    public function familyStore(Request $request)
    {
        $uniqueId = random_int(0, PHP_INT_MAX);
        $family = new Family();
        $family->id = $uniqueId;
        $family->user_id = Auth::user()->id;
        $family->first_name = $request->first_name;
        $family->last_name = $request->last_name;
        $family->relationship_id = $request->relationship_id;
        $family->date_of_birth = $request->date_of_birth;
        $family->type = $request->type == 'on' ? 'alive' : 'deceased';
        if ($request->type == 'on') {
            $family->email = $request->email;
            $family->country = $request->country;
        } else {
            $family->map_address = $request->map_address;
            $family->desc = $request->desc;
        }

        $res = $family->save();
        if ($res) {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make('iub12345678');
            $user->save();
        }
        return back();
    }

    /**
     * @throws \Exception
     */
    public function familyChildStore(Request $request)
    {
        $uniqueId = random_int(0, PHP_INT_MAX);
        $family = new FamilyChild();
        $family->id = $uniqueId;
        $family->user_id = Auth::user()->id;
        $family->parent_id = $request->parent_id;
        $family->first_name = $request->first_name;
        $family->last_name = $request->last_name;
        $family->relationship_id = $request->relationship_id;
        $family->date_of_birth = $request->date_of_birth;
        $family->type = $request->type == 'on' ? 'alive' : 'deceased';
        if ($request->type == 'on') {
            $family->email = $request->email;
            $family->country = $request->country;
        } else {
            $family->map_address = $request->map_address;
            $family->desc = $request->desc;
        }

        $res = $family->save();

        if ($res) {

            // Now that you have saved the FamilyChild record, you can retrieve its ID.
            $childId = $family->id;

            // Update the child_id column with the saved ID.
            $family->child_id = $childId;
            $family->save();

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make('iub12345678');
            $user->save();
        }
        return back();
    }
}
