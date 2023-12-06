{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <!-- The Modal -->
        <div class="form-head d-flex align-items-center flex-wrap justify-content-between mb-sm-5 mb-3">
            <h2 class="font-w600 mb-0 text-black">User Chats</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive table-hover fs-14 bg-white">
                    <div class="table-before-first">
                        <div class="search-bar-container">
                            <img class="input-search-icon" src="{{ asset('images/search.png') }}" alt="">
                            <input id="user-chat-search-input" type="text" class="form-control user-search-bar" placeholder="search for users">
                        </div>
                        <div class="table-before-btn-container position-relative">
                            <div class="user-chat-filter-modal position-absolute bg-white" style="border-radius:15px; padding: 24px 32px; top: 56px;  right: 0; border: 1px solid rgba(153, 153, 153, 0.46); display: none;">
                                <p class="font-w500 main-black mb-2">User1</p>
                                <input class="w-100 mb-4" type="text" id="" style="height: 46px; padding: 5px; border-radius: 15px; border: 1px solid rgba(153, 153, 153, 0.46);">
                                <p class="font-w500 main-black mb-2">User2</p>
                                <input class="w-100" type="text" id="" style="height: 46px; padding: 5px; border-radius: 15px; border: 1px solid rgba(153, 153, 153, 0.46);">
                                <div class="mt-4" style="display: flex; gap: 10px;">
                                    <button class="white-btn user-chat-filter-cancel-btn" style="padding: 13px 36px;">Cancel</button>
                                    <button class="main-btn" style="padding: 13px 36px;">Save</button>
                                </div>
                            </div>
                            <a href="#" class="user-chat-filter-btn" >
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 0H14.0002C15.3981 0 16.5727 0.95608 16.9057 2.25H19.0002C19.4145 2.25 19.7502 2.58579 19.7502 3C19.7502 3.41421 19.4145 3.75 19.0002 3.75H16.9057C16.5727 5.04392 15.3981 6 14.0002 6H12.0002C10.3434 6 9.00024 4.65685 9.00024 3C9.00024 1.34315 10.3434 0 12.0002 0ZM1 2.25C0.585786 2.25 0.25 2.58579 0.25 3C0.25 3.41421 0.585786 3.75 1 3.75H6C6.41421 3.75 6.75 3.41421 6.75 3C6.75 2.58579 6.41421 2.25 6 2.25H1ZM13.9998 10.25C13.5855 10.25 13.2498 10.5858 13.2498 11C13.2498 11.4142 13.5855 11.75 13.9998 11.75H18.9998C19.414 11.75 19.7498 11.4142 19.7498 11C19.7498 10.5858 19.414 10.25 18.9998 10.25H13.9998ZM8 8.00002H6C4.60212 8.00002 3.42755 8.95609 3.09451 10.25H1C0.585786 10.25 0.25 10.5858 0.25 11C0.25 11.4142 0.585786 11.75 1 11.75H3.09451C3.42755 13.0439 4.60212 14 6 14H8C9.65685 14 11 12.6569 11 11C11 9.34316 9.65685 8.00002 8 8.00002Z" fill="#292929" />
                                </svg>
                                Filter</a>
                            <button class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                    <table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
                        <thead>
                        <tr>
                            <th>Select</th>
                            <th>User1</th>
                            <th>User2</th>
                            <th>Time</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody id="user-chat-info-tbody">
                        @if(isset($messages))
                            @foreach($messages as $message)
                                    <?php
                                    $fromUser = \App\Models\User::query()->where('id', $message->user1)->first();
                                    $toUser = \App\Models\User::query()->where('id', $message->user2)->first();
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
                                    <td>{{ $message->created_at->format('d-m-y g:i A') }}</td>
                                    <td class="table-action-tr">
                                        <a href="{{ route('user-message-details', [$message->user1, $message->user2]) }}" class="text-black font-w600 message-contents-view-btn" >
                                            <svg class="table-action-tr-first " id="message-contents-view-btn" data-userid="{{ $message->id }}" data-modalid="{{ $modalId }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                    @if(isset($message))
                    <div id="user-info-modal-{{ $message->id }}" class="modal-box user-message-modal">
                        <?php
                        $messages = \App\Models\ChMessage::query()->where('from_id','=',$fromUser->id)->where('to_id','=',$toUser->id)->get();
                        ?>
                                <!-- Modal content -->
                        <div class="modal-content">
                            <div style="display: flex; justify-content: space-between;
                                    align-items: center;">
                                <h4>Message Content</h4>
                                <!-- <span class="close message-modal-close">&times;</span> -->
                            </div>
                            <div class="modal-content-first">
                                <table class="table table-responsive table-striped">
                                    <tr>
                                        <th>From User</th>
                                        <th>To User</th>
                                        <th>Message</th>
                                    </tr>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{$fromUser->first_name .' '.$fromUser->last_name ??''}}</td>
                                            <td>{{$toUser->first_name .' '.$toUser->last_name ??''}}</td>
                                            <td>{{$message->body}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="modal-cancwl-del-container">
                                <button class="modal-cancel-btn message-modal-close">Cancel</button>
{{--                                <button class="modal-del-btn">Delete</button>--}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                var $searchInput = $("#user-chat-search-input");

                $searchInput.on("input", function () {
                    var searchTerm = $searchInput.val().toLowerCase();

                    // Loop through each table row
                    $("#user-chat-info-tbody tr").each(function () {
                        var $row = $(this);
                        var rowText = $row.text().toLowerCase();

                        // Show or hide the row based on whether it contains the search term
                        $row.toggle(rowText.includes(searchTerm));
                    });
                });
            });
        </script>
    @push('scripts')
    @endpush
@endsection