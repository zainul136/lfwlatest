@extends('main')
<link src="{{ asset('storage/assets') }}/images/logosvg1.svg" alt="logo"/>
<link rel="icon" type="image/x-icon" href="{{asset('storage/assets') }}/images/logosvg1.svg" />

@section('title', $title)

@section('header')
@include('layouts.header')
@endsection
@section('content')
<script src="{{ asset('storage/assets/familyTree/familytree.js') }}"></script>
    <style>
        /*----------------genealogy-scroll----------*/


        /*----------------genealogy-tree----------*/
        .genealogy-body {
            white-space: nowrap;
            overflow-y: hidden;
            padding: 50px;
            min-height: 500px;
            padding-top: 10px;
            text-align: center;
        }

        .genealogy-tree {
            display: inline-block;
        }

        .genealogy-tree ul {
            padding-top: 20px;
            position: relative;
            padding-left: 0px;
            display: flex;
            justify-content: center;
        }

        .genealogy-tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 78px 80px 14px 32px
        }

        .genealogy-tree li::before,
        .genealogy-tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #ccc;
            width: 50%;
            height: 18px;
        }

        .genealogy-tree li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #ccc;
        }

        .genealogy-tree li:only-child::after,
        .genealogy-tree li:only-child::before {
            display: none;
        }

        .genealogy-tree li:only-child {
            padding-top: 0;
        }

        .genealogy-tree li:first-child::before,
        .genealogy-tree li:last-child::after {
            border: 0 none;
        }

        .genealogy-tree li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .genealogy-tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        .genealogy-tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #ccc;
            width: 0;
            height: 20px;
        }

        .genealogy-tree li .main_user {
            width: 215px !important;
            margin-bottom: 8px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }

        .genealogy-tree li .fam_user {
            width: 215px !important;
            margin-top: 1rem;
            margin-bottom: 5px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }

        /* .genealogy-tree li a:hover+ul li::after,
                                                                                                                                                                                                .genealogy-tree li a:hover+ul li::before,
                                                                                                                                                                                                .genealogy-tree li a:hover+ul::before,
                                                                                                                                                                                                .genealogy-tree li a:hover+ul ul::before {
                                                                                                                                                                                                    border-color: #fbba00;
                                                                                                                                                                                                } */

        /*--------------memeber-card-design----------*/
        .member-view-box {
            padding: 0px 16px;
            text-align: center;
            border-radius: 4px;
            position: relative;
            background: #E6E6E6;
            align-items: center;
            height: 240px;
            border: 3px solid #AAE3D4;
            transition: transform 0.3s;
        }

        .member-view-box-deceased {
            padding: 0px 16px;
            text-align: center;
            border-radius: 4px;
            position: relative;
            background: #E3E3E3 !important;
            align-items: center;
            height: 240px;
            border: 2px solid #52525B;
            transition: transform 0.3s;
            filter: grayscale(1);
        }

        .member-view-box:hover {
            transform: scale(1.1);
        }

        .member-view-box-deceased:hover {
            transform: scale(1.1);
            border: 2px solid #9a9a9a;
        }

        .member-image img {
            width: 119px;
            height: 119px;
            border-radius: 50%;
            border: 3px solid #AAE3D4;
            position: absolute;
            z-index: 100;
            top: -66px;
            left: 50%;
            transform: translateX(-50%) scale(1);
            transform-origin: center center;
            transition: transform 0.3s ease-in-out;
        }

        .member-image:hover img {
            transform: translateX(-50%) scale(1.1);
            /* Scale the image on hover */
        }

        .member-image-deceased img {
            width: 119px;
            height: 119px;
            border-radius: 50%;
            border: 3px solid #9a9a9a;
            position: absolute;
            z-index: 100;
            top: -66px;
            left: 50%;
            transform: translateX(-50%) scale(1);
            transform-origin: center center;
            transition: transform 0.3s ease-in-out;
        }

        .member-image-deceased:hover img {
            transform: translateX(-50%) scale(1.1);
        }

        .marker {
            width: 50px;
            height: 50px;
            transition: all 0.2s ease-in-out;
            border-radius: 100%;
            border: 3px solid #AAE3D4;
            position: absolute;
            z-index: 100;
            top: 0px;
            left: 50%;
        }

        .member-details {
            margin-top: 100px;
        }

        .member-details .btn_name {
            padding: 7px 68px;
            border-radius: 30px;
            font-size: 14px;
            color: white;
            background: #99DDCC;
            align-items: center;
            border: 0px;
        }

        .member-details .btn_name_deceased {
            padding: 7px 68px;
            border-radius: 30px;
            font-size: 14px;
            color: white;
            background: #52525B;
            align-items: center;
            border: 0px;
        }



        /* CSS for the button when it is focused */
        .member-details .btn_name:focus {
            color: white;
            background: #99DDCC;
        }

        .member-details .btn_name:active {
            color: white;
            background: #99DDCC;
        }

        .member-details .btn_name_deceased:focus {
            color: white;
            background: #52525B;
        }

        .member-details .btn_name_deceased:active {
            color: white;
            background: #52525B;
        }


        .addline2 {
            width: 66px;
            position: absolute;
            top: 14rem;
            left: -34px;
            z-index: 100;
            height: 3px;
            background: #CBD5E1;
        }

        .addline2 img {
            position: absolute;
            top: -18px;
            left: -18px;
        }

        .addline2_deceased {
            width: 66px;
            position: absolute;
            top: 14rem;
            left: -34px;
            z-index: 100;
            height: 3px;
            background: #a7a7a7;
        }

        .addline2_deceased img {
            position: absolute;
            top: -18px;
            left: -18px;
            width: 38px;
        }

        .profileBtn {
            position: absolute;
            bottom: -35px;
            left: 40px;
            background: #52525B;
            color: #ffffff;
            padding: 5px 50px;
            border-radius: 32px;
        }


        .profileBtn:active {
            background: #52525B;
            border: 1px solid #52525B;
            color: #ffffff
        }

        .profileBtn:hover {
            background: #52525B;
            border: 1px solid #52525B;
            color: #ffffff;
        }

        .profileBtn:focus {
            background: #52525B;
            border: 1px solid #52525B;
            color: #ffffff;
        }
    </style>

    <div class="fadeBody" onclick="OpenMenu(event)"></div>
    <div class="sideMenu">
        <div class="sideMenuIcons">

            <img src="{{ asset('storage/assets/images') }}/location.png" alt=""
                 onclick="GetLocation(39.34,-76.491, 'Jakob Levin', 'jakoblevin@gmail.com', 58)">
            <div class="searchUser position-relative d-flex">
                <form role="search" class=" SearchUserInput position-absolute">
                    <input type="search" placeholder="search a person" class="form-control search" aria-label="Search">
                    <a href="#"> <i class="fa fa-search " aria-hidden="true"></i></a>


                </form>
                <img src="{{ asset('storage/assets/images') }}/searchuser.png" alt="" onclick="OpenSearchUser()">
            </div>
            <div class="zoom d-flex position-relative">
                <div class="zoomBtns position-absolute">
                    <img src="{{ asset('storage/assets/images') }}/zoomout.png" alt="" onclick="zoomOut()">
                    <img src="{{ asset('storage/assets/images') }}/zoomin.png" alt="" onclick="zoomIn()">
                </div>
                <img src="{{ asset('storage/assets/images') }}/zoom.png" alt="" onclick="OpenZoom()">
            </div>
        </div>
        <img src="{{ asset('storage/assets/images') }}/menu.png" alt="" class="menu" onclick="OpenMenu(event)">
    </div>

    <div class="container-fluid p-0 familyMemberTree"
         style="
        min-height: 100vh;
           overflow: scroll !important;
           overflow-x: hidden !important;
           padding-top: 0 !important;
      ">


        <div class="container  family-tree familyMembertree" style=" max-width: 100% !important;">
            <div class="w-100 d-flex flex-row-reverse">

                <div class="col-sm-3" style="top: 20px; width: 33.33%; height: 100vh;">
                    <div class="green-outer ">
                        <div class="green-box">

                        </div>
                        <div class="greenemail">
                            <p>
                                Name: <span class="float-end">Jenifer Emile</span>
                            </p>
                            <p>
                                Email: <span class="float-end">Jeniferemile126gmail.com</span>
                            </p>
                            <p>Country: <span class="float-end">Spain</span></p>
                            <p>Age: <span class="float-end">38</span></p>
                        </div>
                    </div>
                    <div id="map">
                    </div>
                    <button class="reqpubpf justify-content-center align-items-center">Request for Public Profile </button>
                </div>

                <div class="col-sm-9 p-0" style="width: 66.67%;">

                    <div class="bar bg-white d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/assets/images') }}/home.png" alt="" class="home">
                            <img src="{{ asset('storage/assets/images') }}/setting.png" alt="" class="setting">
                        </div>
                        <div class="input form-control">
                            <img src="{{ asset('storage/assets/images') }}/search.png" alt="">
                            <input class="border-0" type="search" placeholder="Find someone on this tree">
                        </div>
                        <div class="d-flex align-items-center">
                            <input max="150" onchange="Range(event)" type="range" name="" id="range"
                                   class="range styled-slider slider-progress" value="100">
                            <p id="RangVal">50%</p>
                        </div>
                    </div>

                    <div style="width:100%; overflow: scroll; height: 100vh;">
                        <div id="zoomdiv" class="rows d-flex justify-content-center align-items-start"
                             style="flex-direction: column; position: relative; transform: scale(1); top: 50px;">

                            <div style="display: none;" class="addline">
                                <img src="{{ asset('storage/assets/images') }}/add.png" alt="" type="button"
                                     data-bs-toggle="modal" data-bs-target="#exampleModal">
                            </div>
                            <!-- dynamic user  -->
                            <div class="genealogy-body genealogy-scroll">
                                <div class="genealogy-tree">
                                    <ul>
                                        <li>

                                            <!-- parent user -->
                                            <div style="margin-top: 100px;">

                                                <a href="#" onclick="getUserLocation()" class="main_user">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <div
                                                                    class="img d-flex justify-content-center align-items-center">
                                                                <img src="@if (isset($user->user_information->profile_picture)) {{ asset('user_media/' . $user->id . '/profile_picture/' . $user->user_information->profile_picture) }} @else {{ asset('storage/assets/images/profile.jpeg') }} @endif"
                                                                     class="card-img-top" alt="..." />
                                                            </div>


                                                            <div class="member-details">
                                                                <p>

                                                                    <button

                                                                            class="btn btn-default btn_name">{{ $user->first_name ?? '' }}</button>
                                                                    <br>
                                                                    <span
                                                                            style="font-size: 15px; color: #000; font-weight: 600; margin-top: 10px;">{{ $user->relationship->type ??'' }}</span>
                                                                    <br>
                                                                    @php
                                                                        // Replace $dateString with your actual date string
                                                                        $dateString = $user->user_information->date_of_birth ?? '';

                                                                        $age = \Carbon\Carbon::parse($dateString)->age;



                                                                    @endphp
                                                                    <span>Age: {{ $age ?? '' }}</span>
                                                                    <br>
                                                                    <span>{{ $user->user_information->country ?? '' }}</span>
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </a>

                                                <div class="addline3">
                                                    <img src="{{ asset('storage/assets/images') }}/add.png"
                                                         alt="" type="button" data-bs-toggle="modal"
                                                         data-bs-target="#exampleModal">
                                                </div>

                                            </div>
                                            <!-- parent user -->

                                            <ul class="active">

                                                @foreach ($family_users as $family_user)
                                                    <li>
                                                        @if ($family_user->type == 'deceased')
                                                            <a href="#"
                                                               onclick="GetLocation({{ $family_user->lat }}, {{ $family_user->long }}, '{{ $family_user->email }}', '{{ $family_user->first_name }}', '{{ $family_user->country }}')"
                                                               class="fam_user">
                                                                <div class="member-view-box-deceased">
                                                                    <div class="member-image-deceased">

                                                                        <div
                                                                                class="img d-flex justify-content-center align-items-center">

                                                                            <img src="{{ asset('storage/assets/images/profile.jpeg') }}"
                                                                                 class="card-img-top" alt="..." />

                                                                            <img src="{{ asset('storage/assets/images/deceased.png') }}" class="card-img-top deceased" alt="...">
                                                                        </div>
                                                                        <div class="member-details">
                                                                            <p>
                                                                                <button
                                                                                        class="btn btn-default btn_name_deceased">{{ $family_user->first_name ?? '' }}</button>
                                                                                <br>
                                                                                <span
                                                                                        style="font-size: 15px; color: #000; font-weight: 600; margin-top: 10px;">{{ $family_user->relationships->type }}</span>
                                                                                <br>
                                                                                <span>{{ $family_user->date_of_birth ?? '' }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href=""class="btn btn-prmary profileBtn" id="profileBtn">Visit
                                                                    Profile</a>
                                                            </a>
                                                            <!-- Add a button for adding a new child -->
                                                            <div class="addline2_deceased memberAdd"
                                                                 data-child-id="{{ $family_user->id }}">
                                                                <img src="{{ asset('storage/assets/images') }}/addin.png"
                                                                     alt="" type="button" data-bs-toggle="modal"
                                                                     data-bs-target="#childModal">
                                                            </div>


                                                        @else
                                                            <a href="#"
                                                               onclick="GetLocation({{ $family_user->lat }}, {{ $family_user->long }}, '{{ $family_user->email }}', '{{ $family_user->first_name }}', '{{ $family_user->country }}')"
                                                               class="fam_user">
                                                                <div class="member-view-box">
                                                                    <div class="member-image">

                                                                        <div
                                                                                class="img d-flex justify-content-center align-items-center">

                                                                            <img src="{{ asset('storage/assets/images/profile.jpeg') }}"
                                                                                 class="card-img-top" alt="..." />
                                                                        </div>
                                                                        <div class="member-details">
                                                                            <p>
                                                                                <button
                                                                                        class="btn btn-default btn_name">{{ $family_user->first_name ?? '' }}</button>
                                                                                <br>
                                                                                <span
                                                                                        style="font-size: 15px; color: #000; font-weight: 600; margin-top: 10px;">{{ $family_user->relationships->type }}</span>
                                                                                <br>
                                                                                @php
                                                                                    // Replace $dateString with your actual date string
                                                                                    $dateString = $family_user->date_of_birth ?? '';
                                                                                    $age = \Carbon\Carbon::parse($dateString)->age;
                                                                                @endphp
                                                                                <span>Age: {{ $age ?? '' }} </span>
                                                                                <br>
                                                                                <span>{{ $family_user->country ?? '' }}</span>
                                                                            </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- Add a button for adding a new child -->
                                                            <div class="addline2 memberAdd"
                                                                 data-child-id="{{ $family_user->id }}">
                                                                <img src="{{ asset('storage/assets/images') }}/add.png"
                                                                     alt="" type="button" data-bs-toggle="modal"
                                                                     data-bs-target="#childModal">
                                                            </div>
                                                        @endif

                                                        <!-- Check if the family user has children -->
                                                        @if ($family_user->children->count() > 0)
                                                            <ul>
                                                                <!-- Loop through the children of this family user -->
                                                                @foreach ($family_user->children as $child)
                                                                    <li>
                                                                        <!-- Display child information -->
                                                                        <a href="#"
                                                                           onclick="GetLocation({{ $child->lat }}, {{ $child->long }}, '{{ $child->email }}', '{{ $child->first_name }}', '{{ $child->country }}')"
                                                                           class="fam_user">
                                                                            <div class="member-view-box">
                                                                                <div class="member-image">
                                                                                    <div
                                                                                            class="img d-flex justify-content-center align-items-center">

                                                                                        <img src="{{ asset('storage/assets/images/profile.jpeg') }}"
                                                                                             class="card-img-top"
                                                                                             alt="...">
                                                                                    </div>

                                                                                    <div class="member-details">
                                                                                        <p>
                                                                                            <button
                                                                                                    class="btn btn-default btn_name">{{ $child->first_name ?? '' }}</button>
                                                                                            <br>
                                                                                            <span
                                                                                                    style="font-size: 15px; color: #000; font-weight: 600; margin-top: 10px;">{{ $child->familyrelation->type ?? 'No' }}</span>
                                                                                            <br>
                                                                                            @php
                                                                                                // Replace $dateString with your actual date string
                                                                                                $dateString = $child->date_of_birth ?? '';
                                                                                                $age = \Carbon\Carbon::parse($dateString)->age;
                                                                                            @endphp
                                                                                            <span>Age: {{ $age ?? '' }}
                                                                                            </span>
                                                                                            <span>Age: {{ $age ?? '' }}
                                                                                            </span>
                                                                                            <br>
                                                                                            <span>{{ $child->country ?? '' }}</span>
                                                                                        </p>

                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <!-- Add a button for adding a new child -->
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        {{-- <button id="load-more" class="btn"
                                            style="margin: auto;
                                        margin-top: 30px;
                                        margin-bottom: 20px;
                                        width: 164px;
                                        height: 29px;
                                        background: #99DDCC;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        border-radius: 2rem;
                                        color: white;"
                                            onclick="Loadcards()">Load More
                                        </button> --}}
                    </div>
                </div>


            </div>


        </div>


        <div class="col-sm-12 familyTreeMb" id="familyTreeMb">
            <!-- Main Person  -->
            <div class="per1 d-flex justify-content-start align-items-center">
                <div class="img">
                    <img src="{{ asset('storage/assets/images') }}/fam9.png" alt="">
                </div>
                <div class="text d-flex flex-column">
                    <p class="tag d-flex justify-content-center align-items-center">You</p>
                    <h2>Jakob Elvin</h2>
                    <div class="age d-flex justify-content-between align-items-center">
                        <p>Age: 58</p>
                        <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                    </div>
                </div>


                <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                </div>
            </div>
            <!-- main Person Tree  -->
            <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                <!-- INNER ACCORDIAN  -->
                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseOneInner" aria-expanded="true"
                         aria-controls="collapseOneInner">
                        <p>Grand Parents</p>
                        <img src="" alt="">
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseOneInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="{{ asset('storage/assets/images') }}/Fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseOneInnerI" aria-expanded="true"
                                 aria-controls="collapseOneInnerI"></div>
                        </div>
                        <div id="collapseOneInnerI" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseTwoInner" aria-expanded="true"
                         aria-controls="collapseTwoInner">
                        <p>Parents</p>
                        <img src="" alt="">
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseTwoInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="{{ asset('storage/assets/images') }}/fam2.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseTwoInnerI" aria-expanded="true"
                                 aria-controls="collapseTwoInnerI"></div>
                        </div>
                        <div id="collapseTwoInnerI" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseThreeInner" aria-expanded="true"
                         aria-controls="collapseThreeInner">
                        <p>Spouse</p>
                        <img src="" alt="">
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseThreeInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="{{ asset('storage/assets/images') }}/Fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseThreeInnerI" aria-expanded="true"
                                 aria-controls="collapseThreeInnerI"></div>
                        </div>
                        <div id="collapseThreeInnerI" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseFourInner" aria-expanded="true"
                         aria-controls="collapseFourInner">
                        <p>Children</p>
                        <img src="" alt="">
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseFourInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="{{ asset('storage/assets/images') }}/Fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseFourInnerI" aria-expanded="true"
                                 aria-controls="collapseFourInnerI"></div>
                        </div>
                        <div id="collapseFourInnerI" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseFiveInner" aria-expanded="true"
                         aria-controls="collapseFiveInner">
                        <p>Siblings</p>
                        <img src="" alt="">
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseFiveInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="{{ asset('storage/assets/images') }}/Fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseFiveInnerI" aria-expanded="true"
                                 aria-controls="collapseFiveInnerI"></div>
                        </div>
                        <div id="collapseFiveInnerI" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="innerbtngreen my-3 mb-0 d-flex justify-content-between align-items-center collapsed"
                 type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <p>Add New Member</p>
                <img src="{{ asset('storage/assets/images') }}/addin.png" alt="">
            </div>
            <a href="./mobileMapLocation.html"
               class="innerbtngreen d-flex justify-content-between align-items-center collapsed"
               style="text-decoration: none; color: #222222;">
                <p>Member Map Location</p>
            </a>
        </div>

    </div>


    <!-- MODAL Parent  -->
    <div class="modal fade SendRequestModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="edit  d-flex justify-content-end dropdown">

                    <form action="{{ route('family.store') }}" method="POST" enctype="multipart/form-data"
                          class="dropdown-menu p-4 editDropdown d-block">
                        @csrf

                        <i class="fa-solid fa-xmark fa-2x position-absolute" data-bs-dismiss="modal"
                           style="top: 2%; right: 4%;"></i>
                        <p>Add Family Member<span>* Indicates required</span></p>
                        <h2>Basic Info</h2>
                        <div class="row">

                            <div class="mb-3 col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                                <input type="text" class="form-control" name="first_name"
                                       id="exampleDropdownFormEmail2" placeholder="Jenifer">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                                <input type="text" class="form-control" name="last_name"
                                       id="exampleDropdownFormEmail2" placeholder="Emile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="dropdown w-100 col-lg-6 mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Relationship*</label>

                                <select name="relationship_id" class="form-control">
                                    <option value="" selected disabled>Choose relation</option>
                                    @foreach ($relationships as $relationship)
                                        <option value="{{ $relationship->id }}">{{ $relationship->type }}</option>
                                    @endforeach
                                </select>

                                {{-- <button style="height: 46px;" class="form-control rlptext text-start dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sister in Law
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Sister in Law','rlptext')">Sister in Law</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Brother in law','rlptext')">Brother in law</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Mother in Law','rlptext')">Mother in Law</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Father in Law','rlptext')">Father in Law</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Cousin','rlptext')">Cousin</a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <div class=" row">

                            <div class="mb-3  col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth* </label>
                                <div class="dropdown countryDropdown">
                                    <img src="{{ asset('storage/assets/images') }}/caltrans.png" alt=""
                                         class="borcer-0" style="border: 0 !important;">
                                    <input type="date" name="date_of_birth" class="form-control" id="date_sh"
                                           onfocus="this.showPicker()" onClick="this.showPicker()" />

                                    <div class="dropdown-menu">
                                        <div id="c">
                                            <div id="editdisp">

                                                <div id="editprev" class="nav"><img
                                                            src="{{ asset('storage/assets/images') }}/clprev.png"
                                                            alt=""></div>
                                                <div id="editmonth">Hello world</div>
                                                <div id="editnext" class="nav"><img
                                                            src="{{ asset('storage/assets/images') }}/Clnext.png"
                                                            alt=""></div>
                                            </div>
                                            <div id="editcal"></div>

                                            <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                                                <a href="" class="btn w-50 private">Cancel</a>
                                                <a href="" class="btn w-50 public">Search</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class=" col-lg-6 justify-content-start align-items-center d-flex">

                                <div class="d-flex justify-content-center align-items-center">
                                    <input checked type="checkbox" name="type" id="exampleDropdownFormEmail2"
                                           class="radiobtn" onchange="AorD(event, 'alive')">
                                    <label for="exampleDropdownFormEmail2" class="form-label"
                                           style="margin-bottom: 0; margin-left: 12px; margin-right: 20px;">Alive</label>
                                </div>
                                <div class=" d-flex justify-content-center align-items-center">
                                    <input type="checkbox" onchange="AorD(event, 'deceased')"
                                           id="exampleDropdownFormEmail2" class="radiobtn">
                                    <label for="exampleDropdownFormEmail2" class="form-label"
                                           style="margin-bottom: 0; margin-left: 12px;">Deceased</label>
                                </div>
                            </div>

                        </div>

                        <div class="row emailCountry">
                            <div class="mb-3  col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2"
                                       placeholder="example@gmail.com">
                            </div>

                            <div class="form-group  first col-lg-6">
                                <label for="username mb-2" style="display: block;">Country</label>
                                <input id="country_selector" type="text" name="country" class="form-group col-lg-12"
                                       style="height: 46px;">
                                <div class="form-item " style="display:none;">
                                    <input class="form-group border-0" type="text" id="country_selector_code"
                                           data-countrycodeinput="1" readonly="readonly"
                                           placeholder="Selected country code will appear here" />
                                    <label for="country_selector_code">...and the selected country code will be
                                        updated
                                        here</label>
                                </div>
                                <div id="coordinates">
                                    <input type="hidden" name="lat" id="latp">
                                    <input type="hidden" name="long" id="longp">
                                </div>
                            </div>

                        </div>
                        <div class="mapAddress">
                            <div class="formGroup">
                                <label for="map_address_field" class="form-label">Map address</label>
                                <input type="text" class="form-control" id="map_address_field" name="map_address">
                            </div>
                            <div class="formGroup">
                                <label for="map_desc_sh" class="form-label">Description</label>
                                <textarea id="map_desc_sh" class="form-control" name="desc"></textarea>
                            </div>
                        </div>


                        <div class="d-flex btns my-2">

                            <button type="submit" class="btn btn-primary submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL Parent  -->


    <!-- MODAL Child  -->
    <div class="modal fade SendRequestModal" id="childModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="edit  d-flex justify-content-end dropdown">

                    <form action="{{ route('family.child.store') }}" method="POST" enctype="multipart/form-data"
                          class="dropdown-menu p-4 editDropdown d-block">
                        @csrf

                        <input type="hidden" name="parent_id" id="parent_id">

                        <i class="fa-solid fa-xmark fa-2x position-absolute" data-bs-dismiss="modal"
                           style="top: 2%; right: 4%;"></i>
                        <p>Add Family Member Child<span>* Indicates required</span></p>
                        <h2>Basic Info</h2>
                        <div class="row">

                            <div class="mb-3 col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                                <input type="text" class="form-control" name="first_name"
                                       id="exampleDropdownFormEmail2" placeholder="Jenifer">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                                <input type="text" class="form-control" name="last_name"
                                       id="exampleDropdownFormEmail2" placeholder="Emile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="dropdown w-100 col-lg-6 mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Relationship*</label>

                                <select name="relationship_id" class="form-control">
                                    <option value="" selected disabled>Choose relation</option>
                                    @foreach ($relationships as $relationship)
                                        <option value="{{ $relationship->id }}">{{ $relationship->type }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- <div class="row">

                            <div class="dropdown col-lg-6 mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label ">Relationship with
                                    other*</label>

                                <button style="height: 46px;" class="form-control rlpwithother text-start dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Brother Of
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Brother Of','rlpwithother')">Brother Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Sister Of','rlpwithother')">Sister Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Husband Of','rlpwithother')">Husband Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Wife Of','rlpwithother')">Wife Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Son Of','rlpwithother')">Son Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Grand Son Of','rlpwithother')">Grand Son Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Great Grand Son Of','rlpwithother')">Great Grand Son Of</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Daughter Of','rlpwithother')">Daughter Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Grand Daughter Of','rlpwithother')">Grand Daughter Of</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Great Grand Daughter Of','rlpwithother')">Great Grand
                                            Daughter Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Father Of','rlpwithother')">Father Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Grand Father Of','rlpwithother')">Grand Father Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Great Grand Father Of','rlpwithother')">Great Grand Father
                                            Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Mother Of','rlpwithother')">Mother Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Grand Mother Of','rlpwithother')">Grand Mother Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Great Grand Mother Of','rlpwithother')">Great Grand Mother
                                            Of</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="rlpDrop('Myself','rlpwithother')">Myself</a></li>

                                </ul>
                            </div>

                            <div class="dropdown  col-lg-6 mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    placeholder="Other Name">
                            </div>
                        </div> --}}

                        <div class=" row">

                            <div class="mb-3  col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth* </label>
                                <div class="dropdown countryDropdown">
                                    <img src="{{ asset('storage/assets/images') }}/caltrans.png" alt=""
                                         class="borcer-0" style="border: 0 !important;">
                                    <input type="date" name="date_of_birth" class="form-control" id="date_sh"
                                           onfocus="this.showPicker()" onClick="this.showPicker()" />

                                    <div class="dropdown-menu">
                                        <div id="c">
                                            <div id="editdisp">

                                                <div id="editprev" class="nav"><img
                                                            src="{{ asset('storage/assets/images') }}/clprev.png"
                                                            alt=""></div>
                                                <div id="editmonth">Hello world</div>
                                                <div id="editnext" class="nav"><img
                                                            src="{{ asset('storage/assets/images') }}/Clnext.png"
                                                            alt=""></div>
                                            </div>
                                            <div id="editcal"></div>

                                            <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                                                <a href="" class="btn w-50 private">Cancel</a>
                                                <a href="" class="btn w-50 public">Search</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class=" col-lg-6 justify-content-start align-items-center d-flex">

                                <div class="d-flex justify-content-center align-items-center">
                                    <input checked type="checkbox" name="type" id="exampleDropdownFormEmail2"
                                           class="radiobtn" onchange="AorD1(event, 'alive')">
                                    <label for="exampleDropdownFormEmail2" class="form-label"
                                           style="margin-bottom: 0; margin-left: 12px; margin-right: 20px;">Alive</label>
                                </div>
                                <div class=" d-flex justify-content-center align-items-center">
                                    <input type="checkbox" onchange="AorD1(event, 'deceased')"
                                           id="exampleDropdownFormEmail2" class="radiobtn">
                                    <label for="exampleDropdownFormEmail2" class="form-label"
                                           style="margin-bottom: 0; margin-left: 12px;">Deceased</label>
                                </div>
                            </div>

                        </div>

                        <div class="row emailCountryChild">
                            <div class="mb-3  col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2"
                                       placeholder="example@gmail.com">
                            </div>

                            <div class="form-group  first col-lg-6">
                                <label for="username mb-2" style="display: block;">Country</label>
                                <input id="country_selector_child" type="text" name="country"
                                       class="form-group col-lg-12" style=" height: 46px;">
                                <div class="form-item " style="display:none;">
                                    <input class="form-group border-0" type="text" id="country_selector_code"
                                           data-countrycodeinput="1" readonly="readonly"
                                           placeholder="Selected country code will appear here" />
                                    <label for="country_selector_code">...and the selected country code will be
                                        updated
                                        here</label>
                                </div>

                                <div id="coordinates">
                                    <input type="hidden" name="lat" id="latitude">
                                    <input type="hidden" name="long" id="longitude">
                                </div>
                            </div>

                        </div>
                        <div class="mapAddress">
                            <div class="formGroup">
                                <label for="map_address_field" class="form-label">Map address</label>
                                <input type="text" class="form-control" id="map_address_field" name="map_address">
                            </div>
                            <div class="formGroup">
                                <label for="map_desc_sh" class="form-label">Description</label>
                                <textarea id="map_desc_sh" class="form-control" name="desc"></textarea>
                            </div>
                        </div>


                        <div class="d-flex btns my-2">

                            <button type="submit" class="btn btn-primary submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL Child -->

    @include('family-tree-sections.family-tree-js')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
