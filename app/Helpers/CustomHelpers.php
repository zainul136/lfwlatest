<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomHelpers{
    static function getUserInformation($user_id) {
        return UserInformation::where('user_id', $user_id)->first();
    }

    static function getUser($user_id){
        return User::where('id', $user_id)->first();
    }

  static  function deathNotification()
    {
        $deathNotifications = \App\Models\DeathConfirmationNotification::query()->where('notification_status','=','pending')->with('users')->get();
        return $deathNotifications;

    }


}
