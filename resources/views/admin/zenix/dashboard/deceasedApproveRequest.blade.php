{{-- Extends layout --}}
@extends('admin.layout.default')


{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="form-head d-flex align-items-center flex-wrap mb-sm-5 mb-3">
			<h2 class="font-w600 mb-0 text-black">Requests for Unlock Profile</h2>
			<!-- <a href="javascript:void(0);" class="btn btn-outline-secondary ms-auto"><i class="las la-calendar scale5 me-2"></i>Filter Periode</a> -->
		</div>
		<div class="row request-module-row">
			<div class="col-xl-12">
				<div class="table-responsive table-hover fs-14">
					<table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
						<thead>
						<tr>
							<th>Select</th>
							<th>Deceased Person</th>
							<th>Notified By </th>
							<th>Date of Death</th>
							<th>Place of Death</th>
							<th>Approved Date </th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						@if(isset($deceasePerson))

								<tr>
										<?php
										$confirmation =  json_decode($deceasePerson->confirmations_from);
										$notifyUser = \App\Models\User::query()->where('id','=',$confirmation[0])->first();

										$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$deceasePerson->user->id)->first();
										$profilePicture = isset($userProfileImages->profile_picture) ?
												asset("user_media/{$deceasePerson->user->id}/profile_picture/{$userProfileImages->profile_picture}") :
												asset('storage/assets/images/profile.jpeg');
										?>
									<td><input type="checkbox"></td>
									<td>
										<div class="d-flex align-items-center" style="gap: 8px;">
											<img src="{{$profilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
											<div>
												<p class="mb-0 font-w500">{{$deceasePerson->user->first_name .' '. $deceasePerson->user->last_name ??''}}</p>
												<p class="mb-0" style="font-size: 14px;">{{$deceasePerson->user->email ?? ''}}</p>
											</div>
										</div>
									</td>
									<td>{{$notifyUser->first_name . ' '. $notifyUser->last_name}}</td>

									<td> {{ \Carbon\Carbon::parse($deceasePerson->date_of_death)->format('M j, Y')  ??''}}</td>
									<td>{{$deceasePerson->place_of_death ??''}}</td>
									<td>---</td>
									@if(isset($deceasePerson->recovery_confirmation))
									<td>
										<a href='{{ route("approve-request-person",$deceasePerson->id) }}' class="button-style">Unlock Profile</a>
									</td>
									@endif
								</tr>
						@endif
						@if(isset($deceaseConfirmationChecks) && isset($deceasePersons))
							<!-- Iterate over deceaseConfirmationChecks -->
							@foreach($deceaseConfirmationChecks as $deceaseConfirmationCheck)
								<tr>
									<?php
										$confirmation =  json_decode($deceaseConfirmationCheck->confirmations_from);
                                        $notifyUser = \App\Models\User::query()->where('id','=',$confirmation[0])->first();


										?>
									<td><input type="checkbox"></td>
									<td>
										<div class="d-flex align-items-center" style="gap: 8px;">
											<!-- Display user profile image and information from deceaseConfirmationCheck -->
												<?php
												$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$deceaseConfirmationCheck->user->id)->first();
												$profilePicture = isset($userProfileImages->profile_picture) ? asset("user_media/{$deceaseConfirmationCheck->user->id}/profile_picture/{$userProfileImages->profile_picture}") : asset('storage/assets/images/profile.jpeg');
												?>
											<img src="{{ $profilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
											<div>
												<p class="mb-0 font-w500">{{ $deceaseConfirmationCheck->user->first_name .' '. $deceaseConfirmationCheck->user->last_name ??'' }}</p>
												<p class="mb-0" style="font-size: 14px;">{{ $deceaseConfirmationCheck->user->email ?? '' }}</p>
											</div>
										</div>
									</td>
									<td>{{$notifyUser->first_name . ' '. $notifyUser->last_name}}</td>
									<td> {{ \Carbon\Carbon::parse($deceaseConfirmationCheck->date_of_death)->format('M j, Y')  ??''}}</td>
									<td>{{$deceaseConfirmationCheck->place_of_death ??''}}</td>
									<td>----</td>

									<td>
									<!-- Add more columns as needed -->
									<a href='{{ route("approve-request-person", $deceaseConfirmationCheck->id) }}'
									   class="button-style @if($deceaseConfirmationCheck->confirmation_status == 0) button-disabled @endif">
										@if($deceaseConfirmationCheck->confirmation_status === 0)
											Profile Unlock
										@else
											Unlock Profile
										@endif
									</a>
								</tr>
							@endforeach

							<!-- Iterate over deceasePersons -->
							@foreach($deceasePersons as $deceasePerson)

								<tr>
									<td><input type="checkbox"></td>
									<td>
										<div class="d-flex align-items-center" style="gap: 8px;">
												<?php
												$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$deceasePerson->deathConfirmation->user->id)->first();
												$profilePicture = isset($userProfileImages->profile_picture) ? asset("user_media/{$deceasePerson->deathConfirmation->user->id}/profile_picture/{$userProfileImages->profile_picture}") : asset('storage/assets/images/profile.jpeg');
												$confirmation =  json_decode($deceasePerson->confirmations_from);
												$notifyUser = \App\Models\User::query()->where('id','=',$confirmation[0])->first();

												?>
											<img src="{{ $profilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
											<div>
												<p class="mb-0 font-w500">{{ $deceasePerson->deathConfirmation->user->first_name .' '. $deceasePerson->deathConfirmation->user->last_name ??'' }}</p>
												<p class="mb-0" style="font-size: 14px;">{{ $deceasePerson->deathConfirmation->user->email ?? '' }}</p>
											</div>
										</div>
									</td>
									<td>{{$notifyUser->first_name. ' ' . $notifyUser->last_name}}</td>
									<td> {{ \Carbon\Carbon::parse($deceasePerson->date_of_death)->format('M j, Y')  ??''}}</td>
									<td>{{$deceasePerson->place_of_death ??''}}</td>
									<td style="width: 13%;">
										{{ \Carbon\Carbon::parse($deceasePerson->created_at)->format('M j, Y h:i A') ?? '' }}
									</td>

									<td>
										<a href='{{ route("approve-request-person", $deceasePerson->deathConfirmation->id) }}'
										   class="button-style @if($deceasePerson->deathConfirmation->confirmation_status == 0) button-disabled @endif">
											@if($deceasePerson->deathConfirmation->confirmation_status === 0)
												Profile Unlocked
											@else
												Unlock Profile
											@endif
										</a>
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<style>
		.button-style {
			background-color: #99ddcc;
			color: #fff !important;
			font-size: 10px;
			padding: 8px 28px;
			max-width: 90px;
			border-radius: 12px;
			border: 2px solid #99ddcc;
			transition: all .2s ease-in;
		}

		.button-style:hover {
			background-color: #fff;
			color: #0a0c16 !important;
			border-color: #99ddcc;
		}

		 .button-disabled {
			 pointer-events: none;
			 opacity: 0.5;
		 }

	</style>

	</style>
@endsection
