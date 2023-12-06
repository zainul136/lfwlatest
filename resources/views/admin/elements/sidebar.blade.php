<!--**********************************
	Sidebar start
***********************************-->
<style>
	[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .deznav .deznav-scroll {
	margin-right: 80%;
	}
</style>
<div class="deznav">
	<div class="deznav-scroll">
		<div class="main-profile">
			<div class="image-bx">
				<?php
				$user  = \Illuminate\Support\Facades\Auth::user();
				$userInformation = $user->userInformation;
				$age = optional($userInformation)->date_of_birth
						? \Carbon\Carbon::parse($userInformation->date_of_birth)->age
						: "";


				$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$user->id)->first();
				$profilePicture = isset($userProfileImages->profile_picture) ?
						asset("user_media/{$user->id}/profile_picture/{$userProfileImages->profile_picture}") :
						asset('storage/assets/images/profile.jpeg');
				?>
				<img src="{{$profilePicture}}" alt="">
				<a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
			</div>
			<h5 class="name"><span class="font-w400">Hello,</span> {{$user->first_name}}</h5>
			<p class="email">{{$user->email ??''}}</p>
		</div>
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Dashboard</li>

			<!-- /////////////////////users////////////////////////// -->


			<li><a class="has-arrow ai-icon user-module-box" href="javascript:void()" aria-expanded="false">
					<svg class="user-module-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path
								d="M9.99996 8.33333C11.8409 8.33333 13.3333 6.84095 13.3333 5C13.3333 3.15905 11.8409 1.66667 9.99996 1.66667C8.15901 1.66667 6.66663 3.15905 6.66663 5C6.66663 6.84095 8.15901 8.33333 9.99996 8.33333Z"
								stroke="#52525B" stroke-width="1.5" />
						<path
								d="M16.6666 14.5833C16.6666 16.6542 16.6666 18.3333 9.99998 18.3333C3.33331 18.3333 3.33331 16.6542 3.33331 14.5833C3.33331 12.5125 6.31831 10.8333 9.99998 10.8333C13.6816 10.8333 16.6666 12.5125 16.6666 14.5833Z"
								stroke="#52525B" stroke-width="1.5" />
					</svg>

					<span class="nav-text">Users</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{route('user-information')}}">All Users</a></li>
					<li><a href="{{route('add-new-User')}}">Add New User</a></li>

					<li><a href="{{route('staff-information')}}">Staff Members</a></li>
					<li><a href="{{route('add-new-staff')}}">Add New Staff</a></li>

				</ul>
			</li>

			<!-- /////////////////////Posts////////////////////// -->
			<li><a class="has-arrow ai-icon user-module-box" href="javascript:void()" aria-expanded="false">
					<!-- <i class="fa fa-address-card-o" style="font-size:24px"></i>	 -->
					<svg id="Layer_1" height="300" viewBox="0 0 24 24" width="300" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m19 1h-14a5.006 5.006 0 0 0 -5 5v12a5.006 5.006 0 0 0 5 5h14a5.006 5.006 0 0 0 5-5v-12a5.006 5.006 0 0 0 -5-5zm-14 2h14a3 3 0 0 1 3 3v1h-20v-1a3 3 0 0 1 3-3zm14 18h-14a3 3 0 0 1 -3-3v-9h20v9a3 3 0 0 1 -3 3zm0-8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 0-2h12a1 1 0 0 1 1 1zm-4 4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 1 1zm-12-12a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1z"/></svg>


					<span class="nav-text">Posts</span>
				</a>
				<ul aria-expanded="false">

					<li><a href="{{ route('public-post') }}">Public Posts</a></li>
					<li><a href="{{ route('privatePosts') }}">Private Posts</a></li>
				</ul>
			</li>

			<li><a href="{{ route('deceased-request')}}">Deceased Confirmation</a></li>
			<li><a href="{{ route('details-notification-decease-persons')}}">Profile Unlock Requests</a></li>
			<li><a href="{{ route('user-chats') }}">User Chats</a></li>
			<li><a href="{{ route('payment-confirmation')}}">Transcations History</a></li>
			<!-- /////////////////////////////////////////////////////////// -->
			<!-- <li><a href="{{route('user-information')}}">User Information</a></li> -->
			<!-- <li><a href="{{route('getDeletedUser')}}">Deleted Users</a></li> -->
			<!-- form -->
			<!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-044-file"></i>
					<span class="nav-text">Forms</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{!! url('/faqForm'); !!}">FAQ</a></li>
				</ul>
			</li> -->
			<!-- <li><a href="{!! url('/paymentConfirmation'); !!}">Payment Confirmation</a></li> -->

			<!-- User Module -->


		</ul>
		<!-- <div class="copyright">
			<p><strong>Admin Dashboard</strong> © 2021 All Rights Reserved</p>
			<p class="fs-12">Made with <span class="heart"></span> by Synet</p>
		</div> -->
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->
