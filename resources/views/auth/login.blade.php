@section('title','Login LFW')

@include('auth.template.header')

<div class="d-lg-flex half">
  <div class="bg" style="background-image: url('{{ asset('storage/assets/images/bg_1.jpeg') }}');">
    <div class="row align-items-center justify-content-center">
      <div class="mainh col-md-7 mx-auto text-center">
        <img src="{{ asset('storage/assets/images/logo.svg') }}">
        <h1>Last Few Words</h1>
        <p>Welcome back! Login to access your account and continue your personalized experience.</p>
      </div>
    </div>
  </div>
  <div class="contents">
    <div class="container form-section">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
          {{-- <h3>Sign In</h3>
          <p class="mb-5">lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet.</p> --}}
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group first">
              <label for="email">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email Address" id="email" name="email" value="{{ old('email') }}" required autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
              @enderror
            </div>
            <div class="form-group last mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" id="password" name="password" required>
              @error('password')
              <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
              @enderror


            </div>
            <div class="d-flex mb-4 align-items-center">
              <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <div class="control__indicator"></div>
              </label>
              <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
            </div>

            @if ($errors->has('maxAttempts'))
              <div class="alert alert-danger">
                {{ $errors->first('maxAttempts') }}
              </div>
            @endif

            <button type="submit" class="btn">Log In</button>
            <p class="para">Don't have an account? <a href="{{ route('register') }}" class="sea-green">Create a free account</a></p>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('storage/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/main.js') }}"></script>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
  });
</script>
@include('auth.template.footer')
