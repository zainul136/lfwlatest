{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="font-w600 mb-0 text-black">Edit Public Posts</h2>
        <div>
            <button class="white-btn" onclick="history.back()">Back</button>
            <button class="main-btn">Update</button>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 w-100">
            <div class="card pb-4">
                <div class="card-header">
                    <div class="d-flex" style="gap: 24px;">
                        <h4 class="card-title">Description</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0">
                    <p style="color: #1E1E20; font-size: 16px; font-weight: 500;">Post Caption</p>
                    <div class="basic-form d-flex align-items-center">
                        <form class="w-100">
                            <input id="public-post-edit-desc" type="text" class="form-control wide w-100"
                                value="this is the post caption......You can edit this" disabled>
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
                        <h4 class="card-title">Video</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0 edit-post-video-card">
                    <div class="edit-post-video-box">
                        <video controls="controls" preload="metadata">
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4#t=0.1" type="video/mp4">
                        </video>
                        <input type="checkbox" name="" id=""
                            class="post-description-remove-icon media-remove-post-icon">
                    </div>
                </div>
                <div class="card-header">
                    <div class="d-flex" style="gap: 24px;">
                        <h4 class="card-title">images</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0 edit-post-img-card">
                    <div class="edit-post-img-box">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnTw_M9n3y78muADoPccQdUY66i55BLtKCdA&usqp=CAU" />
                        <input type="checkbox" name="" id=""
                            class="post-description-remove-icon media-remove-post-icon">
                    </div>
                    <div class="edit-post-img-box">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnTw_M9n3y78muADoPccQdUY66i55BLtKCdA&usqp=CAU" />
                        <input type="checkbox" name="" id=""
                            class="post-description-remove-icon media-remove-post-icon">
                    </div>
                    <div class="edit-post-img-box">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnTw_M9n3y78muADoPccQdUY66i55BLtKCdA&usqp=CAU" />
                        <input type="checkbox" name="" id=""
                            class="post-description-remove-icon media-remove-post-icon">
                    </div>
                    <div class="edit-post-img-box">
                        <img
                            src=" https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnTw_M9n3y78muADoPccQdUY66i55BLtKCdA&usqp=CAU" />
                        <input type="checkbox" name="" id=""
                            class="post-description-remove-icon media-remove-post-icon">
                    </div>
                </div>
                <div class="card-header">
                    <div class="d-flex" style="gap: 24px;">
                        <h4 class="card-title">Voice</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                    <input type="checkbox" name="" id="">
                    <audio controls>
                        <source
                            src="https://soundcloud.com/user-276538827/sets/random-audio-clips?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing">
                    </audio>
                </div>
                <div class="card-header">
                    <div class="d-flex" style="gap: 24px;">
                        <h4 class="card-title">Tags</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="basic-form">
                        <form class="d-flex flex-wrap align-items-center" style="gap: 16px;">
                            <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                <input type="checkbox" name="" id="">
                                <input type="text" class="form-control wide " value="Mark Thomas">
                            </div>
                            <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                <input type="checkbox" name="" id="">
                                <input type="text" class="form-control wide" value="Alex Kataev">
                            </div>
                            <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                <input type="checkbox" name="" id="">
                                <input type="text" class="form-control wide" value="Julian Velez">
                            </div>
                            <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                <input type="checkbox" name="" id="">
                                <input type="text" class="form-control wide" value="Anderson">
                            </div>
                            <div class="d-flex align-items-center" style="gap: 8px; width: 220px;">
                                <input type="checkbox" name="" id="">
                                <input type="text" class="form-control wide" value="Mads Brodt">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header">
                    <div class="d-flex" style="gap: 24px;">
                        <h4 class="card-title">Document</h4>
                        <img class="table-action-tr-second" src="{{ asset('images/fluent_delete-16-regular.svg') }}"
                            alt="" title="Delete">
                    </div>
                </div>
                <div class="card-body py-0 d-flex align-items-center" style="gap: 16px;">
                    <input type="checkbox" name="" id="">
                    <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf">document.pdf</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection