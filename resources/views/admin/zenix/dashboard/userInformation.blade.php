{{-- Extends layout --}}
@extends('admin.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <!-- The Remove User Modal -->
        <div class="form-head d-flex align-items-center flex-wrap justify-content-between mb-sm-5 mb-3">
            <h2 class="font-w600 mb-0 text-black">User Information</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive table-hover fs-14 bg-white">
                    <div class="table-before-first">
                        <div class="search-bar-container">
                            <img class="input-search-icon" src="{{ asset('images/search.png') }}" alt="">
                            <input id="user-search-input" class="form-control input-search-bar" type="text" placeholder="Search for users">
                        </div>

                        <div class="table-before-btn-container position-relative">
                            <div class="user-info-filter-modal position-absolute bg-white" style="border-radius:15px; padding: 24px 32px; top: 56px;  right: 0; border: 1px solid rgba(153, 153, 153, 0.46); display: none;">
                                <p class="font-w500 main-black mb-2">User ID</p>
                                <input class="w-100" type="text" id="" style="height: 46px; padding: 5px; border-radius: 15px; border: 1px solid rgba(153, 153, 153, 0.46);">
                                <div class="mt-4" style="display: flex; gap: 10px;">
                                    <button class="white-btn user-info-filter-cancel-btn" style="padding: 13px 36px;">Cancel</button>
                                    <button class="main-btn" style="padding: 13px 36px;">Save</button>
                                </div>
                            </div>
                            <a href="#" class="user-info-filter-btn">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 0H14.0002C15.3981 0 16.5727 0.95608 16.9057 2.25H19.0002C19.4145 2.25 19.7502 2.58579 19.7502 3C19.7502 3.41421 19.4145 3.75 19.0002 3.75H16.9057C16.5727 5.04392 15.3981 6 14.0002 6H12.0002C10.3434 6 9.00024 4.65685 9.00024 3C9.00024 1.34315 10.3434 0 12.0002 0ZM1 2.25C0.585786 2.25 0.25 2.58579 0.25 3C0.25 3.41421 0.585786 3.75 1 3.75H6C6.41421 3.75 6.75 3.41421 6.75 3C6.75 2.58579 6.41421 2.25 6 2.25H1ZM13.9998 10.25C13.5855 10.25 13.2498 10.5858 13.2498 11C13.2498 11.4142 13.5855 11.75 13.9998 11.75H18.9998C19.414 11.75 19.7498 11.4142 19.7498 11C19.7498 10.5858 19.414 10.25 18.9998 10.25H13.9998ZM8 8.00002H6C4.60212 8.00002 3.42755 8.95609 3.09451 10.25H1C0.585786 10.25 0.25 10.5858 0.25 11C0.25 11.4142 0.585786 11.75 1 11.75H3.09451C3.42755 13.0439 4.60212 14 6 14H8C9.65685 14 11 12.6569 11 11C11 9.34316 9.65685 8.00002 8 8.00002Z" fill="#292929" />
                                </svg>
                                Filter
                            </a>
                            <button class="btn btn-primary">Delete</button>

                        </div>
                    </div>
                    <table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
                        <thead>
                        <tr>
                            <th>Select</th>
                            <th>User</th>
                            <th>Gender</th>
                            <th style="min-width: 150px !important;">Date of birth</th>
                            <th style="min-width: 150px !important;">Phone Number</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody id="user-info-tbody">
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
                                <td>
                                    @if($item->active_status == '0')
                                        <div class="active-decease-status status-active">Active</div>
                                    @elseif($item->active_status == '1')
                                        <div class="active-decease-status status-decease">Deceased</div>
                                    @else
                                        <div class="active-decease-status modal-trigger status-deleted" data-user="{{ $item->id }}">Deleted</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-action-tr">
                                        <a href="#" class="user-info-edit-btn" id="user-info-edit-btn"  data-userid="{{$item->id}}">
                                            <svg class="table-action-tr-first" width="15" height="14" viewBox="0 0 15 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <a href="#">
                                            <svg class="table-action-tr-second remove remove-user-info" data-userid="{{$item->id}}" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.47559 3.37508H10.7256C10.7256 3.07671 10.6071 2.79056 10.3961 2.57958C10.1851 2.3686 9.89896 2.25008 9.60059 2.25008C9.30222 2.25008 9.01607 2.3686 8.80509 2.57958C8.59411 2.79056 8.47559 3.07671 8.47559 3.37508ZM7.35059 3.37508C7.35059 2.77834 7.58764 2.20604 8.0096 1.78409C8.43155 1.36213 9.00385 1.12508 9.60059 1.12508C10.1973 1.12508 10.7696 1.36213 11.1916 1.78409C11.6135 2.20604 11.8506 2.77834 11.8506 3.37508H16.3506C16.4998 3.37508 16.6428 3.43434 16.7483 3.53983C16.8538 3.64532 16.9131 3.78839 16.9131 3.93758C16.9131 4.08676 16.8538 4.22983 16.7483 4.33532C16.6428 4.44081 16.4998 4.50008 16.3506 4.50008H15.7161L14.3605 14.4428C14.2685 15.1166 13.9356 15.7343 13.4232 16.1815C12.9109 16.6287 12.2539 16.8751 11.5738 16.8751H7.62734C6.94729 16.8751 6.29028 16.6287 5.77795 16.1815C5.26561 15.7343 4.93265 15.1166 4.84071 14.4428L3.48509 4.50008H2.85059C2.7014 4.50008 2.55833 4.44081 2.45284 4.33532C2.34735 4.22983 2.28809 4.08676 2.28809 3.93758C2.28809 3.78839 2.34735 3.64532 2.45284 3.53983C2.55833 3.43434 2.7014 3.37508 2.85059 3.37508H7.35059ZM8.47559 7.31258C8.47559 7.16339 8.41632 7.02032 8.31083 6.91483C8.20534 6.80934 8.06227 6.75008 7.91309 6.75008C7.7639 6.75008 7.62083 6.80934 7.51534 6.91483C7.40985 7.02032 7.35059 7.16339 7.35059 7.31258V12.9376C7.35059 13.0868 7.40985 13.2298 7.51534 13.3353C7.62083 13.4408 7.7639 13.5001 7.91309 13.5001C8.06227 13.5001 8.20534 13.4408 8.31083 13.3353C8.41632 13.2298 8.47559 13.0868 8.47559 12.9376V7.31258ZM11.2881 6.75008C11.4373 6.75008 11.5803 6.80934 11.6858 6.91483C11.7913 7.02032 11.8506 7.16339 11.8506 7.31258V12.9376C11.8506 13.0868 11.7913 13.2298 11.6858 13.3353C11.5803 13.4408 11.4373 13.5001 11.2881 13.5001C11.1389 13.5001 10.9958 13.4408 10.8903 13.3353C10.7848 13.2298 10.7256 13.0868 10.7256 12.9376V7.31258C10.7256 7.16339 10.7848 7.02032 10.8903 6.91483C10.9958 6.80934 11.1389 6.75008 11.2881 6.75008ZM5.95559 14.291C6.0108 14.6952 6.21056 15.0657 6.51791 15.3339C6.82526 15.6022 7.21938 15.75 7.62734 15.7501H11.5738C11.982 15.7503 12.3764 15.6026 12.684 15.3343C12.9915 15.066 13.1915 14.6953 13.2467 14.291L14.581 4.50008H4.62021L5.95559 14.291Z" fill="#DE2F08" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <!-- The Edit User Modal -->

                                <div id="user-info-edit-modal-{{ $item->id }}" class="modal-box user-info-edit-modal "   >
                                    <form action="{{route('update-user-record')}}" method="post">
                                        <input type="text" name="user_id" value="{{$item->id}}" hidden="">
                                        @csrf
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-content-first mt-6">
                                            <p class="main-black" style="font-size: 18px;">Edit User Info</p>
                                            <!-- <span class="close">&times;</span> -->
                                            <svg class="close-edit-info-btn close-edit-button" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
                                                <path d="M14 27C21.1797 27 27 21.1797 27 14C27 6.8203 21.1797 1 14 1C6.8203 1 1 6.8203 1 14C1 21.1797 6.8203 27 14 27Z" stroke="#99DDCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.875 9L18.625 18.75M18.625 9L8.875 18.75" class="close-edit-button" stroke="#99DDCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </div>
                                        <div class="mt-4 px-3">
                                            <p class="main-black mb-0">First Name</p>
                                            <div class="d-flex align-items-center" style="gap: 16px;">
                                                <input type="text" name="first_name" class="w-100" id="" value="{{ $item->first_name  ??''}}" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">
                                                <svg class="edit-first-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="main-black mb-0">Last Name</p>
                                            <div class="d-flex align-items-center" style="gap: 16px;">
                                                <input type="text" name="last_name" class="w-100" id="" value="{{ $item->last_name  ??''}}" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">
                                                <svg class="edit-last-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="main-black mb-0">Email</p>
                                            <div class="d-flex align-items-center" style="gap: 16px;">
                                                <input type="email" name="email" class="w-100" id="" value="{{ $item->email ?? '' }}" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">
                                                <svg class="edit-last-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="main-black mb-0">Country</p>
                                            <div class="d-flex align-items-center" style="gap: 16px;">
                                                <select class="form-select w-100 bg-white" id="country" name="country" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">

                                                    @foreach($countries = \App\Models\Country::all() as $country)
                                                        @php
                                                            $selected = optional($item->userInformation)->country === $country->code ? 'selected' : '';
                                                        @endphp
                                                        <option value="{{ $country->code }}" {{ $selected }}>{{ $country->name }}</option>
                                                    @endforeach



                                                </select>
                                                <svg class="edit-last-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="main-black mb-0">Date of Birth</p>
                                            <div class="d-flex align-items-center" style="gap: 16px;">
                                                <input type="date"  name="date_of_birth" value="{{ $item->userInformation->date_of_birth ??'' }}" class="w-100" id="" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">
                                                <svg class="edit-last-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
{{--                                            <div class="d-flex" style="align-items: center; gap: 16px;">--}}
{{--                                                <input type="checkbox" name="" id="">--}}
{{--                                                <p class="mb-0">If Deceased</p>--}}
{{--                                            </div>--}}
{{--                                            <p>Date of Death</p>--}}
{{--                                            <div class="d-flex align-items-center" style="gap: 16px;">--}}
{{--                                                <input type="date" class="w-100" id="" style="border:1px solid rgba(153, 153, 153, 0.7); border-radius: 15px; padding: 12px 20px; font-size: 14px;">--}}
{{--                                                <svg class="edit-last-name-btn" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
                                        </div>
                                        <!-- <button class="modal-cancel-btn remove-user-info-close">Cancel</button> -->
                                        <div class="d-flex justify-content-end mt-3 m">
                                            <button class="main-btn" type="submit">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>


                                <div id="user-info-modal-{{ $item->id }}" class="modal-box">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-content-first">
                                            <p>Are You Sure You Want To Delete <strong>{{ $item->first_name }} {{ $item->last_name }}</strong>?</p>
                                            <!-- <span class="close">&times;</span> -->
                                        </div>
                                        <div class="modal-cancwl-del-container">
                                            <button class="modal-cancel-btn remove-user-info-close">Cancel</button>
                                            <form action="{{ route('delete-user', ['user' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="modal-del-btn">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- script for testing -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Get the input element and the table body
            var $searchInput = $("#user-search-input");
            var $tableBody = $("#user-info-tbody");
            console.log($searchInput)

            $searchInput.on("input", function () {
                var searchTerm = $searchInput.val().toLowerCase();

                // Loop through each row in the table
                $tableBody.find("tr").each(function () {
                    var $row = $(this);
                    var rowData = $row.text().toLowerCase();

                    // Show or hide the row based on whether it matches the search term
                    if (rowData.includes(searchTerm)) {
                        $row.show();
                    } else {
                        $row.hide();
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            // Trigger the modal and populate user information when the "Deleted" div is clicked
            document.querySelectorAll('.modal-trigger').forEach(div => {
                div.addEventListener('click', function () {
                    const userId = this.dataset.user;
                    const user = document.getElementById(`user-${userId}`);
                    document.getElementById('user-name').textContent = user.querySelector('.user-name').textContent;
                    document.getElementById('delete-form').action = `/users/${userId}`;
                    document.getElementById('user-info-modal').style.display = 'block';
                });
            });

            // Close the modal when the "Cancel" button is clicked
            document.querySelectorAll('.remove-user-info-close').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('user-info-modal').style.display = 'none';
                });
            });
        });

        $(document).on("click", "#user-info-edit-btn", function () {
            var modelId = $(this).data("id");
            let userEditInfoModal = document.getElementById("user-info-edit-modal");
            userEditInfoModal.style.display = "block";
        })
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('close-edit-button')) {
                event.target.parentElement.parentElement.parentElement.style.display = 'none';
            }
        });

        var currentDate = new Date().toISOString().split('T')[0];

        // Set the minimum value for the input field to the current date
        $('input[name="date_of_birth"]').attr('min', '1900-01-01'); // Adjust the minimum date as needed

        // Set the maximum value for the input field to the current date
        $('input[name="date_of_birth"]').attr('max', currentDate);

        // Add an event handler to handle date changes
        $('input[name="date_of_birth"]').on('input', function() {
            var selectedDate = $(this).val();

            // Check if the selected date is today or a future date
            if (selectedDate > currentDate) {
                // If it's a future date, set the input value to the current date
                $(this).val(currentDate);
            }
        });

    </script>


    @push('scripts')
        <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
        </script>
    @endpush
@endsection