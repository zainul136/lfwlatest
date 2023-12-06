<!--**********************************
    Chat box start
***********************************-->

<!--**********************************
    Chat box End
***********************************-->
<style>
	.header {
		/* background-color: red */
	}
	.pulse-css1 {
		content: '';
		width: 1rem;
		height: 1rem;
		border-radius: 0.5rem;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: -0.2rem;
		color: #b1e3d8 !important;
		 background-color: #b1e3d812 !important;
		margin: auto;
		-webkit-transform: scale(0.3);
		transform: scale(0.3);
		-webkit-transform-origin: center center;
		transform-origin: center center;
		-webkit-animation: pulse-me 3s linear infinite;
		animation: pulse-me 3s linear infinite;
	}
</style>

<?php
$user  = \Illuminate\Support\Facades\Auth::user();
$userInformation = $user->userInformation;
$age = optional($userInformation)->date_of_birth
		? \Carbon\Carbon::parse($userInformation->date_of_birth)->age
		: "";

?>

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
					<!-- <div class="input-group search-area right d-lg-inline-flex d-none">
						<input type="text" class="form-control" placeholder="Find something here...">
						<div class="input-group-append">
							<span class="input-group-text">
								<a href="javascript:void(0)">
									<i class="flaticon-381-search-2"></i>
								</a>
							</span>
						</div>
					</div> -->
                </div>
                <ul class="navbar-nav header-right main-notification">
					<li class="nav-item dropdown notification_dropdown">Admin
						<a class="nav-link bell " href="{{route('home')}}" id="themeToggle">
							<i id="icon-light" class="fas fa-toggle-on"></i>

						</a>
					</li>
					<!-- <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-theme-mode" href="#">
							<i id="icon-light" class="fas fa-sun"></i>
                           <i id="icon-dark" class="fas fa-moon"></i>
                        </a>
					</li> -->
					<!-- <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-fullscreen" href="#">
                            <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                            <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                        </a>
					</li> -->

					<?php
					$notifications = \App\Models\DeathConfirmation::query()
							->where('is_alive', 0)
							->whereNotNull('recovery_confirmation')
							->where('confirmation_status', 1)
							->get();
				    $count =	$notifications->count();

                    ?>
					<li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                           <svg class="bell-icon" width="24" height="24" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#EB8153"/>
							</svg>
							@if (isset($count) && $count > 0)
							<div style="background: #b1e3d8; color: white; font-size: 12px; border-radius: 50%; margin-top: -90% ; margin-left: 60%; width: 20px; height: 20px; display: flex; justify-content: center; align-items: center;">
									{{ $count }}
							</div>
							@endif


						</a>
						<div class="dropdown-menu dropdown-menu-end">
                            <div id="dlab_W_Notification1" class="widget-media dz-scroll p-3 height380">
								<ul class="timeline">

									<li>
										@if(isset($notifications))
											@foreach($notifications as $notification)
												<?php
												$user = \App\Models\User::query()->where('id','=',$notification->user_id)->first();
												?>
												<a href="{{route('details-notification-decease-person',$notification->id)}}" style="text-decoration: none; color: #000">
													<div class="timeline-panel">
														<div class="media me-2">
															<img width="50" src="
                                                @if (isset($user->user_information->profile_picture))
                                                {{ asset('user_media/' . $user->id . '/profile_picture/' . $user->userInformation->profile_picture) }}
                                                @else
                                                    {{ asset('storage/assets/images/profile.jpeg') }} @endif"
																 class="girl postProfileIcon"/>
														</div>
														<div class="media-body">
															<h6 class="mb-1">{{$user->first_name . ' '. $user->last_name }}</h6>
															<p style="font-size: 9px;">Requests for Profile Recovery that is Temporary Locked for Reason:</p>
															<p style="font-size: 9px; margin-top:-13px; ">
																	<?php
																	$recoveryConfirmation = $notification->recovery_confirmation;

																	// Check if the string has more than 10 words
																	$words = explode(' ', $recoveryConfirmation);
																	$trimmedText = implode(' ', array_slice($words, 0, 15));

																	// Display the trimmed text with ellipsis if necessary
																	echo $trimmedText;

																	if (count($words) > 10) {
																		echo '...';
																	}
																	?>
															</p>
															<small style="font-size: 10px;" class="d-block"> <strong>{{ \Carbon\Carbon::parse($notification->created_at)->format('d F Y-h:i A') }}</strong></small>
														</div>
													</div>
												</a>
												<hr>

											@endforeach
										@endif
									</li>

								</ul>
							</div>
{{--                            <a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>--}}
                        </div>
					</li>
					
					
						<div class="dropdown-menu dropdown-menu-end p-3">
							<div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
								
							</div>
						</div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
							<?php

							$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$user->id)->first();
							$profilePicture = isset($userProfileImages->profile_picture) ?
									asset("user_media/{$user->id}/profile_picture/{$userProfileImages->profile_picture}") :
									asset('storage/assets/images/profile.jpeg');
							?>
                            <img src="{{ $profilePicture }}" width="20" alt=""/>
							<div class="header-info">
								<span>{{auth()->user()->first_name}}</span>
								<small>Super Admin</small>
							</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{route('app-profile')}}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ms-2">Profile </span>
                            </a>
                            
                            <a href="{{ route('logout')}}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
		<div class="sub-header">
			<div class="d-flex align-items-center flex-wrap me-auto">
				<h5 class="dashboard_bar">
					 @yield('title', $page_title ?? '')
				</h5>
			</div>
		</div>
	</div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->