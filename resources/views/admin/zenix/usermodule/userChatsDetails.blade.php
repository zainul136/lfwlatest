{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <!-- The Modal -->

        <div class="form-head d-flex align-items-center flex-wrap justify-content-between mb-sm-5 mb-3">
            <h2 class="font-w600 mb-0 text-black">User Message Details</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive table-hover fs-14 bg-white">

                    <table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
                        <thead>
                        <tr>
                            <th>Select</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Message</th>

                        </tr>
                        </thead>
                        <tbody id="user-info-tbody">
                        @if(isset($messages))

                            @foreach($messages as $message)
                                    <?php
                                    $fromUser = \App\Models\User::query()->where('id', $message->from_id)->first();
                                    $toUser = \App\Models\User::query()->where('id', $message->to_id)->first();
                                    $modalId = "user-message-modal-{$message->id}"; // Unique ID for each modal

                                    $userProfileImages = \App\Models\UserInformation::query()->where('user_id', $fromUser->id)->first();
                                    $fromUserProfilePicture = isset($userProfileImages->profile_picture) ?
                                        asset("user_media/{$fromUser->id}/profile_picture/{$userProfileImages->profile_picture}") :
                                        asset('storage/assets/images/profile.jpeg');

                                    $toUserProfileImages = \App\Models\UserInformation::query()->where('user_id', $toUser->id)->first();
                                    $toUserProfilePicture = isset($toUserProfileImages->profile_picture) ?
                                        asset("user_media/{$toUser->id}/profile_picture/{$toUserProfileImages->profile_picture}") :
                                        asset('storage/assets/images/profile.jpeg');
                                    ?>

                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 8px;">
                                            <img src="{{$fromUserProfilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
                                            <div>
                                                <p class="mb-0 font-w500">{{$fromUser->first_name .' '.$fromUser->last_name ??''}}</p>
                                                <p class="mb-0" style="font-size: 14px;">{{$fromUser->email ??''}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 8px;">
                                            <img src="{{$toUserProfilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
                                            <div>
                                                <p class="mb-0 font-w500">{{$toUser->first_name .' '.$toUser->last_name ??''}}</p>
                                                <p class="mb-0" style="font-size: 14px;">{{$toUser->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $message->body}}</td>

                            @endforeach
                        @endif


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
        </script>
    @endpush
@endsection