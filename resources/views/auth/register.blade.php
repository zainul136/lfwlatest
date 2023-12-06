@section('title','Register LFW')
@include('auth.template.header')

<div class="d-lg-flex half">
    <div class="bg" style="background-image: url('storage/assets/images/bg_1.jpeg');">
        <div class="row align-items-center justify-content-center">
            <div class="mainh col-md-7 mx-auto text-center">
                <img src="storage/assets/images/logo.svg">
                <h1>Last Few Words</h1>
                <p>Join our community by registering and experience the seamless journey of connecting with others and accessing exclusive features.</p>
            </div>
        </div>
    </div>
    <div class="contents signup">
        <div class="container form-section">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                   {{--  <h3>Sign Up</h3>
                    <p class="mb-5">It's Quick and Easy</p> --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group first">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter your first name" id="first_name" name="first_name" value="{{ old('first_name') }}"  autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} only Alphabetic are accept</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group first">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name" id="last_name" name="last_name" value="{{ old('last_name') }}" >
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} only Alphabetic are accept</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group first">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" id="email" name="email" value="{{ old('email') }}" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" id="password" name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                            <img src="storage/assets/images/eye.png" class="img-fluid eye-img" id="togglePassword">
                        </div>

                        <div class="form-group last mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation" required>
                            <img src="storage/assets/images/eye.png" class="img-fluid eye-img" id="toggleCPassword">


                        </div>


                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0">
                                <input type="checkbox" checked="checked" required>
                                <div class="control__indicator"></div>
                            </label>
                            <p class="para mb-0">You agree to our friendly <a class="sea-green">Terms, conditions and privacy policy.</a></p>
                        </div>

                        <button type="submit" class="btn">Sign Up</button> <span class="login-btn sea-green" ><a href="{{ route('login') }}">Login</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('storage/assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/popper.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/main.js"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleCPassword = document.querySelector('#toggleCPassword');
    const Cpassword = document.querySelector('#password_confirmation');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
    });

    toggleCPassword.addEventListener('click', function (e) {
        const type = Cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        Cpassword.setAttribute('type', type);
    });
</script>
<script src="build/js/countrySelect.js"></script>
<script>
   /*  $("#country_selector").countrySelect({
        // defaultCountry: "jp",
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // responsiveDropdown: true,
        preferredCountries: ['ca', 'gb', 'us']
    }); */
</script>

@include('auth.template.footer')
