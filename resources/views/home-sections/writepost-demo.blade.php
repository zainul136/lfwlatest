<form action="{{ route('post') }}" method="POST" enctype="multipart/form-data" id="post-form">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content post-section p-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Write Something</h1>
                    <button type="button" class="btn-close" onclick="CloseModal(event, false)" id="closeModal"
                        aria-label="Close" data-bs-target="#exampleModal"></button>
                </div>
                <div class="modal-body position-relative">
                    <div id="viewImg" class="viewImg position-absolute left-0"><button
                            onclick="ViewImg('asdasd', false)" class="btn btn-primary">X</button><img src=""
                            alt=""></div>
                    <div class="d-flex first align-items-center">
                            @if (isset($data['user_information']->profile_picture))
                            <img src="{{ asset('profile_pictures') }}/{{ $data['user_information']->profile_picture }}"
                                style="width: 40px; height: 40px; border-radius: 100%;" />
                            @else
                            <img src="{{ asset('storage/assets/images/profile.jpeg') }}"
                                style="width: 40px; height: 40px; border-radius: 100%;" />
                            @endif
                        <div class="d-flex justify-content-start align-items-start flex-column">
                            <p class="mb-0" style="color: #090914;">{{ $data['user']->first_name ?? '' }}
                                {{ $user->last_name ?? '' }}</p>
                            <div class="dropdown">
                                <div class="position-relative">
                                    <div class="ms-2  d-flex justify-content-center align-items-center p-2 dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false" style="background: #F8FAFC;"
                                        id="privacy">
                                        <img src="{{ asset('storage/assets') }}/images/earth.png" alt=""
                                            class="me-1">
                                        <p class="mb-0 ms-0"> Public </p>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li onclick="PostDD('everyone')"><a class="dropdown-item"
                                                href="#">Public</a></li>
                                        <li onclick="PostDD('specific')"><a class="dropdown-item"
                                                href="#">Private</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea name="content" placeholder="What’s on your mind, {{ $data['user']->first_name ?? '' }}?"
                        id="CreatePostTextarea" cols="30" rows="10"></textarea>
                    <div class="displayImages" id="display"></div>
                    {{-- VIDEO Section --}}
                    <div id="video">
                        <div style="display:none; flex-direction: column; align-items: center; justify-content: space-around; flex-direction: column; justify-content: center; align-items: center;"
                             id="UploadVideoContainer main__main-container" class="UploadVideoContainer">
                            <video style="max-width: 800px; width: 80%; height: auto; display: none;" id="videoElement" playsinline controls>Can't load video :(</video>
                            <video style="max-width: 800px; width: 80%; height: auto; display: none;" id="main__video" playsinline>Can't load video :(</video>

                            <div style="display:flex; justify-content: center; align-items: center;" id="videosection">
                                <div style="display: flex;">
                                    <div style="background-color: transparent; border: 2px solid #99ddcc; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px;" id="upload-button">
                                        <input type="file" accept="video/*" onchange="uploadVideoFunc(this)" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0; cursor: pointer;">
                                        <i class="fa-solid fa-file-arrow-up" style="font-size: 1.6rem; margin-right: 8px;"></i>
                                        Upload
                                    </div>
                                    <div style="background-color: transparent; border: 2px solid #99ddcc; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left: 1rem; display: none;" id="record-button">
                                        <i class="fa-solid fa-circle" style="font-size: 1.6rem; margin-right: 8px;"></i>
                                        Record
                                    </div>
                                </div>
                                <progress id="upload-progress" value="0" max="100" style="width: 100%; display: none;"></progress>
                                <video id="uploaded-video" style="max-width: 800px; width: 80%; height: auto; display: none;" controls></video>
                                <div style="background-color: transparent; border: 2px solid #99ddcc; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left: 1rem; display: none;" id="start-recording-button">
                                    Start Recording
                                </div>
                                <div style="background-color: transparent; border: 2px solid #99ddcc; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left: 1rem; display: none;" id="stop-recording-button">
                                    Stop Recording
                                </div>

                                <div style="background-color: transparent; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border: 2px solid #99ddcc; border-radius: 8px; margin-left: 1rem; display: none;" id="close-recorder-button">
                                    Close Recorder
                                </div>
                                <div style="background-color: transparent; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border: 2px solid #99ddcc; border-radius: 8px; margin-left: 1rem; display: none;" id="save-video-button">
                                    Save Video
                                </div>
                                <input type="hidden" id="video-input" name="video">
                                <input type="hidden" id="video-filename" name="video_filename">

                                <span id="file-name-display" style="display: none;"></span>
                                <i id="trash-bin-icon" class="fa-solid fa-trash" style="display: none; cursor: pointer; font-size: 1.6rem; margin-left: 1rem;"></i>
                                <div style="background-color: transparent; color: #99ddcc; font-family: 'Poppins', sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border: 2px solid #99ddcc; border-radius: 8px; margin-left: 1rem; display: none;" id="cancel-button">
                                    Cancel Upload
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- VIDEO Section END --}}
                    <!-- <img src="" alt="" id="SelectedImg"  class="mb-3"> -->

                    <input type="text" class="form-control mb-2  py-3 border-1"
                        style="display: none;width: 98%; border-color: #999999;" id="Specific"
                        placeholder="Search People">
                    <div class="bottom align-items-start">
                        <p>Add to your post</p>

                        <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                        <div class="w-75">
                            <div class="d-flex position-relative justify-content-end">
                                <div class="d-flex">
                                    <!-- <input type="file" class="w-100 opacity-0 h-100 position-absolute" id="UploadImages" name="images[]" accept="image/png, image/jpg" multiple="multiple" value="value" data-maxFileSize="2"> -->

                                    <div onclick="OpenVideoDiv()" id="uploadVideo"
                                        style="margin:0 10px; cursor: pointer;"><i class="fa-solid fa-clapperboard"
                                            style="color:#99ddcc;" id="videobutton"></i>
                                    </div>
                                    <!-- <img src="{{ asset('storage/assets') }}/images/img.png" alt=""> -->
                                </div>
                                <div>
                                    <input type="button" class="opacity-0 h-100 position-absolute"
                                        style="width: 100%;" id="voice">
                                    <img src="{{ asset('storage/assets') }}/images/voice2.png" alt="">
                                </div>

                                {{-- Tags --}}
                                <input type="hidden" id="tag-input" name="tags" value="">
                                <div>
                                    <input type="button" class="opacity-0 h-100 position-absolute dropdown-toggle"
                                        style="width: 100%;" id="tagsBtn" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false">
                                    <img src="{{ asset('storage/assets') }}/images/tag.png" alt="">
                                    <div class="dropdown-menu" style="padding: 20px;">
                                        <form class="px-4 py-3" action="addTag" method="POST" id="tagForm">@csrf
                                            <div class="mb-3">
                                                <label for="exampleDropdownFormEmail1" class="form-label">Add New
                                                    Tags</label>
                                                <input type="text" class="form-control" id="tagsInput"
                                                    name="tagName" placeholder="Enter Tag name">
                                            </div>
                                            <button class="btn btn-primary" type="submit"
                                                onclick="InputTags(event)">Add New Tag</button>

                                            @if (isset($data['tags']))
                                                <div>
                                                    <input type="text" class="form-control mt-4"
                                                        id="tagSearchInput" placeholder="Search tags">
                                                </div>

                                                <div class="tagsrow my-2" id="tagsrow">
                                                    @foreach ($data['tags'] as $tag)
                                                        <div class="tag-item" id="tag{{ $tag->id }}">
                                                            <button href=""
                                                                onclick="AddTags(event, 'tag{{ $tag->id }}')">{{ $tag->name }}</button>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- <img src="{{ asset('storage/assets') }}/images/tag.png" alt="" > -->
                                {{-- Images --}}
                                <div>
                                    <input type="file" class="w-100 opacity-0 h-100 position-absolute"
                                        name="documents[]" accept=".doc, .docx, .xls, .xlsx, .pdf, .ppt, .pptx"
                                        multiple="multiple" data-maxFileSize="5242880" id="docBtn">
                                    <img src="{{ asset('storage/assets') }}/images/doc.png" alt="">
                                </div>
                                <div class="d-flex">
                                    <input type="file" class="w-100 opacity-0 h-100 position-absolute"
                                        id="UploadImages" name="images[]" accept="image/png, image/jpg"
                                        multiple="multiple" value="value" data-maxFileSize="2">
                                    <img src="{{ asset('storage/assets') }}/images/img.png" alt="">
                                </div>

                            </div>
                            <div class="documents d-flex flex-column" style="width: -webkit-fill-available;">
                                <div class="voice">
                                    <div id="voice-recording" style="display: none;">
                                        <div id="voice-controls" style="display: flex; margin-top: 2rem; max-width: 28em;">
                                            <button id="voiceRecordButton" style="flex-grow: 1; height: 3rem; min-width: 10rem; border: none; border-radius: 0.15rem; background: #ed341d; margin-left: 2px; box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2); cursor: pointer; display: flex; justify-content: center; align-items: center; color:#ffffff; font-weight: bold; font-size: 1rem;">Record</button>
                                            <button id="voicePauseButton" disabled style="flex-grow: 1; height: 3rem; min-width: 10rem; border: none; border-radius: 0.15rem; background: #ed341d; margin-left: 2px; box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2); cursor: pointer; display: flex; justify-content: center; align-items: center; color:#ffffff; font-weight: bold; font-size: 1rem;">Pause</button>
                                            <button id="voiceStopButton" disabled style="flex-grow: 1; height: 3rem; min-width: 10rem; border: none; border-radius: 0.15rem; background: #ed341d; margin-left: 2px; box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2); cursor: pointer; display: flex; justify-content: center; align-items: center; color:#ffffff; font-weight: bold; font-size: 1rem;">Stop</button>
                                        </div>
                                        <div style="margin-top: 1rem;">
                                            <p style="margin-top: 1rem;"><strong>Recordings:</strong></p>
                                            <div id="formats">Format: start recording to see sample rate</div>
                                            <ol id="recordingsList" style="list-style: none; margin-bottom: 1rem;"></ol>
                                            <input type="hidden" name="audio_filename" id="audio_filename" style="display: none;"> <!-- Hidden field to store the filename -->
                                            <input type="hidden" name="audio" id="audio_data" style="display: none;"> <!-- Hidden field to store the audio data as base64 -->                                        </div>
                                        <script src="{{ asset('storage/assets/js/voice-recorder.js') }}"></script>
                                        <script src="{{ asset('storage/assets/js/voice-recording-app.js') }}"></script>
                                    </div>
                                </div>
                                <div class="tagsrow" id="tags"></div>
                                <div class="docs" id="docs"></div>
                            </div>
                            <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                        </div>
                    </div>
                    <div class="d-flex button-box justify-content-end">
                        {{-- <a href="" id="publishButton" class="btn public" onclick="PublishPostx(event)">Publish</a> --}}
                        <button class="btn public" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="something">
        <div class="d-flex justify-content-between first-second mb-3">
            <h4>Write Something</h4>
        </div>
        <div class="d-flex justify-content-between second" onclick="CloseModal(event, true)"
            data-bs-target="#exampleModal">
            <div class="d-flex w-100">
                <div class="postProfileIcon">
                    @if (isset($data['user_information']->profile_picture))
                        <img src="{{ asset('profile_pictures') }}/{{ $data['user_information']->profile_picture }}" />
                    @else
                    <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                    @endif
                </div>
                <p class="w-100 input d-flex justify-content-start align-items-center " style="outline: none;">
                    What’s on your mind?
                </p>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('post-form').addEventListener('submit', function() {
        document.getElementById('spinner').style.display = 'block';
    });
</script>
<script>
    function PublishPostx(event) {
        event.preventDefault(); // Prevent the default form submission

        var content = document.querySelector('textarea[name="content"]').value;

        // Make an AJAX request to the server
        axios.post('/posts', {
                content: content
            })
            .then(function(response) {
                // Handle the successful response
                console.log(response.data);
                // Optionally, show a success message or redirect the user
                alert('Post created successfully');
                window.location.reload(); // Refresh the page to see the new post
            })
            .catch(function(error) {
                // Handle any errors
                console.error(error);
                // Optionally, display an error message to the user
                alert('Failed to create post');
            });
    }
</script>
