<?php
namespace App\Http\Controllers;

use App\Models\UserRelationship;
use Illuminate\Http\Request;

class UserRelationshipController extends Controller
{
    public function store(Request $request)
    {
        $relationship = new UserRelationship;
        $relationship->user_id = $request->user_id;
        $relationship->relative_id = $request->relative_id;
        $relationship->relationship_id = $request->relationship_id;
        $relationship->save();

        // Add logic to update the closure table here

        return redirect()->back();
    }

    public function destroy($id)
    {
        $relationship = UserRelationship::find($id);
        $relationship->delete();

        // Add logic to update the closure table here

        return redirect()->back();
    }
}
