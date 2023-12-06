{{-- Extends layout --}}
@extends('admin.layout.default')


{{-- Content --}}
@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="col-xl-12">
			<div class="table-responsive table-hover fs-14 bg-white">
				<div class="table-before-first">
					<div class="search-bar-container">
						<img class="input-search-icon" src="{{ asset('images/search.png') }}" alt="">
						<input class="input-search-bar" type="text" class="form-control  user-search-bar" placeholder="search for users">
					</div>
					<div class="table-before-btn-container position-relative">
						<div class="deleted-user-filter-modal position-absolute bg-white" style="border-radius:15px; padding: 24px 32px; top: 56px;  right: 0; border: 1px solid rgba(153, 153, 153, 0.46); display: none;">
							<p class="font-w500 main-black mb-2">User ID</p>
							<input class="w-100" type="text" id="" style="height: 46px; padding: 5px; border-radius: 15px; border: 1px solid rgba(153, 153, 153, 0.46);">
							<div class="mt-4" style="display: flex; gap: 10px;">
								<button class="white-btn deleted-user-filter-cancel-btn" style="padding: 13px 36px;">Cancel</button>
								<button class="main-btn" style="padding: 13px 36px;">Save</button>
							</div>
						</div>
						<a href="#" class="deleted-user-filter-btn">
							<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 0H14.0002C15.3981 0 16.5727 0.95608 16.9057 2.25H19.0002C19.4145 2.25 19.7502 2.58579 19.7502 3C19.7502 3.41421 19.4145 3.75 19.0002 3.75H16.9057C16.5727 5.04392 15.3981 6 14.0002 6H12.0002C10.3434 6 9.00024 4.65685 9.00024 3C9.00024 1.34315 10.3434 0 12.0002 0ZM1 2.25C0.585786 2.25 0.25 2.58579 0.25 3C0.25 3.41421 0.585786 3.75 1 3.75H6C6.41421 3.75 6.75 3.41421 6.75 3C6.75 2.58579 6.41421 2.25 6 2.25H1ZM13.9998 10.25C13.5855 10.25 13.2498 10.5858 13.2498 11C13.2498 11.4142 13.5855 11.75 13.9998 11.75H18.9998C19.414 11.75 19.7498 11.4142 19.7498 11C19.7498 10.5858 19.414 10.25 18.9998 10.25H13.9998ZM8 8.00002H6C4.60212 8.00002 3.42755 8.95609 3.09451 10.25H1C0.585786 10.25 0.25 10.5858 0.25 11C0.25 11.4142 0.585786 11.75 1 11.75H3.09451C3.42755 13.0439 4.60212 14 6 14H8C9.65685 14 11 12.6569 11 11C11 9.34316 9.65685 8.00002 8 8.00002Z" fill="#292929" />
							</svg>
							Filter</a>
						<button class="btn btn-primary" style="background-color: #DEE1E5;">Restore</button>
						<button class="btn btn-primary">Delete</button>
					</div>
				</div>
				<table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
					<thead>
						<tr>
							<th>Select</th>
							<th>User</th>
							<th>Gender</th>
							<th style="min-width: 100px !important;">Date of Birth</th>
							<th style="min-width: 115px !important;">Phone Number</th>
							<th>City</th>
							<th>Country</th>
							<th style="min-width: 123px !important;">Date of Deletion</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach($users as $item)
							<?php
							$userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$item->id)->first();
							$profilePicture = isset($userProfileImages->profile_picture) ?
									asset("user_media/{$item->id}/profile_picture/{$userProfileImages->profile_picture}") :
									asset('storage/assets/images/profile.jpeg');
							?>
						<tr>
							<td><input type="checkbox"></td>
							<td>
								<div class="d-flex align-items-center" style="gap: 8px;">
									<img src="{{$profilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
									<div>
										<p class="mb-0 font-w500">{{ $item->first_name}}</p>
										<p class="mb-0" style="font-size: 14px;">{{$item->email}}</p>
									</div>
								</div>
							</td>
							<td>{{$item->user_information ? $item->user_information->gender : 'Not Yet Set User info '}}</td>
							<td>{{$item->user_information ? $item->user_information->date_of_birth : 'Not Yet Set User info '}}</td>
							<td>{{$item->user_information ? $item->user_information->phone_number : 'Not Yet Set User info '}}</td>
							<td>{{$item->user_information ? $item->user_information->city : 'Not Yet Set User info '}}</td>
							<td>{{$item->user_information ? $item->user_information->country : 'Not Yet Set User info '}}</td>
							<td>{{$item->deleted_at ??''}}</td>
							<td>
								<div class="table-action-tr">
									<!-- <img class="table-action-tr-first"  alt=""
										title="Restore"> -->
									<a class="btn btn-danger" href="{{ route('permanent-delete-user', $item->id) }}">
										Delete
									</a>
									<a href="#">
										<img class="table-action-tr-second restore-user" data-user-id="{{ $item->id }}" src="{{ asset('admin/images/restore.svg') }}" alt="" title="Restore">
									</a>
								</div>
							</td>
						</tr>
							<div id="permanent-delete-modal1" class="modal-box">
								<!-- Modal content -->
								<div class="modal-content">
									<div class="modal-content-first">
										<p>Are you sure you want to permanently delete <strong>{{ $item->first_name }} {{ $item->last_name }}</strong>?</p>
									</div>
									<div class="modal-cancel-del-container">
										<button class="modal-cancel-btn btn btn-secondary permanent-delete-user-close">Cancel</button>
										<form action="{{ route('permanent-delete-user', $item->id) }}" method="POST">
											@csrf
											<button type="submit" class="btn btn-danger  text-white modal-del-btn">Permanent Delete</button>
										</form>
									</div>
								</div>
							</div>

							<div id="delete-modal" class="modal-box">
								<!-- Modal content -->
								<div class="modal-content">
									<div class="modal-content-first">
										<p>Are you sure you want to restore <strong>{{ $item->first_name }} {{ $item->last_name }}</strong>?</p>
									</div>
									<div class="modal-cancwl-del-container">
										<button class="modal-cancel-btn delete-user-close">Cancel</button>
										<form action="{{ route('restoreUser', ['user' => $item->id]) }}" method="POST">
											@csrf
											@method('GET')
											<button type="submit" class="modal-del-btn">Restore</button>
										</form>
									</div>
								</div>
							</div>

					@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const restoreButtons = document.querySelectorAll('.restore-user');
		const permanentDeleteButtons = document.querySelectorAll('.del-user-permanent');
		const deleteModal = document.getElementById('delete-modal');
		const permanentDeleteModal = document.getElementById('permanent-delete-modal1');

		restoreButtons.forEach(button => {
			button.addEventListener('click', function () {
				deleteModal.style.display = 'block';
			});
		});

		permanentDeleteButtons.forEach(button => {
			button.addEventListener('click', function () {
				permanentDeleteModal.style.display = 'block';
			});
		});

		// Close the modals when clicking the "Cancel" button
		const cancelBtn = document.querySelector('.delete-user-close');
		const permanentDeleteCancelBtn = document.querySelector('.permanent-delete-user-close');

		cancelBtn.addEventListener('click', function () {
			deleteModal.style.display = 'none';
		});

		permanentDeleteCancelBtn.addEventListener('click', function () {
			permanentDeleteModal.style.display = 'none';
		});
	});
</script>


@endsection