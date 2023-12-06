<?php

namespace App\Http\Controllers;

use App\Jobs\CheckDeathConfirmations;
use App\Models\DeathConfirmation;
use App\Models\DeathConfirmationNotification;
use App\Models\TrustedContact;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\alert;

class DeathConfirmationController extends Controller
{
    public function getAliveStatus($id){
        $isAlive = DeathConfirmation::query()->where('user_id', $id)->value('is_alive');
        return $isAlive;
    }
    public function deathConfirmationShow($id){
        $confirmation = DeathConfirmation::query()->where('id', '=', $id)->first();
        $confirmations_from = json_decode($confirmation->confirmations_from);
        $confirmUser = User::query()->whereIn('id',$confirmations_from)->first();

        return view('deathPersonDetails',compact('confirmation','confirmUser'));
    }

    public function recoveryDeathConfirmation(Request $request, $id)
    {
        try {
            $confirmation = DeathConfirmation::query()->where('id', $id)->first();
            if ($confirmation) {

                $confirmation->recovery_confirmation = $request->recovery_confirmation;
                $confirmation->save();
             return redirect()->back()->with('success', 'Your Request has been submit for admin.');

//                $confirmation->is_alive = 1;
//                $confirmation->confirmation_status = 0;
//                $confirmation->confirmations_from = null;
//                $confirmation->date_of_death = null;
//                $confirmation->death_certificate = null;
//                $confirmation->place_of_death = null;
//                $confirmation->recovery_confirmation = $request->recovery_confirmation;
//                $confirmation->save();
//
//                $deleteDeathConfirmations = DeathConfirmationNotification::query()->where('deceased_id','=', $confirmation->user_id)->get();
//                foreach($deleteDeathConfirmations as $deleteDeathConfirmation)
//                    $deleteDeathConfirmation->delete();
//                // Redirect back with a success message
//                return redirect('home')->with('success', 'Your profile is now marked as alive.');
//
            }

        } catch (\Exception $e) {

            $errorMessage = 'An error occurred while processing your request: ' . $e->getMessage();

            // Redirect back with the error message
            return redirect()->back()->with('error', $errorMessage);
        }

        // If the user or confirmation doesn't exist, or if an exception occurs, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid request or record not found.');
    }


    public function getDeathCertificate($id){
        $deathCertificate = DeathConfirmation::query()->where('user_id', $id)->value('death_certificate');
        return $deathCertificate;
    }

    public function getDateOfDeath($id){
        $dateOfDeath = DeathConfirmation::query()->where('user_id', $id)->value('date_of_death');
        return $dateOfDeath;
    }

    public function getPlaceOfDeath($id){
        $placeOfDeath = DeathConfirmation::query()->where('user_id', $id)->value('place_of_death');
        return $placeOfDeath;
    }

    public function getConfirmationsFrom($id){
        $confirmationsFrom = DeathConfirmation::query()->where('user_id', $id)->value('confirmations_from');
        return $confirmationsFrom;
    }

    public function getConfirmationStatus($id){
        $confirmationStatus = DeathConfirmation::query()->where('user_id', $id)->value('confirmation_status');
        return $confirmationStatus;
    }

    public function updateAliveStatus(Request $request){
        $loggedInUser = Auth::user();

        $isAlive = $request->isAlive;
        $deathCertificate = $request->deathCertificate;
        $dateOfDeath = $request->dateOfDeath;
        $placeOfDeath = $request->placeOfDeath;
        $confirmationsFrom = $request->confirmationsFrom;

        $deathConfirmation = DeathConfirmation::query()->where('user_id', $loggedInUser->id)->first();
        $deathConfirmation->is_alive = $isAlive;
        $deathConfirmation->death_certificate = $deathCertificate;
        $deathConfirmation->date_of_death = $dateOfDeath;
        $deathConfirmation->place_of_death = $placeOfDeath;
        $deathConfirmation->confirmations_from = $confirmationsFrom;
        $deathConfirmation->confirmation_status = false;
        $deathConfirmation->save();

        return response()->json([
            'message' => 'Death confirmation updated successfully',
            'data' => $deathConfirmation
        ], 200);
    }

    public function setConfirmationStatus($userId){
        $deathConfirmation = DeathConfirmation::where('user_id', $userId)->first();
        if($deathConfirmation->isAlive){
            return;
        }else{
            $trustedContacts = TrustedContact::query()->where('user_id', $userId)->count();

            if(isset($deathConfirmation->confirmations_from)){
                $numberOfConfirmations = count(json_decode($deathConfirmation->confirmations_from));
            }else{
                return ;
            }

            if($trustedContacts == 1){
                $deathConfirmation->confirmation_status = true;
                $deathConfirmation->is_alive = false;
            }

            if((($numberOfConfirmations/$trustedContacts)*100)>50){
                $deathConfirmation->confirmation_status = true;
                $deathConfirmation->is_alive = false;
                $this->notifyTrustedContacts($deathConfirmation->user_id);
            }
            else{
                $deathConfirmation->confirmation_status = false;
                $deathConfirmation->is_alive = true;
            }
            $deathConfirmation->save();

            return response()->json([
                'message' => 'Death confirmation status updated successfully',
                'data' => $deathConfirmation
            ], 200);
        }
    }

    public function notifyTrustedContacts($deceasedId){

        $existingNotifications = DeathConfirmationNotification::query()->where('deceased_id', $deceasedId)->get();

        if ($existingNotifications->isEmpty()) {
            $deathConfirmation = DeathConfirmation::query()->where('user_id', $deceasedId)->first();
            $trustedContacts = TrustedContact::query()->where('user_id', $deceasedId)->get();

            foreach ($trustedContacts as $trustedContact) {
                $confirmationsFrom = json_decode($deathConfirmation->confirmations_from);

                if (!in_array($trustedContact->trusted_contact_id, $confirmationsFrom)) {
                    $notification = new DeathConfirmationNotification();

                    $notification->user_id = $trustedContact->trusted_contact_id;
                    $notification->deceased_id = $deceasedId;
                    $notification->notification_status = 'pending';
                    $notification->save();
                    Log::info("Notifying trusted contacts of death - $trustedContact->trusted_contact_id");
                }
            }

            return response()->json([
                'message' => 'Death notification is sent to the Trusted Contacts for confirmation!',
                'data' => count($trustedContacts)
            ], 200);
        } else {
            return response()->json([
                'message' => 'Death notification already sent to Trusted Contacts!',
                'data' => count($existingNotifications)
            ], 200);
        }
    }

    public function checkDeathConfirmation(Request $request): JsonResponse
    {
        $loggedInUserId = auth()->user()->id; // Assuming you are using authentication
        $pendingNotification = DeathConfirmationNotification::query()->where('user_id', $loggedInUserId)
            ->where('notification_status', 'pending')
            ->first();

        if ($pendingNotification) {
            return response()->json([
                'message' => 'A death confirmation has been submitted, please confirm',
                'notification_id' => $loggedInUserId,
            ]);
        } else {
            return response()->json([
                'message' => 'No pending death confirmation found',
            ]);
        }
    }

    public function approveDeathConfirmation($id): JsonResponse
    {
        $notification = DeathConfirmationNotification::query()->where('user_id',$id)->first();
        $notification->notification_status = 'confirmed';
        $notification->save();
        $deathConfirmation = DeathConfirmation::query()->where('user_id', $notification->deceased_id)->first();
        if($deathConfirmation) {
            $confirmationsFrom = json_decode($deathConfirmation->confirmations_from, true);
            $loggedInUserId = auth()->user()->id;
            if (!in_array($loggedInUserId, $confirmationsFrom)) {
                $confirmationsFrom[] = $loggedInUserId;
                $deathConfirmation->confirmations_from = json_encode($confirmationsFrom);
                $deathConfirmation->save();
            }
        }

        $this->setConfirmationStatus($notification->deceased_id);
        return response()->json(['success' => true]);
    }

    public function setConfirmationStatusDecline($userId) {
        $deathConfirmation = DeathConfirmation::where('user_id', $userId)->first();

        if ($deathConfirmation->isAlive) {
            return;
        }

        $trustedContacts = TrustedContact::where('user_id', $userId)->count();

        if (!isset($deathConfirmation->confirmations_from)) {
            return;
        }

        $confirmationsFrom = json_decode($deathConfirmation->confirmations_from, true);
        $numberOfConfirmations = count($confirmationsFrom);

        // Calculate the decline percentage
        $declinePercentage = ($numberOfConfirmations / $trustedContacts) * 100;

        if ($declinePercentage >= 50) {
            $deathConfirmation->confirmation_status = 0;
            $deathConfirmation->is_alive = 1;

            // Reset other fields to null
            $deathConfirmation->death_certificate = null;
            $deathConfirmation->date_of_death = null;
            $deathConfirmation->place_of_death = null;
            $deathConfirmation->confirmations_from = null;

            $deletedRecords =   DeathConfirmationNotification::where('deceased_id', $userId)->get();
            foreach ($deletedRecords as $deletedRecord) {
                $deletedRecord->delete();
            }


        } else {
            $deathConfirmation->confirmation_status = 1;
            $deathConfirmation->is_alive = 0;
        }

        $deathConfirmation->save();

        return response()->json([
            'message' => 'Death confirmation status updated successfully',
            'data' => $deathConfirmation
        ], 200);
    }

    public function declineDeathConfirmation($id): JsonResponse {
        $notification = DeathConfirmationNotification::where('user_id', $id)->first();

        if ($notification) {
            $notification->notification_status = 'declined';
            $notification->save();

            $deathConfirmation = DeathConfirmation::where('user_id', $notification->deceased_id)->first();

            if ($deathConfirmation) {
                $confirmationsFrom = json_decode($deathConfirmation->confirmations_from, true);
                $loggedInUserId = auth()->user()->id;

                if (!in_array($loggedInUserId, $confirmationsFrom)) {
                    $confirmationsFrom[] = $loggedInUserId;
                    $deathConfirmation->confirmations_from = json_encode($confirmationsFrom);
                    $deathConfirmation->save();
                }
            }

            $this->setConfirmationStatusDecline($notification->deceased_id);
        }
        return response()->json(['success' => true]);
    }




}
