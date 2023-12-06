<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeathConfirmation;
use App\Models\DeathConfirmationNotification;
use App\Models\Notification;
use App\Models\Post;
use App\Models\profileRecovery;
use App\Models\User;
use App\Models\UserRelationship;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DeceasedController extends Controller
{
    public function deceasedRequest(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $deceaseUsers = DeathConfirmation::query()->where('is_alive','=',0)->where('confirmation_status','=',1)->with('user')->get();

        return view('admin.zenix.dashboard.deceasedRequest',compact('deceaseUsers'));

    }

    public function downloadDeathCertificate($filename): \Illuminate\Http\Response
    {
        $filePath = public_path('death_certificate/' . $filename);
        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $mimeType = mime_content_type($filePath);
            $originalName = pathinfo($filePath, PATHINFO_FILENAME);

            return response()->make($fileContent, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => "attachment; filename={$originalName}.{$filename}"
            ]);
        }

        return response('File not found', 404);
    }

    public function sendNotification($id)
    {
        $deathPerson = DeathConfirmation::with(['user.userInformation', 'user.userRelationships.relationship'])
            ->findOrFail($id);

        if ($deathPerson) {
            $deathPersonRequested = json_decode($deathPerson->confirmations_from);

            $userRelationships = $deathPerson->user->userRelationships;

    }

        return view('admin.zenix.dashboard.sendNotification',compact('deathPersonRequested','deathPerson','userRelationships'));
    }


    public function deceasedPostDetails($id)
    {
        $post = Post::query()->where('id','=',$id)
            ->with(['user.userInformation','PostText','postImage','postVideo','postDocument','tags','postAudio'])
            ->first();
        return view('admin.zenix.dashboard.editPrivatePost',compact('post'));
    }
    public function UnlockProfileDeceasedPerson()
    {
        $deceaseConfirmationChecks = DeathConfirmation::query()->where('confirmation_status','=',1)->whereNotNull('recovery_confirmation')->where('is_alive','=',0)->with('user')->get();
        $deceasePersons = profileRecovery::with('deathConfirmation')->get();
        return view('admin.zenix.dashboard.deceasedApproveRequest',compact('deceasePersons','deceaseConfirmationChecks'));
    }
    public function deceasedPersonNotificationDetails($id)
    {
        $deceasePerson = DeathConfirmation::query()->where('id','=',$id)->whereNotNull('recovery_confirmation')->first();

        return view('admin.zenix.dashboard.deceasedApproveRequest',compact('deceasePerson'));
    }

    public function approveRequestNotification($id){
        try {
            $confirmation = DeathConfirmation::query()->where('id','=', $id)->first();
           if ($confirmation){
               $recoveryProfile = new profileRecovery();
               $recoveryProfile->death_confirmations = $confirmation->id;
               $recoveryProfile->death_certificate = $confirmation->death_certificate ?? null;
               $recoveryProfile->date_of_death = $confirmation->date_of_death ??null;
               $recoveryProfile->place_of_death = $confirmation->place_of_death ??null;
               $recoveryProfile->confirmations_from = $confirmation->confirmations_from ??null;
               $recoveryProfile->recovery_confirmation = $confirmation->recovery_confirmation ??null;
               $recoveryProfile->save();
           }
            if ($confirmation) {
                $confirmation->is_alive = 1;
                $confirmation->confirmation_status = 0;
                $confirmation->confirmations_from = null;
                $confirmation->date_of_death = null;
                $confirmation->death_certificate = null;
                $confirmation->place_of_death = null;
                $confirmation->recovery_confirmation = null;
                $confirmation->save();

                $deleteDeathConfirmations = DeathConfirmationNotification::query()->where('deceased_id','=', $confirmation->user_id)->get();
                foreach($deleteDeathConfirmations as $deleteDeathConfirmation)
                    $deleteDeathConfirmation->delete();
                return redirect('admins/details-notification-decease-person')->with('success', 'Your profile is now marked as alive.');
            }

        } catch (\Exception $e) {

            $errorMessage = 'An error occurred while processing your request: ' . $e->getMessage();

            // Redirect back with the error message
            return redirect()->back()->with('error', $errorMessage);
        }

        // If the user or confirmation doesn't exist, or if an exception occurs, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid request or record not found.');

    }

}
