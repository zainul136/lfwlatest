<style>
    /*div:where(.swal2-container) .swal2-html-container{*/
    /*    text-align: left !important;*/
    /*}*/
    .swal-button-container confirm .swal2-confirm{
        text-align: left !important;
    }

    .fas {
        font-weight: 100;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm{
        font-family: "Poppins", sans-serif !important;
        font-size: 12px!important;
        line-height: 18px!important;
        background: #99DDCC!important;
        border: 0!important;
        border-radius: 9px!important;
        text-align: left !important;
        color: white!important;
        box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1) !important;
    }
    div:where(.swal2-container) button:where(.swal2-styled).swal2-cancel{
        font-size: 12px!important;
        line-height: 18px!important;
        background: #99DDCC!important;
        text-align: left !important;
        border: 0!important;
        border-radius: 9px!important;
        color: white!important;
        box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1) !important;
    }
</style>
<header>
    <div class="ImageContainer" id="OpenImg">

        <div class="viewImg position-absolute left-0">
            <button onclick="OpenImage('asdasd', false)"
                    class="btn btn-primary">X
            </button>
            <img src="" alt=""></div>
    </div>
    <!-- Header  -->
    <section class="main">
        <div class="container-fluid header">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{ asset('storage/assets') }}/images/logosvg1.svg" alt="logo"/>
                        </a>

                        {{-- Header Search Start --}}

                        <form class="d-flex d-none d-lg-block searchBar" action="{{ route('search') }}" method="get"
                              onsubmit="return validateForm()">
                            <div class="d-flex position-relative w-100">
                                <input class="form-control me-2 search w-100" name="query" id="searchQuery"
                                       placeholder="Search Users by Email" autocomplete="off"/>
                                <button class="position-absolute"
                                        style="top: 32%; right: 5%; background: none; border: none;" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                            <a class="cancelBtn"> Cancel </a>
                        </form>

                        <script>
                            function validateForm() {
                                var query = document.getElementById('searchQuery').value;
                                if (query == "") {
                                    alert("Enter Name or Email to search");
                                    return false;
                                }
                            }
                        </script>


                        {{--  <form class="d-flex d-none d-lg-block searchBar">
                             <div class="d-flex position-relative w-100">

                                 <input class="form-control me-2 search w-100" placeholder="Search for users" />
                                 <a href="{{ route('search') }}" class="position-absolute" style="top: 30%; right: 5%;">
                                     <i class="fa fa-search  " aria-hidden="true"></i>
                                 </a>
                             </div>
                             <a class="cancelBtn"> Cancel </a>
                         </form> --}}

                        {{--  Header Search End --}}

                        <div class=" navbar" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item animation d-lg-none searchIconParent">
                                    <a class="nav-link text-center" aria-current="page" href="{{ route('search') }}">
                                        <i class="fa-solid fa-magnifying-glass"></i> <br/>
                                        Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center  {{ request()->routeIs('home') ? 'active' : '' }} "
                                       aria-current="page" href="{{ route('home') }}">
                                        <img src="{{ asset('storage/assets') }}/images/Vector (1).png"/><br/>
                                        Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center  {{ request()->routeIs('family-tree') ? 'active' : '' }} "
                                       aria-current="page" href="{{ route('family-tree') }}">
                                        <img src="{{ asset('storage/assets') }}/images/familytree.png"/><br/>
                                        My Family</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $userid  = \Illuminate\Support\Facades\Auth::id();
                                    $new_message = \App\Models\ChMessage::query()->where('from_id','=',$userid)->where('seen','=',0)->first();
                                    ?>
                                    <a class="nav-link text-center  {{ request()->routeIs('messages') ? 'active' : '' }} "
                                       href="{{ route('messages') }}"><img src="{{ asset('storage/assets') }}/images/Vector (2).png"/><br/>
                                        <span id="messageText"></span>
                                        Message
{{--                                        <audio id="notificationSound" src="{{asset('audio/nokia_messege_tone.mp3')}}"></audio>--}}

                                    </a>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-center  {{ request()->routeIs('requests') ? 'active' : '' }} " href="{{ route('requests') }}">
                                        <img src="{{ asset('storage/assets') }}/images/requesticon.png"/><br/>Request</a>
                                </li>
                                @php
                                    $userId = auth()->user()->id;
                                    $deathNotifications = \App\Models\DeathConfirmationNotification::where('user_id', $userId)
                                        ->where('notification_status', 'pending')
                                        ->with('users')
                                        ->get();
                                    $loggedInUser = auth()->user();
                                    $usersRequests = \App\Models\UserRelationship::where('relative_id', $loggedInUser->id)
                                        ->where('status', 'pending')
                                        ->with(['relative', 'relationship:id,type'])
                                        ->get();
                                    $privatePosts = \App\Models\PrivateTaggedPeople::where('user_id', $userId)->where('view_post','=','0')->with('post')->get();

                                     $postCountAfterDeathConfirmation = 0;
                                             foreach($privatePosts as $privatePost)
                                         $checkDeathConfirmationUsers = \App\Models\DeathConfirmation::where('user_id', $privatePost->post->user_id)
                                            ->orWhere('is_alive', 0)
                                           ->where('confirmation_status', 1)
                                             ->get();
                                @endphp


                                <li class="nav-item dropdown notifDrop">
                                    <a class="nav-link text-center" role="button" id="notification-menu" onclick = "openDropdown('notifDrop')">
                                        <span style=";">
                                            <i class="fas fa-bell fa-2x" style="color: #99ddcc;"></i>
                                        @php
                                            $deathCount = $deathNotifications->count();
                                              $privatePostCount = 0;

                                             if ($privatePosts) {
                                                   foreach ($privatePosts as $privatePost) {
                                                       $checkDeathConfirmationUsers = \App\Models\DeathConfirmation::where('user_id', $privatePost->post->user_id)
                                                         ->where('is_alive', 0)
                                                          ->where('confirmation_status', 1)
                                                      ->get();

                                                     $privatePostCount += $checkDeathConfirmationUsers->count();
                                                   }
                                                  }

                                                  $userRequestsCount = $usersRequests->count();
                                                  $count = $deathCount + $privatePostCount + $userRequestsCount;

                                                $userRequests = $usersRequests->count();
                                                $count = $deathCount + $privatePostCount + $userRequests;

                                                if ($count > 0) {
                                                $notificationCountClass = '';
                                                if ($count > 9 && $count <= 99) {
                                                 echo '<span style="position: absolute; top: -1px; right: 8px; color: white; background-color: #99ddcc; border-radius: 50%; padding-left: 3px; padding-right: 3px; border: 2px solid #99ddcc; font-size: 12px; margin-right: 15px;">'.$count.'</span>';
                                                  } elseif ($count > 99) {
                                                    echo '<span style="position: absolute; top: -1px; right: 8px; color: white; background-color: #99ddcc; border-radius: 50%; padding-left: 3px; padding-right: 3px; border: 2px solid #99ddcc; font-size: 12px; margin-right: 6px;">'.$count.'</span>';

                                                  }

                                              echo '<span style="position: absolute; top: -1px; right: 8px; color: white; background-color: #99ddcc; border-radius: 50%; padding-left: 5px; padding-right: 5px; border: 2px solid #99ddcc; font-size: 12px; margin-right: 16px;">' . $count. '</span>';                }
                                        @endphp

                                    <br/>
                                        <span id="notification-menu-text1"> Notification </span>
                                    @if ($count > 0)
                                                <span class="badge badge-danger" id="notification-badge"></span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu NotificationDropdown pl-2 pr-0 pt-0 pb-4" style="top : 100%">
                                        <div class="requests">
                                            @foreach($deathNotifications as $dNotification)
                                                @php
                                                    $deathUsers = \App\Models\User::find($dNotification->deceased_id);
                                                    $deathConfirm = \App\Models\DeathConfirmation::where('user_id', $dNotification->deceased_id)
                                                        ->where('confirmation_status', 0)
                                                        ->first();

                                                    $confirmationJson = "[]"; // Default value if no confirmation is found

                                                    if ($deathConfirm) {
                                                        $confirmationJson = $deathConfirm->confirmations_from;
                                                    }

                                                    // Decode the JSON string into an array
                                                    $confirmations = json_decode($confirmationJson);
                                                    $firstConfirmation = $confirmations[0] ?? null;
                                                    $informUser = \App\Models\User::find($firstConfirmation);

                                                @endphp

                                                <div class="mb-5">
                                                    <b>Notification: Condolence Message</b>
                                                    <p>Dear {{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}</p>
                                                    <p>We regret to inform you that {{ $informUser->first_name  ??''}} {{ $informUser->last_name  ??''}} has notified us of the passing of {{ $deathUsers->first_name }} {{ $deathUsers->last_name }} ({{ $deathUsers->email ?? '' }}).</p>
                                                    <div class="d-flex">
                                                        <button id="notificationButton" onclick="checkDeathConfirmation()">View Details</button>
                                                        <input type="hidden" id="csrfToken" data-csrf="{{ csrf_token() }}">
                                                    </div>
                                                </div>
                                            @endforeach

                                            @foreach($privatePosts as $privatePost)
                                                @php
                                                    $checkDeathConfirmationUsers = \App\Models\DeathConfirmation::where('user_id', $privatePost->post->user_id)
                                                        ->where('is_alive', 0)
                                                        ->where('confirmation_status', 1)
                                                        ->get();
                                                @endphp
                                                @foreach ($checkDeathConfirmationUsers as $checkDeath)
                                                    @php
                                                        $deathUsers = \App\Models\User::find($checkDeath->user_id);
                                                    @endphp
                                                    <div class="mb-5">
                                                        <p>We extend our heartfelt condolences on the loss of your beloved {{ $deathUsers->first_name  ??''}}. Upon clicking the "View Post" button, you can access the private Posts</p>
                                                        <div class="d-flex">
                                                            <input type="text" value="{{$privatePost->post_id}}" hidden="">
                                                            <a class="btn-info btn text-white" type="submit" href="{{ route('view-relative-post', ['id' => $deathUsers->id, 'post_id' => $privatePost->post_id]) }}" style="padding: 9px 27px;font-size: 12px;line-height: 18px; background: #99DDCC; border: 0; border-radius: 9px;color: white;  box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);">View Post</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach

                                            @foreach ($usersRequests as $request)
                                                @php
                                                    $userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$request->user->id)->first();
                                                  $profilePicture = isset($userProfileImages->profile_picture) ?
                                                  asset("user_media/{$request->user->id}/profile_picture/{$userProfileImages->profile_picture}") :
                                                  asset('storage/assets/images/profile.jpeg');
                                                @endphp
                                                <div class="r1 d-flex justify-content-between request-card" onclick="OpenReqPage()">
                                                    <div class="left d-flex w-75">
                                                        <img src="{{ $profilePicture }}" alt="">
                                                        <div class="name">
                                                            <h2>
                                                                {{ $request->user->first_name }} {{ $request->user->last_name }}
                                                                <span style="font-weight: normal; font-size: 12px; color: #A1A1AA; margin-bottom: 15px;">
                                                                        (Adding You As
                                                                             @if (isset($request->user->userInformation->gender) && $request->user->userInformation->gender == 'Male')
                                                                        his
                                                                    @else
                                                                        her
                                                                    @endif
                                                                    {{ $request->relationship->type }})
                                                                     </span>
                                                            </h2>
                                                            <p>{{ $request->user->email }}</p>
                                                            <div class="d-flex">
                                                                <button class="confirm-button" data-request-id="{{ $request->user->id }}">Confirm</button>
                                                                <button class="reject-button" data-request-id="{{ $request->user->id }}">Reject</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        @if (count($usersRequests ) == 0 && $count == 0)
                                            <div class="mb-5">
                                                <p class="text-center" style="font-weight: normal; font-size: 18px; color: #A1A1AA; ">No new notifications.</p>
                                            </div>
                                        @endif
                                    </ul>
                                </li>

                                @if(request()->routeIs('profile'))
                                    <li class="nav-item dropdown profileDrop">
                                        <a class="nav-link" href="#" role="button" >
                                            <div class="d-flex align-items-center">
                                                <img src="{{ isset(auth()->user()->userInformation->profile_picture) ?
                                                asset('user_media/' . auth()->user()->id . '/profile_picture/' . auth()->user()->userInformation->profile_picture) :
                                                   asset('storage/assets/images/profile.jpeg') }}" alt="Profile Picture">

                                                <p class="emile">{{ auth()->user()->first_name ?? '' }}</p>
                                            </div>
                                        </a>

                                        <ul class="dropdown-menu navDropdown">
                                            <li>
                                                <div class="d-flex">
                                                    <img src="{{ isset(auth()->user()->userInformation->profile_picture) ?
                                                asset('user_media/' . auth()->user()->id . '/profile_picture/' . auth()->user()->userInformation->profile_picture) :
                                                   asset('storage/assets/images/profile.jpeg') }}" alt="Profile Picture">


                                                    <h2>{{ $data['user']->first_name ?? '' }} {{ $data['user']->last_name ?? '' }} <span>{{ $data['user']->email ?? '' }}</span></h2>
                                                </div>
                                                <a href="{{ route('profile.edit') }}" class="ViewProfile">Edit Profile</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('settings') }}">Setting & Privacy</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('contact-us') }}">Contact</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="nav-item dropdown profileDrop">
                                    <a class="nav-link" href="#" role="button" onclick = "openDropdown('profileDrop')">
                                        <div class="d-flex align-items-center">
                                            <?php
                                            $userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',auth()->user()->id )->first();

                                            $profilePicture = isset($userProfileImages->profile_picture)
                                                ? asset("user_media/" . auth()->user()->id . "/profile_picture/" . ($userProfileImages->profile_picture))
                                                : asset('storage/assets/images/profile.jpeg');

                                            ?>

                                            <img class="girl postProfileIcon" src="{{$profilePicture}}" alt="">

                                            <p class="emile">{{auth()->user()->first_name ?? '' }}</p>
                                            <img src="{{ asset('storage/assets') }}/images/arrow.png"
                                                 class="arrow"/>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu navDropdown" style="top : 100%">
                                        <li>
                                            <div class="d-flex">
                                                <img class="girl postProfileIcon" src="{{$profilePicture}}" alt="">

                                                <h2>{{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}
                                                    <span>{{ auth()->user()->email ?? '' }}</span>
                                                </h2>
                                            </div>
                                            <a href="{{ route('profile.edit') }}" class="ViewProfile">
                                                Edit Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('settings') }}">Setting &
                                                Privacy</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('contact-us') }}">Contact</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>


                        </div>



                    </div>
                </nav>
            </div>
        </div>
    </section>
</header>

<style>
    /* Styles for unread notifications */
    .unread {
        color: red; /* Dark text color */
    }

    /* Styles for read notifications */
    .read {
        /*background-color: #f5f5f5; !* Light gray background *!*/
        color: #777; /* Light text color */
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library if not already included -->

<script>


    var newMessageReceived = false;

    function checkForNewMessages() {
        if (!newMessageReceived) {
            $.ajax({
                url: '/check-new-messages', // Replace with the actual URL to check for new messages
                type: 'GET',
                success: function (data) {
                    if (data.hasNewMessages) {
                        var audio = document.getElementById('notificationSound');
                        audio.play();
                        newMessageReceived = true;
                        $('#messageText').css('color', 'red');
                    }
                },
            });
        }
    }

    // Periodically check for new messages (every 5 seconds in this example)
    setInterval(checkForNewMessages, 5000);

    // Periodically check for new messages (every 5 seconds in this example)
    setInterval(checkForNewMessages, 5000);

    $(document).ready(function () {
        $('.notification-item').click(function (e) {
            e.preventDefault();

            // Get the notification ID from the data attribute
            var notificationId = $(this).data('notification-id');

            // Store a reference to $(this) for later use
            var clickedNotification = $(this);

            // Send an AJAX request to mark the notification as read
            $.ajax({
                type: 'POST',
                url: '{{ route('notification.markAsRead') }}',
                data: {
                    'notification_id': notificationId,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        // Update the UI to mark the notification as read
                        clickedNotification.removeClass('unread').addClass('read');

                        // Redirect to the confirmation view route
                        window.location.href = '{{ route('confirmation.view', '') }}/' + notificationId;
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

<script>
    // Call the function to play the notification sound
    //playNotificationSound();
</script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function checkDeathConfirmation() {
        $.ajax({
            type: 'GET',
            url: '{{ route("check.death.confirmation") }}',
            success: function (response) {
                // Change the button text to "No Notifications Found" by default
                document.getElementById('notificationButton').innerText = 'No Notifications Found';
                // Retrieve the CSRF token from the data attribute
                const csrfToken = document.getElementById('csrfToken').getAttribute('data-csrf');

                if (response.message && response.notification_id) {
                    // Show toaster message with buttons
                    Swal.fire({
                        html: `<div style="font-family: "Poppins", sans-serif !important">
   <b class="text-center  heading" style=" text-align:center; margin-bottom:10px !important;">Notification: Condolence Message</b><br>
    <p style=" text-align:left; margin-top:20px; font-size: 12px;
    line-height: 18px;
    color: #A1A1AA;">Dear  <b>{{auth()->user()->first_name ??''}} {{auth()->user()->last_name ??''}}</b></p>
    <p style="font-weight: 300; text-align:left !important; font-size: 12px;
    line-height: 18px;
    color: #A1A1AA;">
        We regret to inform you that  {{$informUser->first_name ??''}}   {{$informUser->last_name ??''}}  has notified us of the passing of {{$deathUsers->first_name ??''}} {{$deathUsers->last_name ??''}}    ({{$deathUsers->email ??''}}). Our sincere condolences go out to you during this difficult time. We have received the following information and kindly request your confirmation to update our records accordingly:
    </p>
   <p style="font-weight: 300; text-align:left!important; font-size: 12px;

    color: #A1A1AA;"> <b>Name:</b>  {{$deathUsers->first_name ??''}} {{$deathUsers->last_name ??''}}</p>
    <p style="font-weight: 300; margin-top:-2%; font-size: 12px;

    color: #A1A1AA; text-align:left!important"><b>Place of Passing:</b> {{$deathConfirm->place_of_death ??''}}</p>
        <p style="font-weight: 300; margin-top:-2%; font-size: 12px;
        @if(isset($deathConfirm->date_of_death))
                        color: #A1A1AA; text-align:left!important"><b>Date of Passing:</b> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $deathConfirm->date_of_death)->format('d-F-Y \a\t h:iA')  ??''}}</p>
        <p style="font-weight: 300;  font-size: 12px;

        @endif
                        color: #A1A1AA;text-align:left!important"> Please take a moment to confirm or decline this information:</p>
                        <p style="font-weight: 300; font-size: 12px;
                        line-height: 18px;
                        color: #A1A1AA; text-align:left!important" class="mt-3">Your prompt response is greatly appreciated.</p>
                    <p style="color: #A1A1AA;font-size: 12px; font-weight: 300  ; margin-top:-2%; text-align: left !important;"> With sympathy, <br><a href="https://lfw.synet.com.pk/" style="font-size: 12px; color: #A1A1AA;   line-height: 18px; text-align: left !important;">Last Few Words Team</a></p>
                    </div>

`,
                        showCancelButton: true,
                        confirmButtonText: 'Approve',
                        cancelButtonText: 'Decline',


                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User clicked 'Approve', send an AJAX request to approve
                            $.ajax({
                                type: 'POST',
                                url: '/approve-death-confirmation/' + response.notification_id,
                                data: {
                                    "_token": csrfToken, // Include the CSRF token
                                },
                                success: function (approvalResponse) {
                                    // Handle approval response
                                    if (approvalResponse.success) {
                                        location.reload();
                                        // Display a success message or perform further actions
                                    } else {
                                        // Handle error case
                                        location.reload();
                                    }
                                }
                            });
                        } else if (result.isDismissed) {
                            // User clicked 'Decline', send an AJAX request to decline
                            $.ajax({
                                type: 'POST',
                                url: '/decline-death-confirmation/' + response.notification_id,
                                data: {
                                    "_token": csrfToken, // Include the CSRF token
                                },
                                success: function (declineResponse) {
                                    // Handle decline response
                                    if (declineResponse.success) {
                                        location.reload();
                                        // Display a success message or perform further actions
                                    } else {
                                        // Handle error case
                                    }
                                }
                            });
                        }
                    });
                }
            }
        });
    }

    const openDropdown = (parent)=>{
        if(parent == "profileDrop"){
            document.querySelector(`.${parent} .dropdown-menu`).classList.toggle("show")
            document.querySelector(`.notifDrop .dropdown-menu`).classList.remove("show")
        }else if (parent == "notifDrop"){
            document.querySelector(`.${parent} .dropdown-menu`).classList.toggle("show")
            document.querySelector(`.profileDrop .dropdown-menu`).classList.remove("show")

        }
    }

</script>