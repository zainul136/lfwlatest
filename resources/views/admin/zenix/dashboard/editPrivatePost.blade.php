{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="font-w600 mb-0 text-black">Deceased Person Posts</h2>
{{--            <div>--}}
{{--                <button class="white-btn" onclick="history.back()">Back</button>--}}
{{--                <button class="main-btn">Update</button>--}}
{{--            </div>--}}
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-6 w-100">

                <div class="card pb-4">


                    @if(isset($post->PostText))
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Description</h4>

                        </div>
                    </div>
                    <div class="card-body py-0">
                        <p style="color: #1E1E20; font-size: 16px; font-weight: 500;">Post Caption</p>
                        <div class="basic-form d-flex align-items-center">

                            <form class="w-100">
                                <input id="public-post-edit-desc" type="text" class="form-control wide w-100"
                                       value="{{ $post->PostText->post_content }}" disabled>
                            </form>
                            <div class="d-flex " style="gap: 8px;">

                            </div>
                        </div>
                    </div>
                    @endif
                        @if(isset($post->postVideo) && count([$post->postVideo]) > 0)
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Video</h4>
                        </div>
                    </div>
                    <div class="card-body py-0 edit-post-video-card">
                        <div class="edit-post-video-box">
                            <video controls="controls" preload="metadata">
                                <source src="{{asset($post->postVideo->video_path) ??''}}" type="video/mp4">
                            </video>

                        </div>
                    </div>
                        @endif
                        @if(isset($post->postImage) && count([$post->postImage]) > 0)

                        <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">images</h4>
                            <?php
                            $imagesArray = explode(',',$post->postImage->image_path);
                            ?>
                        </div>
                    </div>
                    <div class="card-body py-0 edit-post-img-card">
                        @foreach($imagesArray as $imagePath)
                        <div class="edit-post-img-box">
                            <img  class="table-action-tr-second" src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}" height="300" width="300" />
                        </div>
                        @endforeach
                    </div>
                        @endif
                        @if(isset($post->postAudio) && count([$post->postAudio]) > 0)
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Voice</h4>

                        </div>
                    </div>
                    <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                            <?php
                            $audioArray = explode(',',$post->postAudio->audio_path);
                            ?>
                        @foreach($audioArray as $audioPath)
                        <audio controls>
                            <source src="{{asset('user_media/' . $post->user_id . '/audios/' . $post->postAudio->audio_path)}}">
                        </audio>
                        @endforeach
                    </div>
                        @endif
                        @if(isset($post->tags) && count($post->tags) > 0)
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Tags</h4>

                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="basic-form">
                            <form class="d-flex flex-wrap align-items-center" style="gap: 16px;">
                                @foreach($post->tags as $tag)
                                <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                    <input type="text" class="form-control wide" value="{{$tag->name}}" readonly>
                                </div>
                                @endforeach

                            </form>
                        </div>
                    </div>
                        @endif
                        @if(isset($post->postDocument) && count([$post->postDocument]) > 0)
                    <div class="card-header">
                        <div class="d-flex" style="gap: 24px;">
                            <h4 class="card-title">Document</h4>

                        </div>
                    </div>
                                <?php
                                $documentsArray = explode(',',$post->postDocument->document_path);
                                ?>
                            @foreach($documentsArray as $documentPath)
                    <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                        <a href="{{asset('user_media/' . $post->user_id . '/documents/' . $documentPath)}}">document.pdf</a>
                    </div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection