@extends('main')
@section('title', $title)
@section('header')

    @include('layouts.header')
    <style>
        .card2-content .card2-top .images img{
            width: auto;
            height: auto;
            display: none;
            margin: auto;
            cursor: pointer;
            margin-top: 3%;
            min-width: 300px !important;
            min-height: 400px !important;
            max-width: 500px !important;
            max-height: 300px !important;
            border-radius: 5%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0" style="background-color: rgba(18, 32, 59, 0.09); padding: 30px 0px !important; min-height: 100vh;">
        <div class="container">
            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Error Message -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{--            @include('home-sections.tags')--}}
            <div class="row">
                <div class="col-sm-3 " id="SearchPost">
                    <div class="green-outer me-5">
                        <div class="green-box" @if(isset($data['user_information'])) style="background-image: url({{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) ??'' }});" @else style="background-image: url({{ asset('storage/assets/images/profile.jpeg')}});" @endif>
                            <div class="edit d-flex justify-content-end dropdown">
{{--                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"--}}
{{--                                   data-bs-auto-close="outside"><span class="material-symbols-outlined "> edit </span></a>--}}
                                <form class="dropdown-menu p-4 editDropdown" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <p>Edit Info <span>* Indicates required</span></p>
                                    <h2>Basic Info</h2>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="first_name" class="form-label">First Name*</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jenifer" disabled value="{{ isset($data['user']->first_name) ? $data['user']->first_name : '' }}" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="last_name" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Emile" disabled value="{{ isset($data['user']->last_name) ? $data['user']->last_name : '' }}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="dropdown col-lg-6 mb-3">
                                            <label for="gender" class="form-label">Gender*</label>
                                            <select class="form-control" id="gender" name="gender" @if (isset($data['user_information']->gender)) disabled @endif>
                                                <option value="Male" @if (isset($data['user_information']->gender) && $data['user_information']->gender == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if (isset($data['user_information']->gender) && $data['user_information']->gender == 'Female') selected @endif>Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 w-50 col-lg-6">
                                            <label for="date_of_birth" class="form-label">Date of Birth*</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Select date of birth" value="{{ isset($data['user_information']->date_of_birth) ? $data['user_information']->date_of_birth : '' }}" @if (isset($data['user_information']->date_of_birth)) disabled @endif>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 w-50 col-lg-6">
                                            <label for="email" class="form-label">Email* </label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="{{ isset($data['user']->email) ? $data['user']->email : '' }}" >
                                        </div>
                                        <div class="mb-3 w-50 col-lg-6">
                                            <label for="phone" class="form-label">Phone Number* </label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="+1xxxxxxxxxxxxxxx" value="{{ isset($data['user_information']->phone_number) ? $data['user_information']->phone_number : '' }}">
                                        </div>
                                    </div>
                                    <div class="w-100 row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="city" class="form-label">City* </label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Madrid" value="{{ isset($data['user_information']->city) ? $data['user_information']->city : '' }}" >
                                        </div>
                                        <div class="form-group first col-lg-6">
                                            <label for="country" class="form-label">Country</label>
                                            <input id="country_selector" type="text" class="form-group col-lg-12" style=" height: 46px;" value="{{ isset($data['user_information']->country) ? $data['user_information']->country : '' }}">
                                            <div class="form-item" style="display:none;">
                                                <input class="form-group border-0" type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
                                                <label for="country_selector_code">...and the selected country code will be updated here</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address* </label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="1610 County Road 75, Alturas, CA 96101" value="{{ isset($data['user_information']->address) ? $data['user_information']->address : '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="profile_picture" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/jpeg, image/jpg, image/png">
                                        @error('profile_picture')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="d-flex btns">
                                        <a href="{{ route('profile.edit') }}" class="btn ditPfBtn">Edit Profile</a>
                                        <button type="submit" class="btn btn-primary submit">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <img src="images/Rectangle 387.png"/>
                            <h3>Jenifer Emile</h3> -->
                        </div>
                        <div class="greenemail">
                            <p>
                                Name: <span class="float-end">{{ isset($data['user']->first_name) && isset($data['user']->last_name) ? $data['user']->first_name . ' ' . $data['user']->last_name : '' }}</span>
                            </p>
                            <p>
                                Email: <span class="float-end">{{ isset($data['user']->email) ? $data['user']->email : '' }}</span>
                            </p>
                            <p>Country: <span class="float-end">{{ isset($data['user_information']->country) ? $data['user_information']->country : '' }}

                                    @if(isset($data['user_information']->country))
                                            <?php
                                            $countryflag = \App\Models\Country::query()->where('code', $data['user_information']->country)->first();
                                            ?>
                                        @if($countryflag)
                                            <img class="card-count-img"  src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}" width="40">
                                        @else
                                            <!-- Handle the case where no country flag is found -->

                                        @endif
                                    @else
                                        <!-- Handle the case where user_information->country is not set -->

                                    @endif
                            <p>Age: <span class="float-end">{{ isset($data['age']) ? $data['age'] : '' }}</span></p>
                        </div>

                    </div>

{{--                    <form method="POST" action="{{ route('deceasedProfileGetPostsByDate',$data['user']->id) }}" id="searchPostForm">--}}
{{--                        @csrf--}}
{{--                        <div class="search-post me-5">--}}
{{--                            <input type="hidden" name="time_range" value="">--}}
{{--                            <input type="hidden" name="start_date" value="">--}}
{{--                            <input type="hidden" name="end_date" value="">--}}
{{--                            <h4>Search Post</h4>--}}
{{--                            <p onclick="setSearchTimeRange('last7days')">Last 7 days</p>--}}
{{--                            <p onclick="setSearchTimeRange('last30days')">Last 30 days</p>--}}
{{--                            <p onclick="setSearchTimeRange('last3months')">Last 3 months</p>--}}
{{--                            <p onclick="setSearchTimeRange('last12months')">Last 12 months</p>--}}
{{--                            <p onclick="openCustomCalender()">Custom</p>--}}

{{--                            <div id="calendar" class="custom-calendar search-post" style="padding-bottom: 29px; display: none;">--}}
{{--                                <div class="d-flex button-box deceased-Person-Top-Btn w-100">--}}
{{--                                    <a href="javascript:void(0);" class="btn w-50 public me-2">Public</a>--}}
{{--                                    <a href="javascript:void(0);" class="btn w-50 private">Private</a>--}}
{{--                                </div>--}}
{{--                                <div id="c">--}}
{{--                                    <div class="btns w-100 pb-0">--}}
{{--                                        <input type="date" id="start_date" style="width: 45%;">--}}
{{--                                        <i style="margin: 0 10px; font-size: 22px;">-</i>--}}
{{--                                        <input type="date" id="end_date" style="width: 45%;">--}}
{{--                                    </div>--}}
{{--                                    <!-- Your custom calendar logic goes here -->--}}
{{--                                    <!-- ... -->--}}

{{--                                    <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">--}}
{{--                                        <a href="javascript:void(0);" class="btn w-50 private" onclick="cancelCustomDate()">Cancel</a>--}}
{{--                                        <a href="javascript:void(0);" class="btn w-50 public" onclick="searchWithCustomDate()">Search</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <script>--}}
{{--                        function openCustomCalender() {--}}
{{--                            document.getElementById("calendar").style.display = "block";--}}
{{--                        }--}}

{{--                        function searchWithCustomDate() {--}}
{{--                            const startDate = document.getElementById("start_date").value;--}}
{{--                            const endDate = document.getElementById("end_date").value;--}}
{{--                            document.querySelector('input[name="time_range"]').value = 'custom';--}}
{{--                            document.querySelector('input[name="start_date"]').value = startDate;--}}
{{--                            document.querySelector('input[name="end_date"]').value = endDate;--}}
{{--                            // Submit the form to update the posts based on the selected custom dates--}}
{{--                            document.querySelector('#searchPostForm').submit();--}}
{{--                        }--}}

{{--                        function setSearchTimeRange(timeRange) {--}}
{{--                            document.querySelector('input[name="time_range"]').value = timeRange;--}}
{{--                            document.querySelector('input[name="start_date"]').value = '';--}}
{{--                            document.querySelector('input[name="end_date"]').value = '';--}}
{{--                            // Submit the form to update the posts based on the selected time range--}}
{{--                            document.querySelector('#searchPostForm').submit();--}}
{{--                        }--}}

{{--                        function cancelCustomDate() {--}}
{{--                            const calendar = document.getElementById("calendar");--}}
{{--                            calendar.style.display = "none";--}}
{{--                            document.querySelector('input[name="start_date"]').value = '';--}}
{{--                            document.querySelector('input[name="end_date"]').value = '';--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                    <div class="tag mt-4 me-3">--}}
{{--                        <h4>Search Tags</h4>--}}
{{--                        <div>--}}
{{--                            <input type="text" class="form-control mt-4 me-2" id="tagSearchx" placeholder="Search tags">--}}
{{--                        </div>--}}
{{--                        <div class="tagsrow">--}}
{{--                            @foreach ($data['tags'] as $tag)--}}
{{--                                <div class="tagx-item">--}}
{{--                                    <a style="text-decoration: none;"--}}
{{--                                       href="{{ url('deceasedProfile/'. $data['user']->id.'/tag/'. $tag->slug) }}"><button>{{ $tag->name }}</button></a>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>



                {{--                @include('home-sections.left')--}}
                <div class="col-sm-9 " style="margin-top: -1.8%">
                    {{-- @include('home-sections.writePost') --}}
                    {{-- @include('home-sections.posts') --}}
                    {{-- POSTS START --}}



                    <div class="Posts">


                                @if ($post->post_type == 'text')
                                    {{-- POST TYPE - TEXT - BEGINNING --}}

                                    <section id="{{ $post->id  }}">
                                        <div class="card-layout" >
                                            @php $textpostrand = rand(1,1000000) @endphp
                                            <div class="card-top">
                                                <div class="card-top-text">
                                                    <div class="card-top-left">
                                                        @if (isset($data['user_information']->profile_picture))
                                                            <img class="avatar"
                                                                 src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                                        @else
                                                            <img class="avatar" src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                                        @endif

                                                    </div>
                                                    <div class="card-top-right">
                                                        <div class=" edit dropdown">
                                                            <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{--                                              <div class="circle"></div>--}}
                                                                {{--                                              <div class="circle"></div>--}}
                                                                {{--                                              <div class="circle"></div>--}}
                                                            </div>
                                                            <ul class="dropdown-menu button-box">
                                                                {{--                                               <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                                                <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                                            </ul>
                                                        </div>
                                                        <script>

                                                            const edittextpostDropdown = (id)=>{
                                                                console.log(id)
                                                                editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                                editPostDropdown.classList.toggle("activedropdown")
                                                            }
                                                        </script>
                                                        <h6 class="avatar-text">{{ $data['user']->first_name }}
                                                            {{ $data['user']->last_name }}</h6>
                                                        <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg" alt="">
                                                            {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card-top-desc">
                                                    <div class="card-top-desc-text">
                                                        <h3 class="content-text">@php

                                                                if (isset($post->PostText->post_content)) {
                                                                    echo nl2br(e($post->PostText->post_content));
                                                                }

                                                            @endphp</h3>
                                                    </div>
                                                    @if ($post->tags->count() > 0)
                                                        <div class="card-top-desc-tags">
                                                            @foreach ($post->tags as $tag)
                                                                <span><a href="{{ url('deceasedProfile/'. $data['user']->id.'/tag/'. $tag->slug) }}">#{{ $tag->name }}</a></span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-middle">

                                            </div>
                                            @if ($post->post_scope == 'private')
                                                <div class="card-bottom">
                                                    <div class="card-bottom-left">
                                                        <p class="whoSeePrivateBtn">Visible to: </p>
                                                        <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                                     alt="">Private</button>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </section>

                                    {{-- POST TYPE - TEXT - END --}}


                                @elseif($post->post_type == 'video' || $post->post_type == 'text/video')
                                    {{-- POST TYPE - VIDEO - BEGINNING --}}

                                    <section id="{{ $post->id  }}">
                                        <div class="card-layout">
                                            @php $videoRand = rand(1,1000000) @endphp
                                            <div class="card-top">
                                                <div class="card-top-text">
                                                    <div class="card-top-left">
                                                        @if (isset($data['user_information']->profile_picture))
                                                            <img class="avatar"
                                                                 src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) ??'' }}" />
                                                        @else
                                                            <img class="avatar" src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                                        @endif

                                                    </div>
                                                    <div class="card-top-right">
                                                        <div class=" edit dropdown">
                                                            <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{--                                              <div class="circle"></div>--}}
                                                                {{--                                              <div class="circle"></div>--}}
                                                                {{--                                              <div class="circle"></div>--}}
                                                            </div>
                                                            <ul class="dropdown-menu button-box">
                                                                {{--                                               <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                                                <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                                            </ul>
                                                        </div>
                                                        <script>

                                                            const editvideopostDropdown = (id)=>{
                                                                console.log(id)
                                                                editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                                editPostDropdown.classList.toggle("activedropdown")
                                                            }
                                                        </script>
                                                        <h6 class="avatar-text">{{ $data['user']->first_name }}
                                                            {{ $data['user']->last_name }}</h6>
                                                        <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg" alt="" width="10">
                                                            {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card-top-desc">
                                                    <div class="card-top-desc-text">
                                                        <h3 class="content-text">@php

                                                                if (isset($post->PostText->post_content)) {
                                                                    echo nl2br(e($post->PostText->post_content));
                                                                }

                                                            @endphp</h3>
                                                    </div>
                                                    @if ($post->tags->count() > 0)
                                                        <div class="card-top-desc-tags">
                                                            @foreach ($post->tags as $tag)
                                                                <span><a
                                                                            href="{{ url('deceasedProfile/'. $data['user']->id.'/tag/'. $tag->slug) }}">#{{ $tag->name }}</a></span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-middle">
                                                <div class="card4-content">
                                                    @if (isset($post->PostVideo->video_path))
                                                        @php

                                                            $path = asset($post->PostVideo->video_path);
                                                            $extension = pathinfo($path, PATHINFO_EXTENSION);

                                                        @endphp
                                                        <video id="myVideo" width="640px" height="360px" controls>
                                                            <source src="{{ asset($post->PostVideo->video_path) }}"
                                                                    type="video/@php echo "$extension"; @endphp">
                                                        </video>


                                                        {{-- <button id="playButton"><img src="{{ asset('storage/assets/posts') }}/img/play.svg"
                                                                alt=""></button>
                                                        <button id="pauseButton"><img
                                                                src="{{ asset('storage/assets/posts') }}/img/stop.svg"
                                                                alt=""></button> --}}
                                                    @endif
                                                </div>
                                            </div>
                                            @if ($post->post_scope == 'private')
                                                <div class="card-bottom">
                                                    <div class="card-bottom-left">
                                                        <p class="whoSeePrivateBtn">Visible to: </p>
                                                        <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                                     alt="">Private</button>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </section>

                                    {{-- POST TYPE - VIDEO - END --}}

                                @elseif($post->post_type == 'documents' || $post->post_type == 'text/documents')
                                    @php

                                        if ($post->postDocument) {
                                            $documentPaths = explode(',', $post->postDocument->document_path);
                                        }

                                    @endphp

                                    @if ($post->PostDocument)
                                        @php

                                            $randomNumber = rand(1, 1000);

                                        @endphp
                                        {{-- POST TYPE - DOCUMENT - BEGINNING --}}

                                        <section id="{{ $post->id  }}">
                                            <div class="card-layout">
                                                @php $docrand = rand(1,1000000) @endphp
                                                <div class="card-top">
                                                    <div class="card-top-text">
                                                        <div class="card-top-left">
                                                            @if (isset($data['user_information']->profile_picture))
                                                                <img class="avatar"
                                                                     src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                                            @else
                                                                <img class="avatar"
                                                                     src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                                            @endif

                                                        </div>
                                                        <div class="card-top-right">
                                                            <div class=" edit dropdown">
                                                                <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                </div>
                                                                <ul class="dropdown-menu button-box">
                                                                    {{--                                               <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                                                    <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                                                </ul>
                                                            </div>
                                                            <script>

                                                                const editdocpostDropdown = (id)=>{
                                                                    console.log(id)
                                                                    editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                                    editPostDropdown.classList.toggle("activedropdown")
                                                                }
                                                            </script>
                                                            <h6 class="avatar-text">{{ $data['user']->first_name }}
                                                                {{ $data['user']->last_name }}</h6>
                                                            <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                                    alt="">
                                                                {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-top-desc">
                                                        <div class="card-top-desc-text">
                                                            <h3 class="content-text">@php

                                                                    if (isset($post->PostText->post_content)) {
                                                                        echo nl2br(e($post->PostText->post_content));
                                                                    }

                                                                @endphp</h3>
                                                        </div>
                                                        @if ($post->tags->count() > 0)
                                                            <div class="card-top-desc-tags">
                                                                @foreach ($post->tags as $tag)
                                                                    <span><a
                                                                                href="{{ url('deceasedProfile/'. $data['user']->id.'/tag/'. $tag->slug) }}">#{{ $tag->name }}</a></span>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-middle">
                                                    <div class="card5-content">

                                                        @foreach ($documentPaths as $index => $documentPath)
                                                            <div class="file">
                                                                @php
                                                                    $randomNumber = rand(1, 1000);
                                                                    $id = $documentPath . $randomNumber . 'document';
                                                                @endphp
                                                                <div class="file-left">
                                                                    <img src="@if (pathinfo($documentPath, PATHINFO_EXTENSION) == 'pdf') {{ asset('storage/assets/images/pdf.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'doc'){{ asset('storage/assets/images/doc.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'docx'){{ asset('storage/assets/images/docx.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xls'){{ asset('storage/assets/images/xls.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xlsx'){{ asset('storage/assets/images/xlsx.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'ppt'){{ asset('storage/assets/images/ppt.png') }}
                                                      @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'pptx'){{ asset('storage/assets/images/pptx.png') }} @endif"
                                                                         width="30px">

                                                                    <h2>
                                                                        @if (strlen($documentPath) > 25)
                                                                            {{ substr($documentPath, 0, 25) }}&hellip;{{ substr($documentPath, -4) }}
                                                                        @else
                                                                            {{ $documentPath }}
                                                                        @endif
                                                                    </h2>
                                                                </div>
                                                                <div class="file-right">
                                                                    <a href="{{ asset('public/user_media/' . $post->user_id . '/documents/' . $documentPath) }}"
                                                                       target="_blank" style="text-decoration: none;">
                                                                        <img src="{{ asset('storage/assets/posts') }}/img/download.svg"
                                                                             alt="">
                                                                        <button>Download</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                @if ($post->post_scope == 'private')
                                                    <div class="card-bottom">
                                                        <div class="card-bottom-left">
                                                            <p class="whoSeePrivateBtn">Visible to: </p>
                                                            <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                                         alt="">Private</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </section>

                                    @endif



                                    {{-- AUDIO START --}}
                                @elseif($post->post_type == 'audio' || $post->post_type == 'text/audio')
                                    @php

                                        if ($post->postAudio) {
                                            $audioPaths = explode(',', $post->postAudio->audio_path);
                                        }

                                    @endphp

                                    @if ($post->PostAudio)
                                        @php

                                            $randomNumber = rand(1, 1000);

                                        @endphp

                                        <section id="{{ $post->id  }}">
                                            <div class="card-layout">
                                                <div class="card-top">
                                                    <div class="card-top-text">
                                                        <div class="card-top-left">
                                                            @if (isset($data['user_information']->profile_picture))
                                                                <img class="avatar"
                                                                     src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                                            @else
                                                                <img class="avatar"
                                                                     src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                                            @endif

                                                        </div>
                                                        <style>
                                                            .card-top-right{
                                                                position: relative;
                                                            }
                                                            .edit{
                                                                display:flex;
                                                                flex-direction : column;
                                                                position: absolute;
                                                                right: 0;
                                                                top: -7px;
                                                            }
                                                            .edit .editButton{
                                                                display : flex;

                                                            }
                                                            .edit .editButton .circle{
                                                                width : 5px;
                                                                height : 5px;
                                                                background: grey;
                                                                margin : 0 2px;
                                                                border-radius:100%;
                                                            }
                                                            .edit  .editPostDropdown{
                                                                display: flex;
                                                                width: auto !important;
                                                                flex-direction: column;
                                                                padding: 19px;
                                                                background: white;
                                                                border-radius: 5px;
                                                                box-shadow: 5px 5px 5px #c0c0c033;
                                                                position: absolute;
                                                                display : none;
                                                            }
                                                            .edit  .editPostDropdown button{
                                                                margin:5px 0;
                                                            }
                                                        </style>
                                                        <div class="card-top-right">



                                                            <div class=" edit dropdown">
                                                                <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                </div>
                                                                <ul class="dropdown-menu button-box">
                                                                    {{--                                               <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                                                    <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                                                </ul>
                                                            </div>

                                                            <h6 class="avatar-text">{{ $data['user']->first_name }}
                                                                {{ $data['user']->last_name }}</h6>
                                                            <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                                    alt="">
                                                                {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-top-desc">
                                                        <div class="card-top-desc-text">
                                                            <h3 class="content-text">@php

                                                                    if (isset($post->PostText->post_content)) {
                                                                        echo nl2br(e($post->PostText->post_content));
                                                                    }

                                                                @endphp</h3>
                                                        </div>
                                                        @if ($post->tags->count() > 0)
                                                            <div class="card-top-desc-tags">
                                                                @foreach ($post->tags as $tag)
                                                                    <span><a
                                                                                href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-middle">
                                                    <div class="card3-content">
                                                        <div class="music">
                                                            <!-- <audio controls preload="metadata">
                                                                <source
                                                                    src=""
                                                                    type="audio/ogg">
                                                            </audio> -->
                                                            @php $randaudio = rand(1,1000000) @endphp
                                                            <div class="track" id="track<?=$randaudio?>">
                                                                <img src="{{ asset('storage/assets/images/play.svg') }}" id="playBtn<?=$randaudio?>" alt="">
                                                                <div class="waveform" id="waveform<?=$randaudio?>"></div>
                                                                <!-- <div class=".wavesurfer-wrapper"></div>
                                                                <div id="waveform"></div> -->
                                                                <h2 id="currentTimeHeading<?=$randaudio?>">0:00</h2>

                                                                <script src="{{ asset('storage/assets/posts/pt-wavesurfer.js') }}"></script>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <script>
                                                const playBtn<?=$randaudio?> = document.getElementById("playBtn<?=$randaudio?>");
                                                const track<?=$randaudio?> = document.getElementById("track<?=$randaudio?>");
                                                const audioval<?=$randaudio?> = document.getElementById("currentTimeHeading<?=$randaudio?>");

                                                var wavesurfer<?=$randaudio?> = WaveSurfer.create({
                                                    container: '#waveform<?=$randaudio?>',
                                                    waveColor: '#FFFFFF80',
                                                    progressColor: '#21BA90',
                                                    barWidth: "4",
                                                    height: "60",
                                                    barRadius: "10",
                                                    responsive: true,
                                                    barGap: "6",
                                                    // url: "./audio/myway.mp3"
                                                });

                                                wavesurfer<?=$randaudio?>.load("{{ asset('user_media/' . $post->user_id . '/audio/' . $audioPaths[0]) }}");

                                                // playBtn.src = "{{ asset('storage/assets/images/play.svg') }}";
                                                audioval<?=$randaudio?>.style.color = "var(--gray-scale-5, #EEE)";

                                                function updateWaveformHeight() {
                                                    var waveformCanvas = document.querySelectorAll('#waveform<?=$randaudio?> .wavesurfer-wave canvas');
                                                    var newHeight = window.innerWidth > 500 ? "3px" : "1px";

                                                    for (var i = 0; i < waveformCanvas.length; i++) {
                                                        waveformCanvas[i].style.height = newHeight;
                                                    }
                                                }

                                                wavesurfer<?=$randaudio?>.on('ready', function () {
                                                    displayTotalDuration();

                                                    wavesurfer<?=$randaudio?>.on('audioprocess', function () {
                                                        updateCurrentTimeDisplay();
                                                    });

                                                    playBtn<?=$randaudio?>.onclick = function () {
                                                        if (wavesurfer<?=$randaudio?>.isPlaying()) {
                                                            wavesurfer<?=$randaudio?>.pause();
                                                            track<?=$randaudio?>.style.background = "#21BA90"; // Set the desired background when playing
                                                            playBtn<?=$randaudio?>.src = "{{ asset('storage/assets/images/play.svg') }}";
                                                            wavesurfer<?=$randaudio?>.setOptions({
                                                                waveColor: '#FFFFFF80',
                                                                progressColor: '#21BA90',
                                                            });

                                                            audioval<?=$randaudio?>.style.color = "var(--gray-scale-5, #EEE)";
                                                        } else {
                                                            wavesurfer<?=$randaudio?>.play();
                                                            track<?=$randaudio?>.style.background = "#FFFFFF80"; // Set the background to none when paused
                                                            wavePlay = true;
                                                            playBtn<?=$randaudio?>.src = "{{ asset('storage/assets/images/stop.svg') }}";
                                                            wavesurfer<?=$randaudio?>.setOptions({
                                                                waveColor: "#21BA9080",
                                                                progressColor: '#21BA90',
                                                            });
                                                            audioval<?=$randaudio?>.style.color = "var(--gray-scale-2, #666)";
                                                        }
                                                    };

                                                    updateWaveformHeight();
                                                });

                                                window.addEventListener('resize', updateWaveformHeight);

                                                function displayTotalDuration() {
                                                    var totalDuration = wavesurfer<?=$randaudio?>.getDuration();
                                                    var formattedTotalDuration = formatTime(totalDuration);
                                                    document.getElementById('currentTimeHeading<?=$randaudio?>').textContent = formattedTotalDuration;
                                                    // console.log(formattedCurrentTime)
                                                }

                                                function updateCurrentTimeDisplay() {
                                                    var currentTime = wavesurfer<?=$randaudio?>.getCurrentTime();
                                                    var formattedCurrentTime = formatTime(currentTime);
                                                    document.getElementById('currentTimeHeading<?=$randaudio?>').textContent = "" + formattedCurrentTime;
                                                    // console.log(formattedCurrentTime)
                                                }

                                                function formatTime(timeInSeconds) {
                                                    var date = new Date(null);
                                                    date.setSeconds(timeInSeconds);
                                                    var formattedTime = date.toISOString().substr(11, 8);
                                                    if (formattedTime.startsWith('00:')) {
                                                        formattedTime = formattedTime.substr(3);
                                                    }
                                                    return formattedTime;
                                                }
                                            </script>
                                        </section>

                                        {{-- AUDIO END --}}
                                    @endif


                                    {{-- AUDIO END --}}



                                @elseif($post->post_type == 'images' || $post->post_type == 'text/images')
                                    @php

                                        if ($post->PostImage) {
                                            $imagePaths = explode(',', $post->PostImage->image_path);
                                        }

                                    @endphp

                                    @if ($post->PostImage)
                                        {{-- IMAGES START --}}
                                        <section id="{{ $post->id  }}">
                                            @php $rand = rand(1,1000000) @endphp

                                            <div class="card-layout imgcarousel" id="imgcarousel<?=$rand?>" >
                                                <div class="card-top">
                                                    <div class="card-top-text">
                                                        <div class="card-top-left">

                                                            @if (isset($data['user_information']->profile_picture))
                                                                <img class="avatar"
                                                                     src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                                            @else
                                                                <img class="avatar"
                                                                     src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                                            @endif

                                                        </div>
                                                        <div class="card-top-right">
                                                            <div class=" edit dropdown">
                                                                <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                    {{--                                              <div class="circle"></div>--}}
                                                                </div>
                                                                <ul class="dropdown-menu button-box">
                                                                    <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>
                                                                    <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                                                </ul>
                                                            </div>
                                                            <script>

                                                                editimagespostDropdown = (id)=>{
                                                                    console.log(id)
                                                                    editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                                    editPostDropdown.classList.toggle("activedropdown")
                                                                }
                                                            </script>
                                                            <h6 class="avatar-text">{{ $data['user']->first_name }}
                                                                {{ $data['user']->last_name }}</h6>
                                                            <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                                    alt="">
                                                                {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-top-desc">
                                                        <div class="card-top-desc-text">
                                                            <h3 class="content-text">@php

                                                                    if (isset($post->PostText->post_content)) {
                                                                        echo nl2br(e($post->PostText->post_content));
                                                                    }

                                                                @endphp</h3>
                                                        </div>
                                                        @if ($post->tags->count() > 0)
                                                            <div class="card-top-desc-tags">
                                                                @foreach ($post->tags as $tag)
                                                                    <span><a
                                                                                href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-middle">
                                                    <div class="card2-content card2contentunique<?=$rand?>">

                                                        <div class="card2-top">
                                                            <div class="images " >

                                                                @php $images = $imagePaths @endphp
                                                                @if (count($imagePaths) > 1)
                                                                    @foreach ($imagePaths as $index => $imagePath)


                                                                        <img onclick="OpenImageModal(event, true,'{{ asset('public/user_media/' . $post->user_id . '/images/' . $imagePath) }}', 'card2contentunique<?=$rand?>')"
                                                                             src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}">
                                                                    @endforeach
                                                                @else
                                                                    <img src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePaths[0]) }}"
                                                                         class="d-block w-100">
                                                                @endif

                                                            </div>
                                                        </div>
                                                        @if (count($imagePaths) > 1)
                                                            @php $counter = 1; @endphp

                                                            <div class="card2-bottom">
                                                                <div class="card2-left " onclick="side_slide(-1, {{ count($images) }}, <?php echo $rand?>)">
                                                                    <button>
                                                                        <img src="{{ asset('storage/assets/posts') }}/img/left.svg"
                                                                             alt=""></button>
                                                                </div>
                                                                <div class="card2-middle">
                                                                    <div class="btm-slides btmslidesunique<?=$rand?> slider-container">
                                                                        <div class="slider postThumbnaulSlider" id="slider" style="transform:translateX(0);">
                                                                            @foreach ($imagePaths as $index => $imagePath)
                                                                                <span class="slider-item"
                                                                                      onclick="btm_slide({{ $counter }}, {{ count($images) }}, <?php echo $rand?>)"><img
                                                                                            src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}"
                                                                                            style="width: 75px; height:75px; margin: auto 5px;"></span>
                                                                                @php $counter++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-2-right" onclick="side_slide(1, {{ count($images) }}, <?php echo $rand?>)">
                                                                    <button>
                                                                        <img src="{{ asset('storage/assets/posts') }}/img/right.svg" alt=""></button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if ($post->post_scope == 'private')
                                                    <div class="card-bottom">
                                                        <div class="card-bottom-left">
                                                            <p class="whoSeePrivateBtn">Visible to: </p>
                                                            <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                                         alt="">Private</button>
                                                        </div>

                                                    </div>
                                                @endif
                                            </div>
                                        </section>
                                        {{-- IMAGES END --}}
                                    @endif

                            {{-- CONNECTING JS --}}

                            <script src="{{ asset('storage/assets/js/jquery-3.3.1.min.js') }}"></script>
                            <script src="{{ asset('storage/assets/posts/pt-main.js') }}"></script>


                            {{-- CONNECTING JS END --}}
                        @endif


                    </div>

                    {{-- POSTS END --}}
                </div>
                {{--                @include('home-sections.right')--}}
            </div>
        </div>
    </div>
    @include('home-sections.homeJS')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection