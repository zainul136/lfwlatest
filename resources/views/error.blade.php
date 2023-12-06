@extends('main')
@section('title', $title ?? '')
@section('header')
    @include('layouts.header')
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

            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6  p-0 ">
                    <div class="something" >
                        <div class="mb-3">
                            <h4 class="text-center" style="font-size: 25px;">Profile Information</h4>
                        </div>
                        <div class="row mt-44">
                            <div class="col-md-3 offset-2">
                                <img src="{{asset('user_media/'.$deseaseUser->id.'/profile_picture/'.$deseaseUser->userInformation->profile_picture) ??''}}" height="100" width="100" style="border-radius: 10%">
                            </div>
                            <div class="col-md-3" style=" font-family:Poppins, sans-serif;">
                                <p class="mt-3 ml-2 mb-1" style="font-size: 16px;font-weight: 500;margin-bottom: 0;color: #999999;">
                                    {{$deseaseUser->first_name . ' ' . $deseaseUser->last_name}}
                                </p>
                                <p style="font-size: 16px;font-weight: 500;margin-bottom: 0;color: #999999;">
                                {{$deseaseUser->email}}
                                </p>
                            </div>
                        </div>

                        <div class="something mt-4" >
{{--                        <div class="mb-3">--}}
{{--                            <h4 class="text-center">{{$heading}}</h4>--}}
{{--                        </div>--}}
                        <div class="d-flex justify-content-between second" >
                            <div class="d-flex w-100">
                                <p class="w-100 input  justify-content-start align-items-center " style="text-align: center;">
                                    {{$message}}
                                </p>

                            </div>

                        </div>
                        <div class="Posts">
                            <div class="text-center button-box">
                                <a href="{{(isset($url) && $url) ? $url : url('/')}}" class="btn public">{{(isset($button_text) && $button_text) ? $button_text : "Unlock Profile"}}</a>
                                <a href="{{url('/home')}}" class="btn public">Home</a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    @include('home-sections.homeJS')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
