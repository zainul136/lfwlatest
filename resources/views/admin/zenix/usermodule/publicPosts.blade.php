{{-- Extends layout --}}
@extends('admin.layout.default')
<!-- Include Bootstrap JS from a CDN -->
{{-- Content --}}
@section('content')
<div class="container-fluid">
    <!-- The Modal -->
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-head d-flex align-items-center flex-wrap justify-content-between mb-sm-5 mb-3">
        <h2 class="font-w600 mb-0 text-black">Public Posts</h2>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive table-hover fs-14 bg-white">
                <div class="table-before-first">
                    <div class="search-bar-container">
                        <img class="input-search-icon" src="{{ asset('images/search.png') }}" alt="">
                        <input id="public-post-search-input" class="form-control input-search-bar" type="text" placeholder="Search for Post">
                    </div>
                </div>
                <table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>User</th>
                            <th>Post Type</th>
                            <th style="min-width: 144px !important;">Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="user-info-tbody">
                    @if(isset($posts))
                        @foreach($posts as $post)
                                <?php
                                $userProfileImages = \App\Models\UserInformation::query()->where('user_id','=',$post->user->id)->first();
                                $profilePicture = isset($userProfileImages->profile_picture) ?
                                    asset("user_media/{$post->user->id}/profile_picture/{$userProfileImages->profile_picture}") :
                                    asset('storage/assets/images/profile.jpeg');
                                ?>
                                <tr data-post-id="{{ $post->id }}" class="table-row">
                                <td><input type="checkbox"></td>
                                <td>
                                    <div class="d-flex align-items-center" style="gap: 8px;">
                                        <img src="{{$profilePicture}}" alt="" width="40" height="40" style="border-radius: 50%">
                                        <div>
                                            <p class="mb-0 font-w500">{{$post->user->first_name .' '.$post->user->last_name ??''}} </p>
                                            <p class="mb-0" style="font-size: 14px;">{{$post->user->email ??''}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="padding: 10px 10px; width: 130px; color: #0373A4; background-color: rgba(3, 115, 164, 0.24); border-radius: 24px; text-align: center;">
                                        {{$post->post_type ??''}}
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('M j, Y h:i A') }}</td>

                                <td class="table-action-tr">
                                    <a href="#" class="text-black font-w600 post-content-view-btn" id="post-content-view-btn" data-userid="{{$post->id}}">
                                        <svg class="table-action-tr-first post-content-view-btn"  id="post-content-view-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                        </svg>
                                    </a>
                                    <a href="{{route('edit-public-posts',$post->id)}}"  data-post-id="{{$post->id}}">
                                        <svg class="table-action-tr-first" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="#" id="{{$post->id}}" data-post-id="{{ $post->id }}">
                                        <svg class="table-action-tr-second remove remove-user-info" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.47559 3.37508H10.7256C10.7256 3.07671 10.6071 2.79056 10.3961 2.57958C10.1851 2.3686 9.89896 2.25008 9.60059 2.25008C9.30222 2.25008 9.01607 2.3686 8.80509 2.57958C8.59411 2.79056 8.47559 3.07671 8.47559 3.37508ZM7.35059 3.37508C7.35059 2.77834 7.58764 2.20604 8.0096 1.78409C8.43155 1.36213 9.00385 1.12508 9.60059 1.12508C10.1973 1.12508 10.7696 1.36213 11.1916 1.78409C11.6135 2.20604 11.8506 2.77834 11.8506 3.37508H16.3506C16.4998 3.37508 16.6428 3.43434 16.7483 3.53983C16.8538 3.64532 16.9131 3.78839 16.9131 3.93758C16.9131 4.08676 16.8538 4.22983 16.7483 4.33532C16.6428 4.44081 16.4998 4.50008 16.3506 4.50008H15.7161L14.3605 14.4428C14.2685 15.1166 13.9356 15.7343 13.4232 16.1815C12.9109 16.6287 12.2539 16.8751 11.5738 16.8751H7.62734C6.94729 16.8751 6.29028 16.6287 5.77795 16.1815C5.26561 15.7343 4.93265 15.1166 4.84071 14.4428L3.48509 4.50008H2.85059C2.7014 4.50008 2.55833 4.44081 2.45284 4.33532C2.34735 4.22983 2.28809 4.08676 2.28809 3.93758C2.28809 3.78839 2.34735 3.64532 2.45284 3.53983C2.55833 3.43434 2.7014 3.37508 2.85059 3.37508H7.35059ZM8.47559 7.31258C8.47559 7.16339 8.41632 7.02032 8.31083 6.91483C8.20534 6.80934 8.06227 6.75008 7.91309 6.75008C7.7639 6.75008 7.62083 6.80934 7.51534 6.91483C7.40985 7.02032 7.35059 7.16339 7.35059 7.31258V12.9376C7.35059 13.0868 7.40985 13.2298 7.51534 13.3353C7.62083 13.4408 7.7639 13.5001 7.91309 13.5001C8.06227 13.5001 8.20534 13.4408 8.31083 13.3353C8.41632 13.2298 8.47559 13.0868 8.47559 12.9376V7.31258ZM11.2881 6.75008C11.4373 6.75008 11.5803 6.80934 11.6858 6.91483C11.7913 7.02032 11.8506 7.16339 11.8506 7.31258V12.9376C11.8506 13.0868 11.7913 13.2298 11.6858 13.3353C11.5803 13.4408 11.4373 13.5001 11.2881 13.5001C11.1389 13.5001 10.9958 13.4408 10.8903 13.3353C10.7848 13.2298 10.7256 13.0868 10.7256 12.9376V7.31258C10.7256 7.16339 10.7848 7.02032 10.8903 6.91483C10.9958 6.80934 11.1389 6.75008 11.2881 6.75008ZM5.95559 14.291C6.0108 14.6952 6.21056 15.0657 6.51791 15.3339C6.82526 15.6022 7.21938 15.75 7.62734 15.7501H11.5738C11.982 15.7503 12.3764 15.6026 12.684 15.3343C12.9915 15.066 13.1915 14.6953 13.2467 14.291L14.581 4.50008H4.62021L5.95559 14.291Z" fill="#DE2F08" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                                <div id="public-post-modal-{{ $post->id }}" class="modal-box">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div style="display: flex; justify-content: space-between;   align-items: center;">
                                            <h4>Post Content</h4>
                                            <span class="close message-modal-close">&times;</span>
                                        </div>
                                        <div class="modal-content-first">
                                            <p>{{$post->PostText->post_content ??''}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="user-info-modal" class="modal-box">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-content-first">
                                            <p>Are You Sure You Want To Delete <strong> {{ $post->postText->post_content ??'' }}</strong></p>
                                        </div>
                                        <div class="modal-cancwl-del-container">
                                            <button class="modal-cancel-btn remove-user-info-close">Cancel</button>
                                            <form action="{{ route('post-delete', ['post' => $post->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="modal-del-btn">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            var $searchInput = $("#public-post-search-input");

            $searchInput.on("input", function () {
                var searchTerm = $searchInput.val().toLowerCase();

                // Loop through each table row
                $("#user-info-tbody tr").each(function () {
                    var $row = $(this);
                    var rowText = $row.text().toLowerCase();

                    // Show or hide the row based on whether it contains the search term
                    $row.toggle(rowText.includes(searchTerm));
                });
            });
        });
    </script>
    <script>


        const rows = document.querySelectorAll('.table-row');
        const messageModal = document.getElementById('public-post-modal');
        const userInfoModal = document.getElementById('user-info-modal');

        document.querySelectorAll('.message-modal-close').forEach(closeIcon => {
            closeIcon.addEventListener('click', function () {
                const modal = closeIcon.closest('.modal-box');
                modal.parentNode.removeChild(modal);
            });
        });

        $(document).ready(function () {
                setTimeout(function () {
                    $("#success-alert").alert('close');
                }, 5000);

                // You can also close the alert when the user clicks on it
                $("#success-alert").on('closed.bs.alert', function () {
                    // Perform any additional actions when the alert is closed.
                });
            });
    </script>
</script>
@push('scripts')
@endpush

@endsection