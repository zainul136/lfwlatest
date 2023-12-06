{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-5 editPublicPostTop">
            <h2 class="font-w600 mb-0 text-black">Edit Public Posts</h2>
            <div>
                <button class="white-btn" onclick="history.back()">Back</button>
                <button class="main-btn" type="submit" id="updateButton">Update</button>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-6 w-100">
                <div class="card pb-4">
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Description</h4>
                            <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}"
                                 alt="" title="Delete">
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <p style="color: #1E1E20; font-size: 16px; font-weight: 500;">Post Caption</p>
                        <div class="basic-form d-flex align-items-center">
                            <form id="updateForm" class="w-100" method="post" action="{{ route('public-post-update', $post->id) }}">
                                @csrf
                                <input id="public-post-edit-desc" name="post_content" type="text" class="form-control wide w-100"
                                       value="{{ $post->PostText->post_content }}" disabled>
                            </form>
                            <div class="d-flex " style="gap: 8px;">
                                <a href="#" onclick="function test(){
                                 document.getElementById('public-post-edit-desc').disabled = false;
                                 document.getElementById('public-post-edit-desc').focus();
                             } test();
                             return false;">
                                    <svg class="table-action-tr-first" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 512 512" style="width:20px; fill:#b1e3d8">
                                        <path
                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            @if(isset($post->postVideo) && count([$post->postVideo]) > 0)
                            <h4 class="card-title">Video</h4>
                            <a href="{{url('admins/public-post-videos-delete'.'/'.$post->id.'/'.$post->user_id)}}">
                                <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}" alt="" title="Delete">
                            </a>
                            @endif


                        </div>
                    </div>
                    <div class="card-body py-0 edit-post-video-card">
                        @if(isset($post->postVideo) && count([$post->postVideo]) > 0)
                        <div class="edit-post-video-box">
                            <video controls="controls" preload="metadata">
                                <source src="{{asset($post->postVideo->video_path) ??''}}" type="video/mp4">
                            </video>
                            <input type="checkbox" name="" id=""
                                   class="post-description-remove-icon media-remove-post-icon">
                        </div>
                        @endif

                    </div>
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            @if(isset($post->postImage) && count([$post->postImage]) > 0)
                                <h4 class="card-title">images</h4>
                                <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}"
                                     alt="" title="Delete" onclick="submitDeleteImagesForm()">
                            @endif
                        </div>
                    </div>
                    <div class="card-body py-0 edit-post-img-card">
                        @if(isset($post->postImage) && count([$post->postImage]) > 0)
                            <form id="deleteImagesForm" method="post" action="{{ route('public-post-delete-Images', $post->id) }}">
                                @csrf
                                    <?php
                                    $imagesArray = explode(',',$post->postImage->image_path);
                                    ?>
                                @foreach($imagesArray as $imagePath)
                                    <div class="edit-post-img-box">
                                        <img src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}" />
                                        <input type="text" name="user_id" value="{{$post->user_id }}" class="post-description-remove-icon media-remove-post-icon" hidden="">
                                        <input type="checkbox" name="selectedImages[]" value="{{ $imagePath }}" class="">
                                    </div>
                                @endforeach
                            </form>
                        @endif
                    </div>
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            @if(isset($post->postAudio) && count([$post->postAudio]) > 0)
                                <form id="deleteAudioForm" method="post" action="{{ route('public-post-delete-audio', $post->id) }}">
                                    @csrf
                                        <?php
                                        $audioArray = explode(',',$post->postAudio->audio_path);
                                        ?>
                                <h4 class="card-title">Voice</h4>
                            <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}"
                                 alt="" title="Delete" onclick="submitDeleteAudioForm()">
                            @endif
                        </div>
                    </div>
                    @if(isset($post->postAudio) && count([$post->postAudio]) > 0)
                     @foreach($audioArray as $audioPath)

                    <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                        <input type="checkbox" name="selectedAudio[]" value="{{ $audioPath }}" class="">
                        <audio controls>
                            <source src="{{asset('user_media/' . $post->user_id . '/audios/' . $post->postAudio->audio_path)}}">
                            <input type="text" name="user_id" value="{{$post->user_id }}" class="post-description-remove-icon media-remove-post-icon" hidden="">
                            <input type="checkbox" name="selectedAudio[]" value="{{ $audioPath }}" class="post-description-remove-icon media-remove-post-icon">

                        </audio>
                    </div>
                            @endforeach
                    @endif
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            @if(isset($post->tags) && count($post->tags) > 0)
                            <h4 class="card-title">Tags</h4>
                            <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}"
                                 alt="" title="Delete" onclick="submitDeleteTagForm()">
                            @endif
                        </div>

                    </div>
                    <div class="card-body py-0">
                            @if(isset($post->tags) && count($post->tags) > 0)
                            @csrf
                            @foreach($post->tags as $tag)
                            <form id="deleteTagFrom" method="post" action="{{route('public-post-delete-tag', $post->id)}}" class="d-flex" style="gap: 16px;">
                                @csrf
                                <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">
                                    <input type="text" class="form-control wide " value="{{$tag->name}}" readonly>
                                </div>

                            </form>
                            @endforeach
                            @endif

                    </div>
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            @if(isset($post->postDocument) && count([$post->postDocument]) > 0)
                            <h4 class="card-title">Document</h4>
                                <img class="table-action-tr-second" src="{{ asset('admin/images/fluent_delete-16-regular.svg') }}"
                                     alt="" title="Delete" onclick="submitDeleteDocumentsForm()">
                            @endif
                        </div>
                    </div>
                    @if(isset($post->postDocument) && count([$post->postDocument]) > 0)
                        <form  id="deleteDocumentsForm" method="post" action="{{ route('public-post-delete-documents', $post->id) }} style="gap: 16px;">

                        @csrf
                            <?php
                            $documentsArray = explode(',',$post->postDocument->document_path);
                            ?>


                            @foreach($documentsArray as $documentPath)
                    <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                        <input type="checkbox" name="selectedDocuments[]" value="{{ $documentPath }}" class="">
                        <input type="text" name="user_id" value="{{$post->user_id }}" class="post-description-remove-icon media-remove-post-icon" hidden="">
                        <input type="checkbox" name="selectedDocuments[]" value="{{ $documentPath }}" class="post-description-remove-icon media-remove-post-icon">

                        <a href="{{asset('user_media/' . $post->user_id . '/documents/' . $documentPath)}}">document.pdf</a>
                    </div>
                            @endforeach
                        </form>
                    @endif
                </div>
                </div>
            </div>
        </div>
    <script>
        // Add a click event listener to the "Update" button
        document.getElementById('updateButton').addEventListener('click', function() {
            // Submit the form
            document.getElementById('updateForm').submit();
        });

        // After the form is submitted, redirect to a new URL
        document.getElementById('updateForm').addEventListener('submit', function() {
            window.location.href = 'your_target_url_here';
        });

        function submitDeleteImagesForm() {
            document.getElementById('deleteImagesForm').submit();
        }
        function submitDeleteDocumentsForm() {
            document.getElementById('deleteDocumentsForm').submit();
        }
        function submitDeleteAudioForm() {
            document.getElementById('deleteAudioForm').submit();
        }
        function submitDeleteTagForm() {
            document.getElementById('deleteTagFrom').submit();
        }
    </script>
@endsection