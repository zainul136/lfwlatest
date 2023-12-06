<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta content="" name="description" />
    <meta content="greenbrier" name="keywords" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('storage/assets/build/css/countrySelect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Link to the file hosted on your server, -->
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .container {
            max-width: 1637px !important;
        }


    </style>
</head>

<body>




<div class="container">
        <div class="row mt-5">

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" id="errorAlert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" id="successAlert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="col-md-12 text-center" style="padding: 10% 20%;">
                <?php
                $userid = \Illuminate\Support\Facades\Auth::id();
                $deathUser =  \App\Models\DeathConfirmation::query()->where('user_id','=',$userid)->where('recovery_confirmation','=', null)->first();

                ?>
                @if(isset($deathUser))
               <div class="row">
                   <div class="col-2 offset-10">
                       @if(Auth::check())
                           <a class="btn btn-info text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color:#6FD0B8; border: #6FD0B8;">
                               Logout
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                       @else
                           <!-- Display login/register links or any other content for users who are not logged in -->
                       @endif

                   </div>
               </div>



                    <h2 class="text-center mx-auto pt-5" style="font-weight: 700; font-size: 48px;">Profile Locked</h2>
                    <p class="text-center mx-auto pt-2">"
                        Your profile has been locked due to a confirmed report of your passing.
                        This confirmation was made by
                        <span><strong style="font-weight:bold !important;"> {{$confirmUser->first_name}} {{$confirmUser->last_name}} </strong></span> , of the Confirming Person

                        on  <span><strong style="font-weight:bold !important;">  {{ $confirmation->created_at->format('d-F-Y') }} </strong> </span>
                        at  <span><strong style="font-weight:bold !important;">  {{ $confirmation->created_at->format('h:i A') }} </strong> </span>

                        If you believe this is a mistake or need further assistance, please follow the recovery process below. "
                    </p>

                    <h2 class="text-center mx-auto pt-5" style="font-weight: 700; font-size: 40px;">Recovery Process:</h2>
                    <p class="text-center mx-auto pt-2">"
                        Please Enter Your Re-Activation Message "
                    </p>
                    <form  method="post" action="{{route('recovery-death-confirmation',$confirmation->id)}}" >
                        @csrf
                        <div class="text-center">
                            <div class="form-group text-center">
                                <textarea  rows="6" name="recovery_confirmation" class="form-control centered-placeholder" placeholder="Enter Your Message" ></textarea>
                            </div>

                            <div class="form-group text-center pt-3">
                                <button type="submit" class=" text-center text-white btn btn-info" style="background-color: #6FD0B8; border: #6FD0B8;">Submit</button>
                            </div>
                        </div>
                    </form>
                @else
                    <h2  style="font-weight: 700; font-size: 35px;">Recovery Message Sent</h2>
                    <p class="text-center mx-auto pt-5" style="font-weight: 500; font-size: 25px;">Your request for<span><strong> Unlocking the Profile</strong></span>
                        is submitted to Admin. Your Profile is recovered Soon...
                        When Admin unlocked your Profile.
                    </p>

                    <div class="row mt-5">
                        <div class="col-2 offset-10">
                            @if(Auth::check())
                                <a class="btn btn-info text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color:#6FD0B8; border: #6FD0B8;">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <!-- Display login/register links or any other content for users who are not logged in -->
                            @endif

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        // Close error alert
        $("#errorAlert .close").click(function() {
            $("#errorAlert").alert('close');
        });

        // Close success alert
        $("#successAlert .close").click(function() {
            $("#successAlert").alert('close');
        });
    });
</script>






</body>

</html>
