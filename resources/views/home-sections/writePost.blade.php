
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
        <div class="modal-dialog">
            <div class="modal-content post-section p-0">
                <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data" id="post-form">
                    @csrf
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Write Something</h1>
                    <button type="button" class="btn-close" onclick="CloseModal(event, false)" id="closeModal" aria-label="Close" data-bs-target="#exampleModal"></button>
                </div>
                <div class="modal-body position-relative">
                    <div id="viewImg" class="viewImg position-absolute left-0"><button onclick="ViewImg('asdasd', false)" class="btn btn-primary">X</button><img src="" alt=""></div>
                    <div class="d-flex first align-items-center">
                        @if (isset($data['user_information']->profile_picture))
                        <img src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" style="width: 40px; height: 40px; border-radius: 100%;" />
                        @else
                        <img src="{{ asset('storage/assets/images/profile.jpeg') }}" style="width: 40px; height: 40px; border-radius: 100%;" />
                        @endif
                        <div class="d-flex justify-content-start align-items-start flex-column">
                            <p class="mb-0" style="color: #090914;">{{ $data['user']->first_name ?? '' }}
                                {{ $user->last_name ?? '' }}
                            </p>
                            <div class="dropdown">
                                <div class="position-relative">
                                    <div class="ms-2  d-flex justify-content-center align-items-center p-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #F8FAFC;" id="privacy">
                                        <img src="{{ asset('storage/assets') }}/images/earth.png" alt="" class="me-1">
                                        <a href="#" style="text-decoration: none">
                                            <p class="mb-0 ms-0"> Public </p>
                                        </a>
                                    </div>
                                    <?php
                                    $userid = \Illuminate\Support\Facades\Auth::id();
                                    $user = \App\Models\User::query()->with('relatives')->findOrFail($userid);
                                    $friends = count($user->relatives);
                                    ?>

                                    <ul class="dropdown-menu">
                                        <li onclick="PostDD('everyone')"><a class="dropdown-item" href="#">Public</a></li>
                                        @if(isset($user->relatives) && $friends > 0)
                                            <li onclick="PostDD('privatePeopleSearch')"><a class="dropdown-item" href="#">Private</a></li>
                                        @else
                                            <li><a class="dropdown-item"  id="privateLink" >Private</a></li>

                                        @endif
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <textarea name="content" placeholder="What’s on your mind, {{ $data['user']->first_name ?? '' }}?" id="CreatePostTextarea" cols="30" rows="10"></textarea>
                    <div id="error-message" style="display: none; color: red; font-size: 14px; margin-top: 5px;">Please
                        enter your post content.</div>
                    <div class="displayImages" id="display"></div>
                    <div class="documents d-flex flex-column" style="width: -webkit-fill-available;">
                        {{-- VIDEO START --}}
                        <div id="video" style="display:none;">
                            <div style="flex-direction: column; align-items: center; justify-content: space-around; flex-direction: column; justify-content: center; align-items: center;" id="UploadVideoContainer main__main-container" class="UploadVideoContainer">
                                <video style="max-width: 800px;width: 80%; height: auto; display: none;" id="videoElement" playsinline controls>Can't load video :(</video>
                                <video style="max-width: 800px;width: 80%; height: auto; display: none;" id="main__video" playsinline>Can't load video :(</video>

                                <div style="display:flex;  justify-content: center; align-items: center;" id="videosection">
                                    <div id="upload-button" style="position:relative; margin:20px 0; cursor:pointer;">
                                        <input type="file" accept="video/*" onchange="uploadVideoFunc(this)" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0;">
                                        <i class="fa-solid fa-file-arrow-up" style="font-size: 1.6rem; color:#99ddcc;"></i>
                                        Upload
                                    </div>
                                    <progress id="upload-progress" value="0" max="100" style="width: 100%; display: none;"></progress>
                                    <video id="uploaded-video" style="max-width: 800px;width: 80%; height: auto; display: none;" controls></video>
                                    <div id="start-recording-button" style='display: none; background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        <i class="fa-solid fa-video"></i>
                                        Start Recording
                                    </div>
                                    <div id="stop-recording-button" style='display: none; background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        <i class="fa-solid fa-video-slash"></i>
                                        Stop Recording
                                    </div>
                                    <div id="record-button" style='background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        <i class="fa-solid fa-camera"></i>
                                        Record
                                    </div>
                                    <div id="close-recorder-button" style='display: none; background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        <i class="fa-solid fa-xmark"></i>
                                        Close Recorder
                                    </div>
                                    <div id="save-video-button" style='display: none; background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        Save Video</div>
                                    <input type="hidden" id="video-input" name="video">
                                    <input type="hidden" id="video-filename" name="video_filename">

                                    <span id="file-name-display" style="display: none;"></span>
                                    <i id="trash-bin-icon" class="fa-solid fa-trash" style="display: none; cursor: pointer;" onclick="removeFile()"></i>
                                    <div id="cancel-button" style='display: none; background-color: #99ddcc; color: #fff; font-family: "Poppins", sans-serif; font-size: 16px; padding: 8px 21px; cursor:pointer; border-radius: 8px; margin-left:1rem;'>
                                        Cancel Upload</div>

                                </div>
                            </div>
                        </div>
                        {{-- VIDEO END --}}
                        {{-- VOICE START --}}
                        <div class="voice">
                            <div id="voice-recording" style="display: none;">
                                <div id="voice-controls" style="display: flex; margin-top: 2rem; max-width: 28em;">
                                    <button id="voiceRecordButton" class="btn btn-outline-dark"><i class="bi bi-record-circle"></i> Start Recording</button>
                                </div>
                                <div style="margin-top: 1rem; margin-bottom: 1rem;">
                                    <div id="audio-section" style="display:block">
                                        <p style="margin-top: 1rem;"><strong>Recordings:</strong></p>
                                        <div id="recordingBar" class=""></div>
                                        <strong id="recTime"></strong>
                                        <button id="voiceStopButton" disabled class="btn btn-outline-dark my-3" style="display:none"><i class="bi bi-stop-circle"></i> Stop Recording</button>
                                    </div>
                                    <div id="formats" style="display:none;">Format: start recording to see sample rate</div>
                                    <ol id="recordingsList" class="d-inline mb-3" style=" list-style: none; ">
                                    </ol>
                                    <input type="hidden" name="audio_filename" id="audio_filename" style="display: none;"> <!-- Hidden field to store the filename -->
                                    <input type="hidden" name="audio" id="audio_data" style="display: none;">
                                    <!-- Hidden field to store the audio data as base64 -->
                                </div>

                                <script src="{{ asset('storage/assets/js/voice-recorder.js') }}"></script>
                                <script src="{{ asset('storage/assets/js/voice-recording-app.js') }}"></script>
                            </div>
                        </div>

                        {{-- VOICE END --}}

                        <div class="docs" id="recd"></div>

                        <div class="docs" id="docs"></div>
                    </div>
                    <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                    <!-- <img src="" alt="" id="SelectedImg"  class="mb-3"> -->

                    {{-- <input type="text" class="form-control mb-2  py-3 border-1" style="display: none;width: 98%; border-color: #999999;" id="privatePeopleSearch" placeholder="Search People" name="privatePeopleSearch">
                     --}}

                    <input type="text" class="form-control mt-2 mb-2 py-3 border-1" style="display: none;width: 100%; border-color: #999999;" id="privatePeopleSearchHere" placeholder="Search name or email of the user." autocomplete="nope">
                    <input type="hidden" id="privatePeopleSearch" name="privatePeopleSearch">
                    <div id="labelForPrivateSearch" style="display: none" for="privatePeopleSearchName">User(s) who can see your post:</div>
                    <input type="text" class="form-control mb-2 py-3 border-1" style="display: none;width:100%; border-color: #999999;" id="privatePeopleSearchName" name="privatePeopleSearchName" >


                    <div id="userList"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                       $(document).ready(function(){
                        $('#privatePeopleSearchHere').on('keyup', function(){
                            let query = $(this).val();
                            if(query != ''){
                                let _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url: "/privatePeopleSearch",
                                    method: "POST",
                                    data: {query: query, _token: _token},
                                    success: function(data){
                                        let output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                                        $.each(data, function(key, value){
                                            output += `<li><a href="#" class="suggest-user" data-id="${value.id}">${value.first_name} ${value.last_name}</a></li>`;
                                        });
                                        output += '</ul>';
                                        $('#userList').html(output);
                                    }
                                })
                            }
                        });
                    });

                    $(document).on('click', '.suggest-user', function(e){
                        e.preventDefault();

                        let userId = $(this).data('id');
                        let userName = $(this).html();

                        let currentVal = $('#privatePeopleSearch').val();
                        let currentNameVal = $('#privatePeopleSearchName').val();

                        if(currentVal) {
                            currentVal = currentVal.split(',');
                            currentNameVal = currentNameVal.split(', ');
                        } else {
                            currentVal = [];
                            currentNameVal = [];
                        }

                        currentVal.push(userId);
                        currentNameVal.push(userName);
                        $('#privatePeopleSearch').val(currentVal.join(','));
                        $('#privatePeopleSearchName').val(currentNameVal.join(', '));

                        // Remove the clicked user from the list
                        $(this).parent().remove();

                        $('#userList').empty();
                        // Check if userList is empty, if so, hide it
                        // if (!$.trim($("#userList").html())) {
                        //     $("#userList").hide();
                        // }
                    });

                    $(document).on('click', '.remove-user', function(e){
                        e.preventDefault();

                        let userId = $(this).data('id');  // Get the user id
                        let userName = $(this).text();  // Get the user's name

                        // Remove the user id from your hidden input field:
                        let oldVal = $('#privatePeopleSearch').val().split(',');
                        let oldNameVal = $('#privatePeopleSearchName').val().split(', ');
                        let newVal = $.grep(oldVal, function(value){
                            return value != userId;
                        }).join(',');
                        let newNameVal = $.grep(oldNameVal, function(value){
                            return value != userName;
                        }).join(', ');
                        $('#privatePeopleSearch').val(newVal);
                        $('#privatePeopleSearchName').val(newNameVal);

                        // Remove the user display:
                        $(this).parent().remove();
                    });


                    </script>

                    <div class="bottom mt-2 align-items-start addToYourPost">
                        <p>Add to your post</p>

                        <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                        <div class="w-75">
                            <div class="d-flex position-relative justify-content-end">
                                <div class="d-flex">
                                    <!-- <input type="file" class="w-100 opacity-0 h-100 position-absolute" id="UploadImages" name="images[]" accept="image/png, image/jpg" multiple="multiple" value="value" data-maxFileSize="2"> -->

                                    <div id="uploadVideo" style="margin:0 10px; cursor: pointer;"><i class="fa-solid fa-clapperboard" style="color:#99ddcc;" id="videobutton"></i>
                                    </div>
                                    <!-- <img src="{{ asset('storage/assets') }}/images/img.png" alt=""> -->
                                </div>
                                <div>
                                    <input type="button" class="opacity-0 h-100 position-absolute" style="width: 100%;" id="voice">
                                    <img src="{{ asset('storage/assets') }}/images/voice2.png" alt="">
                                </div>

                                {{-- Tags --}}
                                <input type="hidden" id="tag-input" name="tags" value="">
                                <div>
                                    <input type="button" class="opacity-0 h-100 position-absolute dropdown-toggle" style="width: 100%;" id="tagsBtn" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <img src="{{ asset('storage/assets') }}/images/tag.png" alt="">
                                    <div class="dropdown-menu" style="padding: 20px;">
                                        <form class="px-4 py-3" action="addTag" method="POST" id="tagForm">@csrf
                                            <div class="mb-3">
                                                <label for="exampleDropdownFormEmail1" class="form-label">Add New
                                                    Tags</label>
                                                <input type="text" class="form-control" id="tagsInput" name="tagName" placeholder="Enter Tag name">
                                            </div>
                                            <button class="btn btn-primary" type="submit" onclick="InputTags(event)">Add New Tag</button>

                                            @if (isset($data['tags']))
                                            <div>
                                                <input type="text" class="form-control mt-4" id="tagSearchInput" placeholder="Search tags">
                                            </div>

                                            <div class="tagsrow my-2" id="tagsrow">
                                                @foreach ($data['tags'] as $tag)
                                                <div class="tag-item" id="tag{{ $tag->id }}">
                                                    <button href="" onclick="AddTags(event, 'tag{{ $tag->id }}')">{{ $tag->name }}</button>
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
                                    <input type="file" class="w-100 opacity-0 h-100 position-absolute" name="documents[]" accept=".doc, .docx, .xls, .xlsx, .pdf, .ppt, .pptx" multiple="multiple" data-maxFileSize="5242880" id="docBtn">
                                    <img src="{{ asset('storage/assets') }}/images/doc.png" alt="">
                                </div>
                                <div class="d-flex">
                                    <input type="file" class="w-100 opacity-0 h-100 position-absolute" id="UploadImages" name="images[]" accept="image/png, image/jpg" multiple="multiple" value="value" data-maxFileSize="2">
                                    <img src="{{ asset('storage/assets') }}/images/img.png" alt="">
                                </div>
                            </div>
                            <div class="tagsrow" id="tags"></div>
                        </div>
                    </div>

                    <div class="d-flex button-box justify-content-end">
                        <button class="btn public" type="submit">Publish</button>
                    </div>
                </div>
                </form>
                <div id="PrivatePostAddContact" style="display:none">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" onclick="closePrivateModal()" id="closeModal"
                            aria-label="Close" data-bs-target="#exampleModal"></button>
                    </div>
                    <div class="p-5">
                        <p class="">It looks like you haven't added any family contacts yet. To get
                            started with private posts, simply add your family members as contacts using the search field
                            below.
                            Click the <Strong> "Search Icon" </Strong> to begin! </p>
                        <h3 class="mb-5 mt-5">Add Contact</h3>
    
                        <form class="d-flex  d-lg-block searchBar" action="{{route('search')}}" method="get">
                            <div class="d-flex position-relative w-100">
                                <input class="form-control me-2 search w-100" name="query" id="searchQuery"
                                    placeholder="Search Users by Email" autocomplete="off" />
                                <button class="position-absolute"
                                    style="top: 25%; right: 5%; background: none; border: none;" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                            <!-- <a class="cancelBtn"> Cancel </a> -->
                        </form>
                    </div>
                </div>
        </div>
        </div>
    
    </div>
    <div class="something">
        <div class="d-flex justify-content-between first-second mb-3">
            <h4>Write Something</h4>
        </div>
        <div class="d-flex justify-content-between second" onclick="CloseModal(event, true)" data-bs-target="#exampleModal">
            <div class="d-flex w-100">
                <div class="postProfileIcon">
                    @if (isset($data['user_information']->profile_picture))
                    <img src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                    @else
                    <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                    @endif
                </div>
                <a  href="#" style="text-decoration: none; display: flex;">
                    <p class="w-100 input d-flex justify-content-start align-items-center " style="outline: none;">
                        What’s on your mind?
                    </p>
                </a>

            </div>
        </div>
    </div>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


    function updateModalContent(newContent) {
        $('#exampleModal .modal-content').html(newContent);
    }
    const closePrivateModal = () => {

        $("#PrivatePostAddContact").hide()
        $("#post-form").show()
    }
    $(document).ready(function () {
        // Replace modal content when the "Private" link is clicked
        $('#privateLink').click(function () {
            $("#PrivatePostAddContact").show()
            $("#post-form").hide()
        });
    });
</script>
