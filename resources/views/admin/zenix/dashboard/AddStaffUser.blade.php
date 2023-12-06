{{-- Extends layout --}}
@extends('admin.layout.default')
{{-- Content --}}
@section('content')


    <div class="container-fluid">
        <div class="col-md-10 offset-1">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

                @if (session('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" style="background-color: #badbcc !important; color: black !important; display: flex; justify-content: space-between; align-items: center;">
                               <a href="#"> <span aria-hidden="true" class="close-alert" data-dismiss="alert" style="order: 1;" style="font-size: 20px;">&times;</span></a>
                                <span style="order: 2;">{{ session('success') }}</span>
                                <a class="btn submit button-style" href="{{ route('staff-information') }}" style="order: 3;">View Staff</a>
                            </div>

                        </div>
                    </div>
                @endif
        </div>
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)" class="newClass">Add New Staff Member</a></li>
            <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Element</a></li> -->
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 w-100">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Staff Details </h4>
                </div>
                <div class="card-body py-0">
                    <div class="basic-form mt-4">

                        <form method="POST" action="{{ route('store-new-staff') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="first_name" class="form-label "><strong>First Name*</strong></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Jenifer" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="last_name" class="form-label "><strong>Last Name*</strong></label>

                                    <input type="text" class="form-control   @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Zain" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="gender" class="form-label mt-3"><strong>Gender*</strong></label>
                                    <select class="form-control  @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="Male" @if(old('gender') === 'Male') selected @endif>Male</option>
                                        <option value="Female" @if(old('gender') === 'Female') selected @endif>Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="date_of_birth" class="form-label mt-3"><strong>Date of Birth*</strong></label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" placeholder="Select date of birth" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="email" class="form-label mt-3"><strong>Email*</strong></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@domain.com" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="phone" class="form-label mt-3"><strong>Phone Number</strong></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="+1xxxxxxxxxxxxxxx" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="city" class="form-label mt-3"><strong>City*</strong></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Madrid" value="{{ old('city') }}">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="country" class="form-label mt-3"><strong>Country*</strong></label>
                                    <select class="form-control @error('country') is-invalid @enderror" id="country" name="country">
                                        @if(isset($countries))
                                            @foreach($countries as $country)
                                                <option value="{{ $country->code }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="password" class="form-label mt-3"><strong>Password*</strong></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="confirm_password" class="form-label mt-3"><strong>Confirm Password*</strong></label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirm_password" name="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex btns mb-5 mt-5">
                                <button type="submit" class="btn submit button-style ">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

  .button-style {
    background-color: #99ddcc;
    color: #fff;
    font-size: 10px;
    padding: 8px 28px;
    border-radius: 12px;
    border: 2px solid #99ddcc;
    transition: all .2s ease-in;
}

.button-style:hover {
    background-color: #fff;
    color: #52525b;
    border-color: #99ddcc; /* You can add this line to change the border color to black on hover */
}

</style>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('close-alert')) {
            event.target.parentElement.parentElement.parentElement.style.display = 'none';
        }
    });
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
