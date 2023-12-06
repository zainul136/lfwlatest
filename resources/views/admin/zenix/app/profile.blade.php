{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>Hi, welcome back!</h4>
					<p class="mb-0">Your business dashboard</p>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
				</ol>
			</div>
		</div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
						<?php

						$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$user->id)->first();
						$profilePicture = isset($userProfileImages->profile_picture) ?
								asset("user_media/{$user->id}/profile_picture/{$userProfileImages->profile_picture}") :
								asset('storage/assets/images/profile.jpeg');
						?>
                        <div class="photo-content" style=" background: url({{$profilePicture}});  background-size: cover;background-position: center; min-height: 15.625rem; width: 100%;">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
							<div class="profile-photo">

								<img src="{{ $profilePicture }}" class="img-fluid rounded-circle" alt="">
							</div>
							<div class="profile-details">
								<div class="profile-name px-3 pt-2">
									<h4 class="text-primary mb-0">{{$user->first_name . ' ' . $user->last_name}}</h4>
									<p>UX / UI Designer</p>
								</div>
								<div class="profile-email px-2 ">
                                    <p class="mt-2">Email</p>
									<h4 class="text-muted " style="margin-top:-10px;">{{$user->email}}</h4>

								</div>

							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="profile-statistics">
									<div class="text-center">
										<div class="row">
											<div class="col">
												<h3 class="m-b-0">150</h3><span>Follower</span>
											</div>
											<div class="col">
												<h3 class="m-b-0">140</h3><span>Place Stay</span>
											</div>
											<div class="col">
												<h3 class="m-b-0">45</h3><span>Reviews</span>
											</div>
										</div>
										<div class="mt-4">
											<a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a> 
											<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
										</div>
									</div>
									<!-- Modal -->
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="profile-news">
									<h5 class="text-primary d-inline">Our Latest News</h5>
									<div class="media pt-3 pb-3">
										<img src="{{ asset('admin/images/profile/5.jpg') }}" alt="image" class="me-3 rounded" width="75">
										<div class="media-body">
											<h5 class="m-b-5"><a href="{!! url('/post-details'); !!}" class="text-black">Collection of textile samples</a></h5>
											<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
										</div>
									</div>
									<div class="media pt-3 pb-3">
										<img src="{{ asset('admin/images/profile/6.jpg') }}" alt="image" class="me-3 rounded" width="75">
										<div class="media-body">
											<h5 class="m-b-5"><a href="{!! url('/post-details'); !!}" class="text-black">Collection of textile samples</a></h5>
											<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
										</div>
									</div>
									<div class="media pt-3 pb-3">
										<img src="{{ asset('admin/images/profile/6.jpg') }}" alt="image" class="me-3 rounded" width="75">
										<div class="media-body">
											<h5 class="m-b-5"><a href="{!! url('/post-details'); !!}" class="text-black">Collection of textile samples</a></h5>
											<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane show active fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">About Me</h4>
                                                <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                                <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                            </div>
                                        </div>
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Personal Information</h4>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{$user->first_name . ' ' . $user->last_name}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{$user->email ??''}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{$age ??''}}</span>
                                                </div>
                                            </div>
                                            @if(isset($user->userInformation->country ))
                                            <?php
                                            $country = \App\Models\Country::query()->where('code','=',$user->userInformation->country)->first();
                                            ?>


                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{$user->userInformation->address ??''}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Country <span class="pull-end">:</span></h5>
                                                </div>

                                                <div class="col-sm-9 col-7"><span>{{$country->name}}
                                                    <img src="{{asset('storage/assets/'.$country->flag_filepath)}}" width="30">
                                                    </span>
                                                </div>
                                            </div>
                                            @else

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{$user->userInformation->address ??''}}

                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Country <span class="pull-end">:</span></h5>
                                                    </div>

                                                    <div class="col-sm-9 col-7"><span>{{$user->userInformation->country ??'N/A'}}
                                                    </span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form method="post" action="{{route('update-staff-profile')}}" enctype="multipart/form-data">
                                                  @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label"><strong>First Name</strong></label>

                                                            <input type="text" name="first_name" value="{{auth()->user()->first_name ??''}}" readonly placeholder="" class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label"><strong>Last Name</strong></label>

                                                            <input type="text" name="last_name" value="{{auth()->user()->last_name ??''}}"  readonly placeholder="" class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label"><strong>Email</strong></label>
                                                            <input type="email" value="{{auth()->user()->email ??''}}" readonly placeholder="Email" class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"><strong>Address</strong></label>
                                                        <input type="text" value="{{auth()->user()->userInformation->address ?? ''}}"  name="address" placeholder="1234 Main St" class="form-control" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"><strong>City</strong></label>
                                                        <input type="text" name="city" value="{{auth()->user()->userInformation->city ?? ''}}" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="profile_picture" class="form-label"><strong>Profile Picture</strong></label>
                                                        <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/jpeg, image/jpg, image/png" >
                                                        @error('profile_picture')
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                              </span>
                                                        @enderror
                                                    </div>

                                                    <button class="btn btn-primary" type="submit">Update
                                                        Profile</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- Modal -->
							<div class="modal fade" id="replyModal">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Post Reply</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>

										<div class="modal-body">
											<form>
												<textarea class="form-control" rows="4">Message</textarea>
											</form>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
											<button type="button" class="btn btn-primary">Reply</button>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	   