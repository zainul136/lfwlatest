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
            @if (isset($users))
                <div class="d-flex justify-content-center">
                    <div class="col-3 contact  ">
                        <div class="d-flex w-100 justify-content-between align-items-start">
                            <h2>Family Requests <span> {{ $users->count() }} </span></h2>
                            @if (request()->is('requests'))
                                <a href=" {{ route('sentRequests') }}">(View Sent Requests)</a>
                            @else
                                <a href=" {{ route('requests') }}">(View Received Requests)</a>
                            @endif
                        </div>
                        <div class="requests">

                            @foreach ($users as $request)
                                @if ($request->user->id == Auth::id())
                                    THIS IS YOUR OWN ID
                                @endif
                                <div class="r1 d-flex justify-content-between request-card" onclick="OpenReqPage()">
                                    <div class="left d-flex w-75">
                                        
                                        @if (request()->is('requests'))


                                            <img src="@if (isset($request->user->id)) {{ asset('user_media/' . $request->user->id . '/profile_picture/' . $request->user->userInformation->profile_picture) }}                                                @else
                                                    {{ asset('storage/assets/images/profile.jpeg') }} @endif" alt="">

                                        @else

                                            <img src="@if (isset($request->user->profile_picture)) {{ asset('user_media/' . $request->user->id . '/profile_picture/' . $request->user->profile_picture) }}
                                                @else
                                                    {{ asset('storage/assets/images/profile.jpeg') }} @endif" alt="">
                                        @endif
                                        <div class="name">

                                            <h2> {{ $request->user->first_name }}
                                                {{ $request->user->last_name }}
                                                @if (request()->is('requests'))
                                                    <span>(Adding You As
                                                        @if (isset($request->user->userInformation->gender) && $request->user->userInformation->gender == 'Male')
                                                            his
                                                        @else
                                                            her
                                                        @endif
                                                        {{ $request->relationship->type }})
                                                    </span>
                                                @endif
                                            </h2>
                                            <p>{{ $request->user->email }}</p>
                                            @if (request()->is('requests'))
                                                <div class="d-flex">
                                                    <button class="confirm-button" data-request-id="{{ $request->user->id }}">Confirm</button>
                                                    <button class="reject-button" data-request-id="{{ $request->user->id }}">Reject</button>
                                                </div>
                                            @else
                                                <div class="d-flex">
                                                    <button class="cancel-button"
                                                        data-request-id="{{ $request->user->id }}">Cancel</button>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="right d-flex flex-column align-items-end">
                                        <p>Age: {{ isset($data['age']) ? $data['age'] : '' }} </p>
                                        <p>
                                            @if (isset($request->user->userInformation->city))
                                                {{ $request->user->userInformation->city }},
                                                {{ $request->user->userInformation->country }}
                                            @endif

                                                @if(isset($request->user->userInformation->country ))
                                                        <?php
                                                        $countryflag = \App\Models\Country::query()->where('code', $request->user->userInformation->country )->first();
                                                        ?>
                                                    @if($countryflag)
                                                        <img src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}">
                                                    @else
                                                        <!-- Handle the case where no country flag is found -->
                                                        No flag found for this country.
                                                    @endif
                                                @else
                                                    <!-- Handle the case where user_information->country is not set -->
                                                    Country not specified.
                                                @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="r1 d-flex justify-content-between" onclick="OpenReqPage()">
                    No Results Found!
                </div>

            @endif
        </div>
    </div>
    
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
