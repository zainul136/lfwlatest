@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')


    <div class="container-fluid p-0"
         style="
    background-color: rgba(18, 32, 59, 0.09);
    padding: 30px 0px !important;
    min-height: 100vh;
  ">
        <div class="container request">
            <div class="d-flex justify-content-center">
                <div class="col-3 contact">
                    <div class="d-flex w-100 justify-content-between align-items-start contact-heading">
                        <h2>People</h2>
                        <a href="">Filter <i class="fa fa-angle-down mx-2" aria-hidden="true"></i></a>
                    </div>

                    {{-- Search Results Start --}}

                    <div class="requests" style="max-height: 875px; overflow-y: auto;">
                        @if ($data['search_results']->isEmpty())
                            <p style="margin: auto 25px 30px;">No results found!</p>
                        @else
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @foreach ($data['search_results'] as $user)
                                <div>
                                    <div class="r1 d-flex justify-content-between profile-section"
                                         id="person{{ $user->id }}" onclick="OpenReqPage('person{{ $user->id }}')">
                                        <div class="left d-flex w-75">
                                            <img class="user-img" id="r1-avatar"
                                                 src="@if ($user && $user->user_information && isset($user->user_information->profile_picture) && $user->user_information->profile_picture != '') {{ asset('/user_media/' . $user->id . '/profile_picture/' . $user->user_information->profile_picture) }}
                                        @else
                                            {{ asset('storage/assets/images/profile.jpeg') }} @endif"
                                                 alt="" />
                                            <div class="name">
                                                <h2 class="r1-name">{{ $user->first_name }} {{ $user->last_name }}</h2>
                                                <p class="r1-email">{{ $user->email }}</p>
                                                <div class="d-flex ">
                                                    <!-- Button trigger modal -->

                                                    @if (!session('requestSent'))
                                                        <button type="button" class="btn btn-primary msg sendRequestButton"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Send Request
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if ($user->user_information)
                                            <div class="right text-end">
                                                @php $age = \Carbon\Carbon::parse($user->user_information->date_of_birth)->age; @endphp
                                                @if ($age != 0)
                                                    <p class="r1-age-wrapper">Age:
                                                        <span class="r1-age" id="age">{{ $age }}
                                                    </span>
                                                    </p>
                                                @endif
                                                <p class="r1-age-wrapper r1-age" style="display: none"></p>
                                                <p>
                                                    <span class="r1-country">{{ $user->user_information->country }}</span>
                                                    @if($user->user_information->country)
                                                            <?php
                                                            $countryflag = \App\Models\Country::query()->where('code', $user->user_information->country)->first();
                                                            ?>
                                                        @if($countryflag)
                                                            <img class="card-count-img"  src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}" width="40">
                                                        @else
                                                            <!-- Handle the case where no country flag is found -->
                                                        @endif
                                                    @else
                                                        <!-- Handle the case where user_information->country is not set -->
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- Search Results END --}}

                </div>

                @php
                    $user = $data['search_results']->first();
                @endphp
                @if ($data['search_results']->isEmpty())
                @else
                    <div class="col9 contact" style="margin-top: 30px">
                        <div class="top d-flex flex-column justify-content-center align-items-center">
                            <img id="card-avatar"
                                 src="@if ($user && $user->user_information && isset($user->user_information->profile_picture) && $user->user_information->profile_picture != '') {{ asset('user_media/' . $user->id . '/profile_picture/' . $user->user_information->profile_picture) }}
                            @else
                                {{ asset('storage/assets/images/profile.jpeg') }} @endif"
                                 alt="" />
                            <h2 class="text-center card-name">{{ $user->first_name }} {{ $user->last_name }}</h2>
                        </div>
                        <p class="d-flex justify-content-between align-items-center w-100 ">
                            Email: <span class="card-email">{{ $user->email }}</span>
                        </p>

                        @if ($user->user_information)
                            @php $age = \Carbon\Carbon::parse($user->user_information->date_of_birth)->age; @endphp
                            @if ($age != 0)
                                <div class="r1-age-wrapper">
                                    <p class="d-flex justify-content-between align-items-center w-100">
                                        Age: <span class="r1-age" id="age">
                                        <span
                                                class="card-age">{{ \Carbon\Carbon::parse($user->user_information->date_of_birth)->age }}</span>
                                    </span>
                                    </p>
                                </div>
                            @endif

                            <p class="r1-age-wrapper r1-age" style="display: none"></p>
                            <p class="d-flex justify-content-between align-items-center w-100">
                                Country: <span>
                                <span class="card-country"> {{ $user->user_information->country }}</span>
                                @if($user->user_information->country)
                                            <?php
                                            $countryflag = \App\Models\Country::query()->where('code', $user->user_information->country)->first();
                                            ?>
                                        @if($countryflag)
                                            <img class="card-count-img"  src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}" width="40">
                                        @else
                                            <!-- Handle the case where no country flag is found -->
                                        @endif
                                    @else
                                        <!-- Handle the case where user_information->country is not set -->
                                    @endif
                            </span>
                            </p>
                        @endif
                        <!-- REQ BOX -->
                        <div class="req-box">
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="req-box-child" data-bs-toggle="modal" data-bs-target="#exampleModal2">Request
                                    as
                                    Deceased</button>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button> <a href="message.html">Send Message</a> </button>
                            </div>
                        </div>
                        <!-- BOX  -->
                        @if (!session('requestSent'))
                                <?php
                                $request =  \App\Models\UserRelationship::query()
                                    ->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
                                    ->where('relative_id',  $user->id)
                                    ->first();
                                ?>
                            @if($request)
                                {{-- Handle the case where a request already exists --}}
                                <div class=" mx-auto  justify-content-between ">
                                    <p style="font-weight: 500; font-size: 18px; color:#52525B" class="reqcard-name">
                                        {{ $user->first_name }} {{ $user->last_name }} has already been added as a relative.
                                    </p>
                                </div>
                            @else
                                <div class="box mx-auto  justify-content-between ">
                                    <p class="w-75">
                                        Add <span style="font-weight: 500; font-size: 18px; color:#52525B"
                                                  class="reqcard-name">{{ $user->first_name }} {{ $user->last_name }}</span> as your
                                        family?
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-primary msg" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Send Request</button>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade SendRequestModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="edit  d-flex justify-content-end dropdown">

                    <form class="dropdown-menu p-4 editDropdown d-block" method="POST"
                        action="{{ route('addRelative') }}"> @csrf
                        <i class="fa-solid fa-xmark fa-2x position-absolute" data-bs-dismiss="modal"
                            style="top: 2%; right: 4%;"></i>
                        <p>Send Request<span>* Indicates required</span></p>
                        <h2>Basic Info</h2>
                        @if ($user && $user->userInformation)
                            <div class="row">
                                <input type="hidden" id="user-id" name="user-id" value="{{ $user->id }}">

                                <div class="mb-3">
                                    <label for="exampleDropdownFormEmail2" class="form-label">Name*</label>
                                    <input type="text" class="form-control" id="popupmodelname" disabled
                                        value="{{ $user->first_name }} {{ $user->last_name }}">
                                </div>
                            </div>

                        <div class="row">
                            <div class="dropdown w-100 col-lg-6 mb-3">
                                <label for="relationship" class="form-label">Relationship*</label>

                                <select name="relationship" id="relationship" class="form-control rlptext text-start">
                                    <option value="">Select your Relative as a</option>

                                    @if($user->userInformation->gender == "Male")
                                    <option value="Brother">Brother</option>
                                    <option value="Father">Father</option>
                                    <option value="Husband">Husband</option>
                                    <option value="Son">Son</option>
                                    <option value="Grandfather">Grandfather</option>
                                    <option value="Grandson">Grandson</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Nephew">Nephew</option>
                                    <option value="Brother in Law">Brother in Law</option>
                                    <option value="Cousin">Cousin</option>
                                    <option value="Father in Law">Father in Law</option>
                                    <option value="Son in Law">Son in Law</option>
                                    @else
                                    <option value="Sister">Sister</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Wife">Wife</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Grandmother">Grandmother</option>
                                    <option value="Granddaughter">Granddaughter</option>
                                    <option value="Aunt">Aunt</option>
                                    <option value="Niece">Niece</option>
                                    <option value="Cousin">Cousin</option>
                                    <option value="Sister in Law">Sister in Law</option>
                                    <option value="Mother in Law">Mother in Law</option>
                                    <option value="Daughter in Law">Daughter in Law</option>
                                    @endif

                                    <!-- Add any other relationships as options here -->
                                </select>
                            </div>
                        </div>
                        <div id="newFormContainer"></div> <!-- Container for the new form -->
                        <div class="d-flex btns my-2">
                            <button type="submit" class="btn btn-primary submit">Send Request</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 2nd POPUP -->
    <div class="modal fade SendRequestModal" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="edit  d-flex justify-content-end dropdown">
                    <form class="dropdown-menu p-4 editDropdown d-block">
                        <i class="fa-solid fa-xmark fa-2x position-absolute" data-bs-dismiss="modal"
                            style="top: 2%; right: 4%;"></i>
                        <p>Request as Deceased<span>* Indicates required</span></p>
                        <h2>Basic Info</h2>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Full Name*</label>
                                <input type="text" class="form-control" id="exampleDropdownFormEmail2" disabled
                                    placeholder="Jenifer">
                            </div>
                            <div class="mb-3  col-lg-6">
                                <label for="exampleDropdownFormEmail2" class="form-label">Date of Death* </label>
                                <div class="dropdown countryDropdown">
                                    <img src="{{ asset('storage/assets/images') }}/caltrans.png" alt=""
                                        class="borcer-0" style="border: 0 !important;">
                                    <input type="date" name="date" class="form-control" id="date_sh"
                                        onfocus="this.showPicker()" onClick="this.showPicker()" />
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="select-files-field mb-12  col-lg-12">
                                <label for="exampleDropdownFormEmail2" class="form-label">Upload Death Certificate*
                                </label>
                                <div class="doc-container">
                                    <div class="docs" id="docs"></div>
                                </div>
                                <div class="dropdown countryDropdown">
                                    <div class="certificate-upload-btns">
                                        <div class="upload-btns">
                                            <label for="docBtn" class="select-file"> <span> Select File</span></label>
                                            <input type="file" multiple="multiple"
                                                class="opacity-0 h-100 position-absolute" style="width: 100%;"
                                                id="docBtn" value="valueee">
                                        </div>
                                        <div class="upload-btns">
                                            <label for="docBtn"> <span> Upload File</span></label>
                                            <input class="opacity-0 h-100 position-absolute" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mapAddress" style="display: flex;">
                            <div class="formGroup">
                                <label for="map_address_field" class="form-label">Map address</label>
                                <input type="text" class="form-control" id="map_address_field"
                                    name="map_address_field">
                            </div>
                            <div class="formGroup">
                                <label for="map_desc_sh" class="form-label">Description</label>
                                <textarea id="map_desc_sh" class="form-control" name="map_desc_sh"></textarea>
                            </div>
                        </div>
                        <div class="d-flex btns my-2">
                            <a href="./MyfamilyMember.html" class="btn btn-primary submit">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendRequestButtons = document.querySelectorAll('.sendRequestButton');

            sendRequestButtons.forEach(button => {
                button.style.display = 'none';
            });
        });
    </script>

    <script>
        const msgBox = document.querySelector(".req-box")
        const reqBox = document.querySelector(".box")

        msgBox.style.display = "none "

        OpenReqPage = (id) => {
            const r1Avatar = document.querySelectorAll(`#${id} #r1-avatar`)
            const r1Name = document.querySelector(`#${id} .r1-name`);
            const r1Email = document.querySelector(`#${id} .r1-email`)
            const r1Age = document.querySelector(`#${id} .r1-age`)
            const r1Country = document.querySelector(`#${id} .r1-country`)
            const messageType = document.querySelector(`#${id} .msg`)
            const countImg = document.querySelector(`#${id} .count-img`);

            const cardAvatar = document.querySelectorAll('#card-avatar')
            const cardName = document.querySelector(".card-name")
            const reqcardName = document.querySelector(".reqcard-name")
            const cardEmail = document.querySelector(".card-email")
            const cardAge = document.querySelector(".card-age")
            const cardCountry = document.querySelector(".card-country")
            const cardImg = document.querySelector(".card-count-img")

            if (messageType.innerHTML == "Send Message") {
                reqBox.style.display = "none"
                msgBox.style.display = "flex"

            } else {
                reqBox.style.display = "flex"
                msgBox.style.display = "none "
            }

            let img1 = document.querySelector('#card-avatar').getAttribute("src");
            let img2 = document.querySelector(`#${id} .user-img`).getAttribute("src");

            let cardimg = document.querySelector('.card-count-img').getAttribute("src");
            let countimg = document.querySelector(`#${id} .count-img`).getAttribute("src");

            let cropImg = document.querySelector('#card-avatar').setAttribute("src", img2)

            document.querySelector('.card-count-img').setAttribute("src", countimg)

            cardImg.style.width = "34px";
            cardImg.style.height = "26px";


            cardName.innerHTML = r1Name.innerHTML;
            reqcardName.innerHTML = r1Name.innerHTML;
            cardEmail.innerHTML = r1Email.innerHTML;
            cardAge.innerHTML = r1Age.innerHTML;
            cardCountry.innerHTML = r1Country.innerHTML;
            document.getElementById('popupmodelname').value = r1Name.innerHTML;
            let userId = id.replace('person', '');
            document.getElementById('user-id').value = userId;
            console.log(r1Name, r1Email, r1Age, cardCountry)


            console.log("Age " + document.querySelector(`#${id} .r1-age`).innerText)
            if (document.querySelector(`#${id} .r1-age`).innerText == 0) {
                const profileSection = document.querySelector(`#${id}.profile-section`);
                const ageWrappers = profileSection.querySelectorAll('.r1-age-wrapper');
                ageWrappers.forEach((ageWrapper) => {
                    ageWrapper.style.display = "none";
                });
                console.log("TRUE")
            } else {
                console.log("FALSE")
            }

        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('relationship').addEventListener('change', function() {
            const selectedValue = this.value;
            console.log('Selected Value:', selectedValue);
            // You can use this selectedValue as needed, or submit the form.
        });


        function checkRelationship() {
            // Get the selected relationship
            var selectedRelationship = document.getElementById('relationship').value;
            var message = '';

            if (selectedRelationship === 'Brother') {
                message = '<h3>Mother and Father</h3>';
            } else if (selectedRelationship === 'Sister') {
                message = '<h3>Mother</h3>';
            }
            // Check if the selected relationship is "Brother" or "Sister"
            if (selectedRelationship === 'Brother' || selectedRelationship === 'Sister') {
                // Make an AJAX request to check if the user has parent data
                $.ajax({
                    url: '/check-parent-exists', // Replace with your server route
                    method: 'GET',
                    data: {
                        userId: '{{ $user->id  ??''}}', // Pass the user ID
                    },
                    success: function(data) {
                        if (data.hasParentData) {
                        } else {
                            // Create and insert a new form
                            var newForm = '<hr class="mt-5"><h5 class="mt-5">You need to create an account before sending a sibling relation request since we don\'t have your parents\' information in our database.</h5> ' +
                                '<div class="col-md-6 mt-5"><label for="parent">Select a Parent*</label><input type="radio" name="gender" value="Male" style="margin-left: 20%" required> Father  <input type="radio" name="gender" value="Female" style="margin-left: 10%" required> Mother</div><br>' +
                                '<div class="row"> <div class="col-md-6"> <label for="parent">First Name*</label><input class="form-control" type="text" name="first_name" placeholder="First Name" required></div> ' +
                                '<div class="col-md-6"> <label for="parent">Last Name*</label><input class="form-control" type="text" name="last_name" placeholder="Last Name" required></div></div><br> ' +
                                '<div class="row"> <div class="col-md-6"> <label for="parent">Email*</label><input class="form-control" type="email" name="email" placeholder="Email" required></div><br> ' +
                                '<div class="col-md-6"> <label for="parent">Date of Birth*</label><input class="form-control" type="date" name="data_of_birth" placeholder="Date Of Birth" required></div></div><br>';

                            // Insert the new form into the container
                            document.getElementById('newFormContainer').innerHTML = newForm;
                            var currentDate = new Date().toISOString().split('T')[0];

                            // Set the minimum value for the input field to the current date
                            $('input[name="data_of_birth"]').attr('max', currentDate);

                            // Add an event handler to handle date changes
                            $('input[name="data_of_birth"]').on('input', function() {
                                var selectedDate = $(this).val();

                                // Check if the selected date is today or a future date
                                if (selectedDate > currentDate) {
                                    // If it's a future date, set the input value to the current date
                                    $(this).val(currentDate);
                                }
                            });
                        }
                    },
                    error: function(err) {
                        console.log('Error checking parent data: ' + err);
                    }
                });
            } else {
                // If the relationship is not "Brother" or "Sister," remove the new form
                document.getElementById('newFormContainer').innerHTML = '';
            }
        }

        // Add an event listener to trigger the function when the relationship selection changes
        document.getElementById('relationship').addEventListener('change', checkRelationship);



    </script>

    <script>


    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
