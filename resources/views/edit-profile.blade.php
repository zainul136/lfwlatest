@extends('main')
@section('title', $title ?? '')
@section('header')
    @include('layouts.header')
    @endsection

@section('content')
    <div class="container-fluid p-0"
         style="background-color: rgba(18, 32, 59, 0.09); padding: 30px 0px !important; min-height: 100vh;">
        <div class="container">
            <!-- Display Success Message -->
            <div class="container-fluid p-0" >
                <div class="container EditProfile">
                    <div class="row">
                        <div class="col-12  FAQ">
                            <h2 class="text-center ">Edit Profile</h2>
                            <p class="text-center mx-auto">* Indicates required</p>

                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- First Name Field -->
                                    <div class="mb-3 col-lg-6">
                                        <label for="first_name" class="form-label">First Name*</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Jenifer" value="{{ old('first_name', isset($data['user']->first_name) ? $data['user']->first_name : '') }}" @if(isset($data['user']->first_name)) readonly @endif>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- Last Name Field -->
                                    <div class="mb-3 col-lg-6">
                                        <label for="last_name" class="form-label">Last Name*</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Emile" value="{{ old('last_name', isset($data['user']->last_name) ? $data['user']->last_name : '') }}" @if(isset($data['user']->last_name)) readonly @endif>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Gender Field -->
                                    <div class="dropdown col-lg-6 mb-3">
                                        <label for="gender" class="form-label">Gender*</label>
                                        @if(isset($data['user_information']->gender))
                                            <input type="text" class="form-control" id="gender" name="gender" value="{{ $data['user_information']->gender }}" @if(isset($data['user_information']->gender)) readonly @endif>
                                        @else
                                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                                <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                                            </select>
                                        @endif
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Date of Birth Field -->
                                    <div class="mb-3 w-50 col-lg-6">
                                        <label for="date_of_birth" class="form-label">Date of Birth*</label>
                                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" placeholder="Select date of birth" value="{{ old('date_of_birth', isset($data['user_information']->date_of_birth) ? $data['user_information']->date_of_birth : '') }}" @if(isset($data['user_information']->date_of_birth)) readonly @endif>
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Email Field -->
                                    <div class="mb-3 w-50 col-lg-6">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@domain.com" value="{{ old('email', isset($data['user']->email) ? $data['user']->email : '') }}" @if(isset($data['user']->email)) readonly @endif>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="mb-3 w-50 col-lg-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="+1xxxxxxxxxxxxxxx" value="{{ old('phone', isset($data['user_information']->phone_number) ? $data['user_information']->phone_number : '') }}" >
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-100 row">
                                    <!-- City Field -->
                                    <div class="mb-3 col-lg-6">
                                        <label for="city" class="form-label">City*</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Madrid" value="{{ old('city', isset($data['user_information']->city) ? $data['user_information']->city : '') }}" >
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- Country Selector Field -->
                                    <div class="form-group first col-lg-6">
                                        <label for="country_selector" class="form-label">Country</label>
                                        <input id="country_selector" name="country_selector_code" type="text" class="form-group col-lg-12 @error('country_selector_code') is-invalid @enderror" style="height: 46px;" value="{{ old('country_selector_code', isset($data['user_information']->country) ? $data['user_information']->country : '') }}" >
                                        <div class="form-item" style="display:none;">
                                            <input class="form-group border-0" type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" placeholder="Selected country code will appear here" />
                                            <label for="country_selector_code">...and the selected country code will be updated here</label>
                                        </div>
                                        @error('country_selector_code')
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Address Field -->
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address*</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="1610 County Road 75, Alturas, CA 96101" value="{{ old('address', isset($data['user_information']->address) ? $data['user_information']->address : '') }}" >
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                                <!-- Profile Picture Field -->
                                <div class="mb-3">
                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/jpeg, image/jpg, image/png"  value="{{old('profile_picture')}}"  @if(!isset($data['user_information']->profile_picture)) required @endif>
                                    @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-flex btns">
                                    <a href="{{ route('profile.edit') }}" class="btn ditPfBtn">Edit Profile</a>
                                    <button type="submit" class="btn btn-primary submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('home-sections.homeJS')
            @endsection

            @section('footer')
                @include('layouts.footer')
                <script>
                    var currentDate = new Date();
                    var dateOfBirthInput = document.getElementById("date_of_birth");

                    // Set the maximum value for the input field to the current date.
                    dateOfBirthInput.max = currentDate.toISOString().split('T')[0];

                    // Listen for the "input" event to validate the selected date.
                    dateOfBirthInput.addEventListener("input", function() {
                        var selectedDate = new Date(this.value);

                        // Check if the selected date is in the future.
                        if (selectedDate > currentDate) {
                            // Reset the input to the maximum allowed date (current date).
                            this.value = currentDate.toISOString().split('T')[0];
                        }
                    });
                </script>
@endsection