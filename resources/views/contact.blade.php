@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')
  <div class="container-fluid p-0" style="
        background-color: rgba(18, 32, 59, 0.09);
        padding: 30px 0px !important;
        min-height: 100vh;
      ">
    <div class="container">
      <div class="row">
       <div class="col-12 contact">
<h2 class="text-center mx-auto">Contact Us</h2>
<p class="text-center mx-auto">Gorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum.</p>
<form class="mx-auto d-flex justify-content-center align-items-center">
    <div class="row">

        <div class="mb-3 w-50">
            <label for="exampleInputPassword1" class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Input your name here" id="exampleInputPassword1">
        </div>
        <div class="mb-3 w-50">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" class="form-control" placeholder="Input your email address here" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </div>
    <div class="w-100 textarea">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write your messages in here"></textarea>
      </div>
    <button type="submit" class="mx-auto btn btn-primary mb-5">Send Message</button>
  </form>
       </div>
      </div>
    </div>
  </div>
  
  @endsection

  @section('footer')
      @include('layouts.footer')
  @endsection
  