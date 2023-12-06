@extends('main')
@section('title', $title)
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
                @include('home-sections.left')
                <div class="col-sm-6 p-0">
                </div>
                <div class="col-sm-3">
                    <div class="family ">
                        <h4>Relative  Members</h4>
                        <div class="SidefamilyMembers" id="defaultFamilyMembers">
                            {{-- Relatives Start --}}
                            @if ($relativeUsers == null)

                                <p>No relatives found.</p>
                            @else
                              <div class="row">
                                  <div class="col-md-6">
                                      Name
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->first_name}} {{$relativeUsers->last_name}}</div>
                                  <div class="col-md-6">
                                     Email
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->email}}</div>

                                  <div class="col-md-6">
                                     Gander
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->gender}}</div> <div class="col-md-6">
                                     Date Of Birth
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->date_of_birth}}</div>
                                  <div class="col-md-6">
                                     Phone Number
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->phone_number}}
                                  </div>

                                  <div class="col-md-6">
                                     City
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->city}}</div>

                                <div class="col-md-6">
                                     Country
                                </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->country}}</div>
                                <div class="col-md-6">
                                     Address
                                  </div>
                                  <div class="col-md-6">{{$relativeUsers->userInformation->address}}</div>
                              </div>
                            @endif
                            {{-- Relative End --}}
                        </div>

                        {{-- Duplicate the default family members list --}}
                        <div class="SidefamilyMembers" id="filteredFamilyMembers" style="display: none;"></div>

                        {{-- No results found message --}}
                        <p id="noResultsFound" style="display: none;">No results found.</p>
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
