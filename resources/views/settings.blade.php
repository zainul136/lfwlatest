@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')

    <style>
        #userSuggestions {
            display: none;
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            position: absolute;
            width: 100%;
        }

        /* CSS for Contact Items */
        .user-suggestion {
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
            transition: background-color 0.2s;
        }

        .user-suggestion:hover {
            background-color: #f2f2f2;
        }

        /* CSS for Radio Buttons */
        .user-suggestion input[type="radio"] {
            margin-right: 10px;
        }

        .field-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }

        .input-field {
            padding: 8px 16px;
        }

        .save-btn {
            padding: 8px 16px;
            color: white;
            background-color: #99DDCC;
            width: 80px;
            border-radius: 9px;
            margin-bottom: 24px;
            border: none;
            outline: none;
            cursor: pointer;
        }


        .field-box,
        .death-confirmation-active {
            display: none;
        }


        .accordion{
            width: 100%;
        }
        .accordion .card-body .col-md-5.mb-5{
            width: 100%;
        }
        .accordion .card-body .col-md-5.mb-5 form{
            /* width : 100% */
        }
        .accordion-item input {
            width: 100%;
            height: 4rem;
            border-radius: 1rem;
            padding-left: 1rem;
            font-size: 1.2rem;
            margin-top: 1.8rem;
        }
        .accordion-item select {
            width: 100%;
            height: 4rem;
            border-radius: 1rem;
            padding-left: 1rem;
            font-size: 1.2rem;
            margin-top: 1.8rem;
        }
        .accordion-item:nth-child(1) label {
            font-size: 1.2rem;
            padding-top: 1.5rem;
            color: #052C65;
            font-weight: 500;
        }

        .accordion-item:nth-child(1) input {
            border: 0.063rem solid lightgray;
            /* background-color: red; */
            width: 100%;
            margin: 0rem;
            padding-right: 1rem;
        }


        .accordion-item:nth-child(2) {
            justify-content: space-between;
        }

        .accordion-item:nth-child(2) .date {
            width: 49%;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .accordion-item:nth-child(2) .date label {
            font-size: 1.2rem;
            color: #052C65;
            font-weight: 500;
        }

        .accordion-item:nth-child(2) .place {
            width: 49%;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .accordion-item:nth-child(2) .place label {
            font-size: 1.2rem;
            padding-top: 1.5rem;
            color: #052C65;
            font-weight: 500;
        }

        .accordion-item:nth-child(2) input select {
            width: 100%;
            height: 4rem;
            border-radius: 1rem;
            border: 0.063rem solid lightgray;
            padding-left: 1rem;
            padding-right: 2rem;
            font-size: 1.2rem;

        }

        .accordion-item:nth-child(2) input:nth-child(1) {
            cursor: pointer;
        }

        .accordion-item:nth-child(3) {
            align-items: flex-start;
            justify-content: space-between;
        }

        .accordion-item:nth-child(3) label {
            font-size: 1.2rem;
            color: #052C65;
            font-weight: 500;
        }

        /* .accordion-item:nth-child(3) input {
            border: solid;
            padding-left: 0rem;
            border-radius: 0rem;
            padding-left: 1.5rem;
            width: 100% !important;
            height: min-content;
            color: #052C65;
        } */
        table td{
            text-align : center
        }
        .accordion-item i {
            width: 0rem;
            position: relative;
            right: 3.5rem;
            font-size: 2rem;
        }

        .accordion-item:nth-child(3) .container {
            height: min-content;
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
            /* background-color: #5d1a1a; */
            /* background-color: #904747; */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
            width: 100%;
            /* height: 260px; */
            background-color: #ffffff;
            padding: 10px 30px 40px;
        }

        .card h3 {
            font-size: 22px;
            font-weight: 600;

        }

        .drop_box {
            margin: 10px 0;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 3px dotted #a3a3a3;
            border-radius: 5px;
        }

        .drop_box h4 {
            font-size: 16px;
            font-weight: 400;
            color: #2e2e2e;
        }

        .drop_box p {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #a3a3a3;
            text-align: center;
        }

        .btn {
            text-decoration: none;
            background-color: #B1E3D8;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            outline: none;
            transition: 0.3s;
        }
        #userSuggestions  label{
            margin-bottom: 0;
        }
        .btn:hover {
            text-decoration: none;
            background-color: #ffffff;
            color: #B1E3D8;
            padding: 10px 20px;
            border: none;
            outline: 1px solid #B1E3D8;
        }

        .form {
            /* background-color: red; */
            width: min-content;
            height: 6rem;
            margin-left: 40%;
        }

        .form input select {
            margin: 10px 0;
            width: 100%;
            background-color: #e2e2e2;
            border: none;
            outline: none;
            padding: 12px 20px;
            border-radius: 4px;
        }
        .accordion-button {
            margin-bottom: 0; /* Remove the bottom margin */
        }

        /* Media Queries  */
        @media (max-width:544px) {

            .contact h2 {
                font-size: 20px;
            }

            table tr th {
                font-size: 13px;
                font-weight: 500;
            }

            .setting {
                padding: 0 10px !important;
            }

            .accordion {
                width: 100%;
            }

            .accordion-item input,
            .accordion-item:nth-child(2) input {
                font-size: 16px;
            }

            .accordion-item:nth-child(2) {
                flex-direction: column;
                align-items: flex-start;
            }

            .accordion-item:nth-child(2) .date,
            .accordion-item:nth-child(2) .place {
                width: 100%;
            }

            .accordion-item:nth-child(1) label,
            .accordion-item:nth-child(2) .date label,
            .accordion-item:nth-child(2) .place label,
            .card h3 {
                font-size: 16px;
            }

            .contact form button,
            .drop_box p {
                width: auto;
                height: auto;
            }

            .card {
                padding: 10px 8px 10px;
            }
        }
        @media screen and (max-width : 768px) {
            .table-responsive{
                overflow : scroll
            }
            table{
                min-width: 600px;
            }
            .contact.setting{
                padding: 0 !important;
            }
            .accordion-button{
                padding-left: 0;
                padding-right: 0;
            }
            .contact h2.text-left.mx-auto{
                padding-left: 20px;
            }
        }
    </style>
    <div class="container-fluid p-0"
         style=" background-color: rgba(18, 32, 59, 0.09);padding: 30px 0px !important;min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="col-12 contact setting" style="margin-top: 30px;">
                    <h2 class="text-left mx-auto">General preferences</h2>
                    <div class="m-4">
                        <div class="accordion" id="myAccordion">
                            <!-- Tab 1: Email Address -->
                            <div class="accordion-item">
                                <h2 class="" id="headingOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">Email Address</button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                                    <div class="card-body">
                                        <form action="{{route('settings-update-email')}}" method="post">
                                            @csrf
                                            <input type="email" name="email" autofocus="" class="form-control input-field" placeholder="Enter New Email Address">
                                            <button type="submit" class="save-btn mt-4">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2: Change Password -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Change Password</button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#myAccordion">
                                    <div class="card-body">
                                        <form method="post" action="{{route('settings-update-password')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" name="old_password" class="form-control input-field" placeholder="Enter Old Password">
                                                @error('old_password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="new_password" class="form-control mt-4 mb-4 input-field" placeholder="Enter New Password">
                                                @error('new_password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="new_password_confirmation" class="form-control mb-4 input-field" placeholder="Confirm New Password">
                                                @error('new_password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="save-btn">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 3: Trusted Contact -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">Trusted Contact</button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($totalTrustedContract))
                                                @foreach($totalTrustedContract as $contact)
                                                    <tr>
                                                        <td>{{$contact->trusted_contact_id ? \App\Models\User::query()->where('id',$contact->trusted_contact_id)->first('first_name')->first_name: 'N/A'}}</td>
                                                        <td>{{$contact->trusted_contact_id ? \App\Models\User::query()->where('id',$contact->trusted_contact_id)->first('last_name')->last_name: 'N/A'}}</td>
                                                        <td>{{$contact->trusted_contact_id ? \App\Models\User::query()->where('id',$contact->trusted_contact_id)->first('email')->email: 'N/A'}}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('remove-trusted-contact',$contact->id)}}" class="btn btn-danger btn-sm">Remove</a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-5 mb-5">
                                            @if(count($totalTrustedContract) < 5 )
                                                <form method="POST" style="position : relative" action="{{ route('store-trusted-contact') }}">
                                                    <input type="text" name="trusted_contact_id" class="form-control mb-2 py-3 border-1"  id="privatePeopleSearchHere" placeholder="Search name or email of the user." autocomplete="none">
                                                    @csrf
                                                    <!-- User Suggestions List -->
                                                    <div id="userSuggestions" class="suggestions"></div>
                                                    <!-- Hidden input to store selected user's email -->
                                                    <input type="hidden" name="selected_user_email" id="selectedUserEmail" value="">
                                                    <!-- Submit Button -->
                                                    <button type="submit" class="btn btn-danger mb-0">Add Trusted Contact</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Tab 4: Private post View  -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix">Private Posts</button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>Family Member</th>
                                                    <th>Post Type</th>
                                                    <th>Date and Time</th>
                                                    <th>Status</th>
                                                    <th>View Post</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                @if(isset($deathConfirm))

                                                    @foreach($privateTagViewPosts as $privateTagViewPost)
                                                            <?php
                                                            $subcribes = \App\Models\Subscription::query()->where('subscriber_id','=',$privateTagViewPost->user_id)->where('post_id','=',$privateTagViewPost->post_id)->first()
                                                            ?>
                                                        <tr>
                                                            <td>{{$privateTagViewPost->post->user->first_name ?? '' }} {{$privateTagViewPost->post->user->last_name  ??' '}}</td>
                                                            <td>{{$privateTagViewPost->post->post_type }}</td>
                                                            <td>{{$privateTagViewPost->post->created_at->format('d F Y') }} {{ $privateTagViewPost->post->created_at->format('h:i A') }}</td>

                                                            <td>
                                                                @if(isset($subcribes))
                                                                    @if($subcribes->status == 'completed')Payment Completed @else Payment Pending @endif
                                                                @endif

                                                            </td>

                                                            <td>
                                                                @if($privateTagViewPost->post->hasSubscription())
                                                                    <a class="btn-info btn text-center" type="submit" href="{{ route('view-relative-post', ['id' => $privateTagViewPost->post->user->id, 'post_id' => $privateTagViewPost->post->id]) }}" style="padding: 9px 27px;font-size: 12px;line-height: 18px; background: #99DDCC; border: 0; border-radius: 9px;color: white;  box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);">View Post</a>
                                                                @else
                                                                    {{--                                                                <a class="btn-info btn text-center" type="submit" href="javascript:void(0)" style="padding: 9px 27px;font-size: 12px;line-height: 18px; background: #99DDCC; border: 0; border-radius: 9px;color: white;  box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);" onclick="this.nextElementSibling.classList.toggle('active');">View Post</a>--}}
                                                                    <a class="btn-info btn text-center" type="submit" href="{{ route('view-relative-post', [$privateTagViewPost->post->user->id, $privateTagViewPost->post->id]) }}" style="padding: 9px 27px;font-size: 12px;line-height: 18px; background: #99DDCC; border: 0; border-radius: 9px;color: white;  box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);">View Post</a>
                                                                    <div class="tm_popup tm_subscription_popup">
                                                                        <div class="tm_overlay" onclick="this.parentElement.classList.toggle('active');"></div>
                                                                        <div class="main_content">

                                                                            <h3>Profile Information</h3>
                                                                            <div class="row mt-2">
                                                                                <div class="col-2 offset-2" >
                                                                                    <img src="{{asset('user_media/'.$privateTagViewPost->post->user->id.'/profile_picture/'.$privateTagViewPost->post->user->userInformation->profile_picture) ??''}}" height="100" width="100" style="border-radius: 10%">
                                                                                </div>
                                                                                <div class="col-4 offset-1 mt-4" style="text-align: left">
                                                                                    <span class="text-left"  style="font-size: 16px;font-weight: 500;margin-bottom: 0;color: #999999;">{{ $privateTagViewPost->post->user->getFullName() ??''}}</span>
                                                                                    <span  style="font-size: 16px;font-weight: 500;margin-bottom: 0;color: #999999;">{{$privateTagViewPost->post->user->email ??''}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mt-3" style="font-size: 16px;font-weight: 500;margin-bottom: 0;color: #999999;">We deeply regret your loss here at LastFewWords, and our hearts go out to you during this difficult time. On a brighter note, your beloved has thoughtfully left behind a personal message/documents, providing you with a meaningful connection to them. We encourage you to embrace this precious gift and proceed to view these cherished words and memories.</p>
                                                                            <div class="row mt-3" style="display: flex; ">
                                                                                <div class="button-container" style="display: flex;">
                                                                                    <a href="{{ route('subscribe.post', $privateTagViewPost->post->id) }}" style="font-size: 12px;line-height: 18px;background: #99DDCC;border: 0;border-radius: 9px;color: white; box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);" >Unlock Post</a>
                                                                                    <a href="{{ route('home') }}" style="margin-left: -15%; font-size: 12px;line-height: 18px;background: #99DDCC;border: 0;border-radius: 9px;color: white; box-shadow: 0px 4px 10px rgba(51, 51, 51, 0.1);" >Home</a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                            <style>

                                                /* Change the background color of the active page link */
                                                .pagination .page-item.active .page-link {
                                                    background-color: #99DDCC;
                                                    color: white;
                                                }

                                                /* Change the background color of the other page links */
                                                .pagination .page-item .page-link {
                                                    background-color: #F5F5F5;
                                                    color: #99DDCC;
                                                }

                                                /* Style for previous and next links */
                                                .pagination .page-item .page-link.prev,
                                                .pagination .page-item .page-link.next {
                                                    color: #99DDCC;
                                                    background-color: transparent;
                                                    border: 1px solid #99DDCC;
                                                }

                                                /* Style for disabled links */
                                                .pagination .page-item.disabled .page-link {
                                                    background-color: #E9ECEF;
                                                    color: #99DDCC;
                                                }

                                                /* TM Custom */
                                                .tm_popup:not(.active){
                                                    display: none;
                                                }
                                                .tm_popup .tm_overlay{
                                                    position: fixed;
                                                    z-index: 10;
                                                    top: 0;
                                                    left: 0;
                                                    right: 0;
                                                    bottom: 0;
                                                    background: #000000a0;
                                                    backdrop-filter:blur(5px);
                                                }
                                                .tm_popup .main_content{
                                                    position: fixed;
                                                    top: 50%;
                                                    left: 50%;
                                                    transform: translate(-50%, -50%);
                                                    background: white;
                                                    padding: 2rem;
                                                    z-index: 11;
                                                    border-radius:10px;
                                                    display: flex;
                                                    flex-direction: column;
                                                }
                                                .tm_popup .main_content a{
                                                    color: white;
                                                    text-decoration: none;
                                                    background: #635bff;
                                                    padding: 10px 2rem;
                                                    border: 1px solid #ccc;
                                                    border-radius: 5px;
                                                    font-weight: 600;
                                                    margin: auto;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: space-between;
                                                }
                                                .tm_popup .main_content a i{
                                                    color: white;
                                                    margin-left: 5px;
                                                    width: auto;
                                                    position: static;
                                                }
                                            </style>
                                            {{--                                            <div class="d-flex">--}}
                                            {{--                                                {{ $privateTagViewPosts->links('pagination::simple-bootstrap-5') }}--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 4: Death Confirmation -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">Death Confirmation</button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                                    <div class="card-body">
                                        @if($totalTrustedToContract->isEmpty())
                                            <p class="text-center">Nobody has added you as a trusted contact yet.</p>
                                        @else
                                            <form method="POST" action="{{ route('store-death-confirmation') }}" enctype="multipart/form-data">
                                                @csrf
{{--                                                <audio id="notificationSound" autoplay="false">--}}
{{--                                                    <source src="{{ asset('audio/notifications.mp3') }}" type="audio/mpeg">--}}
{{--                                                </audio>--}}

                                                <div>
                                                    <label for="trusted_contact_id" class="form-label">Select Trusted User:</label>
                                                    <select class="form-select" id="user_id" name="user_id">
                                                        @foreach($totalTrustedToContract as $TrustedContract)
                                                            <option value="{{ $TrustedContract->user_id }}">
                                                                {{ $TrustedContract->user_id ? \App\Models\User::query()->where('id',$TrustedContract->user_id)->first('first_name')->first_name : 'N/A' }}
                                                                {{ $TrustedContract->user_id ? \App\Models\User::query()->where('id',$TrustedContract->user_id)->first('last_name')->last_name : 'N/A' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="date">
                                                        <label for="name" style="margin-top: 2%;">Date of Death*</label>
                                                        <input style="margin-top: -0.2%;" name="date" type="datetime-local" class="form-control" placeholder="Enter Date of Death" id="dateInput" />
                                                    </div>
                                                    <div class="place">
                                                        <label for="name" style="margin-top: 2%;">Place of Death*</label>
                                                        <input style="margin-top: -0.2%;" name="place_of_death" type="text" class="form-control" placeholder="Enter Place of Death" />
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div>
                                                        <div class="card">
                                                            <h3>Upload Files</h3>
                                                            <div class="drop_box">
                                                                <header>
                                                                    <h4>Select File here</h4>
                                                                </header>
                                                                <p class="fileName">Files Supported: PEG, JPG, PNG  PDF, TEXT, DOC, DOCX</p>
                                                                <!-- The label element is used to style the button and associate it with the file input -->
                                                                <label for="fileID" class="btn">Choose File</label>
                                                                <!-- The file input is now visible and accepts specific file types -->
                                                                <input name="certificate" type="file" id="fileID" accept=".pdf, .JPEG,.JPG,.PNG,.txt,.doc,.docx" style="display: none">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-danger w-auto">Submit</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('#privatePeopleSearchHere').on('keyup', function () {
                let query = $(this).val();
                if (query != '') {
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "/privatePeopleSearch",
                        method: "POST",
                        data: { query: query, _token: _token },
                        success: function (data) {
                            console.log(data); // Corrected console.log

                            let userSuggestions = $('#userSuggestions');
                            userSuggestions.empty(); // Clear existing suggestions

                            if (data.length > 0) {
                                $.each(data, function (key, value) {
                                    let fullName = value.first_name + " " + value.last_name;
                                    let suggestionDiv = $('<div class="user-suggestion">' +
                                        '<input type="radio" name="contact" style="width : auto; height : auto; margin-top : 0;" value="' + value.email + '">' +
                                        '<label for="' + value.email + '">' +
                                        '<span class="contact-name">' + fullName + '</span>' +
                                        '<span class="contact-email"> (' + value.email + ')</span>' +
                                        '</label>' +
                                        '</div>');

                                    userSuggestions.append(suggestionDiv);
                                });
                                userSuggestions.show(); // Show the user suggestions div

                                // Event delegation to handle the click event for suggestions
                                userSuggestions.on('click', '.user-suggestion', function () {
                                    let selectedEmail = $(this).find('input[name="contact"]').val();
                                    let selectedFullName = $(this).find('.contact-name').text().trim();
                                    $('#privatePeopleSearchHere').val(selectedFullName + ' (' + selectedEmail + ')');
                                    $('#selectedUserEmail').val(selectedEmail);
                                    userSuggestions.hide();
                                });
                            } else {
                                userSuggestions.hide(); // Hide the user suggestions div if no results
                            }
                        }
                    });
                } else {
                    $('#userSuggestions').hide(); // Hide the user suggestions div if the input is empty
                }
            });
            $("#fileID").change((event)=>{
                $(".fileName").html(event.target.files[0].name)
                document.querySelector(".fileName").style.fontWeight = "bold"
                document.querySelector(".fileName").style.fontSize = "18px"
                document.querySelector(".fileName").style.textTransform = "capitalize"
                // console.log($(".fileName"))
            })
        });

    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Initialize Pusher
        const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
            cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
            encrypted: true,
        });

        // Subscribe to the private channel for the current user
        const channel = pusher.subscribe('user.{{ auth()->id() }}');

        // Handle incoming notifications
        channel.bind('death-confirmation', function (data) {
            // Handle the notification, e.g., display it to the user
            console.log('Received death confirmation:', data);
            // Update the UI with the new notification.
        });
    </script>
    <script>
        var currentDate = new Date().toISOString().split('T')[0];

        // Set the minimum value for the input field to the current date.
        document.getElementById("dateInput").max = currentDate + "T00:00";

        // Disable the input field for future dates.
        document.getElementById("dateInput").addEventListener("input", function() {
            var selectedDate = this.value.split('T')[0];
            if (selectedDate > currentDate) {
                this.value = currentDate + "T00:00";
            }
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection