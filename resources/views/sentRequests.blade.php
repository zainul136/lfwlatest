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

                            @foreach ($users as $user)
                                <div class="r1 d-flex justify-content-between request-card" onclick="OpenReqPage()">
                                    <div class="left d-flex w-75">
                                        @if (request()->is('requests'))
                                            <img src="@if (isset($request->user->userInformation->profile_picture)) {{ asset('public/user_media/' . $request->$user->id . '/profile_picture/' . $request->user->userInformation->profile_picture) }}
                                                @else
                                                    {{ asset('storage/assets/images/profile.jpeg') }} @endif" alt="">
                                        @else
                                            <img src="@if (isset($user->userInformation->profile_picture)) {{ asset('public/user_media/' . $user->id . '/profile_picture/' . $user->userInformation->profile_picture)  }}
                                                @else
                                                    {{ asset('storage/assets/images/profile.jpeg') }} @endif" alt="">
                                        @endif

                                        <div class="name">
                                            <h2> {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                @if (request()->is('requests'))
                                                    <span>(Adding You As
                                                        @if (isset($user->userInformation->gender) && $user->userInformation->gender == 'Male')
                                                            his
                                                        @else
                                                            her
                                                        @endif
                                                        {{ $relationship->type }})
                                                    </span>
                                                @endif
                                            </h2>
                                            <p>{{ $user->email }}</p>
                                            @if (request()->is('requests'))
                                                <div class="d-flex">
                                                    <button class="confirm-button" data-request-id="{{ $user->id }}" data-action="confirm">Confirm</button>
                                                    <button class="reject-button" data-request-id="{{ $user->id }}" data-action="reject">Reject</button>

                                                </div>
                                            @else
                                                <div class="d-flex">
                                                    <button class="cancel-button"
                                                        data-request-id="{{ $user->id }}">Cancel</button>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="right d-flex flex-column align-items-end">
                                        <p>Age: {{ isset($data['age']) ? $data['age'] : '' }} </p>
                                        <p>
                                            @if (isset($user->userInformation->city))
                                                {{ $user->userInformation->city }},
                                                {{ $user->userInformation->country }}
                                            @endif
                                            <img src="{{ asset('storage/assets/images') }}/BG.png" alt="">
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="col9  contact" style="margin-top: 30px;">
                        <div class="top d-flex flex-column justify-content-center align-items-center">
                            <img class="" src="{{ asset('storage/assets/images') }}/requestlg.png" alt="">
            <h2 class="text-center">John cristeno</h2>
        </div>
        <p class="d-flex justify-content-between align-items-center w-100">Email:
            <span>Johncristeno123@gmail.com</span>
        </p>
        <p class="d-flex justify-content-between align-items-center w-100">Age: <span>34</span></p>
        <p class="d-flex justify-content-between align-items-center w-100">Country: <span>Spain <img src="{{ asset('storage/assets/images') }}/BG.png" alt=""></span></p>
        <div class="box mx-auto d-flex justify-content-between">
            <p class="w-50">John cristeno Sent you a request</p>
            <div class="d-flex justify-content-center align-items-center">
                <button>Confirm Request</button>
                <button>Delete Request</button>
            </div>
        </div>
    </div> --}}
                </div>
            @else
                <div class="r1 d-flex justify-content-between" onclick="OpenReqPage()">
                    No Results Found!
                </div>

            @endif
        </div>
    </div>
    <!-- NAVBAR SEARCH ICON JS  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.cancel-button');

            cancelButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const requestId = button.getAttribute('data-request-id');
                    cancelRequest(requestId)
                        .then(() => {
                            // Refresh the page after request is cancelled
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error cancelling request:', error);
                        });
                });
            });

            function cancelRequest(requestId) {
                return fetch(`/cancel-request/${requestId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    })
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error cancelling request:', error);
                    });
            }
        });
    </script>
    
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
