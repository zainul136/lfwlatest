<!-- <div class="documentPreview"

    style="display:none;width: 100%;

    height: 100vh;

    position: fixed;

    top: 0;

    background: #00000036;

    z-index: 100;

    justify-content:center;

    align-items:center;

    left: 0;" onclick = "ClosePreview()">

    <canvas id="pdfCanvas" style="max-height: 100vh;
    max-width: 100%;"></canvas>

</div> -->
<div class="ImageModal" onclick="OpenImageModal(event, false, '' )">
    <img class="navButtons" src="{{ asset('storage/assets/posts') }}/img/left.svg" alt="">
    <img src="" alt="" class="ModalImg">
    <img class="navButtons" src="{{ asset('storage/assets/posts') }}/img/right.svg" alt="">
</div>
<div class="Posts">

    <div class="d-flex button-box">

        @if (Route::currentRouteName() == 'home')
            <a href=" {{ route('home') }}" class="btn public">Public</a>

            <a href="{{ route('privateHome') }}" class="btn private">Private</a>
        @elseif(Route::currentRouteName() == 'privateHome')
            <a href=" {{ route('home') }}" class="btn private">Public</a>

            <a href="{{ route('privateHome') }}" class="btn public">Private</a>
        @endif
        <button class="btn" style="margin-left: auto;" onclick="Search()"><i
                    class="fa-solid fa-magnifying-glass"></i></button>

    </div>

    @if ($data['posts']->isEmpty())
        <div class="something">
        <div class="d-flex mt-2 justify-content-between">
            <p class="text-center">“No Posts Found”</p>
        </div>
        </div>
    @else
        @foreach ($data['posts'] as $post)
            @if ($post->post_type == 'text')
                {{-- POST TYPE - TEXT - BEGINNING --}}

                <section id="{{ $post->id  }}">
                    <div class="card-layout" >
                        @php $textpostrand = rand(1,1000000) @endphp
                        <div class="card-top">
                            <div class="card-top-text">
                                <div class="card-top-left">
                                    @if (isset($data['user_information']->profile_picture))
                                        <img class="avatar"
                                             src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                    @else
                                        <img class="avatar" src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                    @endif

                                </div>
                                <div class="card-top-right">
                                    <div class=" edit dropdown">
                                        <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="circle"></div>
                                            <div class="circle"></div>
                                            <div class="circle"></div>
                                        </div>
                                        <ul class="dropdown-menu button-box">
{{--                                            <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                            <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                        </ul>
                                    </div>
                                    <script>

                                        const edittextpostDropdown = (id)=>{
                                            console.log(id)
                                            editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                            editPostDropdown.classList.toggle("activedropdown")
                                        }
                                    </script>
                                    <h6 class="avatar-text">{{ $data['user']->first_name }}
                                        {{ $data['user']->last_name }}</h6>
                                    <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg" alt="">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-top-desc">
                                <div class="card-top-desc-text">
                                    <h3 class="content-text">@php

                                            if (isset($post->PostText->post_content)) {
                                                echo nl2br(e($post->PostText->post_content));
                                            }

                                        @endphp</h3>
                                </div>
                                @if ($post->tags->count() > 0)
                                    <div class="card-top-desc-tags">
                                        @foreach ($post->tags as $tag)
                                            <span><a
                                                        href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-middle">

                        </div>
                        @if ($post->post_scope == 'private')
                            <div class="card-bottom">
                                <div class="card-bottom-left">
                                    <p class="whoSeePrivateBtn">Visible to: </p>
                                    <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                 alt="">Private</button>
                                </div>
                                @if ($post->viewers->isNotEmpty())
                                    <div class="card-bottom-right">
                                        <div class="card-bottom-right-text">
                                            <p class="whoSee">Who can see your post?</p>
                                        </div>
                                        <div class="card-bottom-right-navbtn">
                                            <img class="catLeft" src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                 alt="">
                                        </div>
                                        <div class="card-bottom-right-tags">
                                            @foreach ($post->viewers as $viewer)
                                                <span><a href="#">{{ $viewer->first_name }}
                                                        {{ $viewer->last_name }}</a></span>
                                            @endforeach
                                        </div>
                                        <div class="card-bottom-right-navbtn">
                                            <img class="catRight"
                                                 src="{{ asset('storage/assets/posts') }}/img/next.svg" alt="">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </section>

                {{-- POST TYPE - TEXT - END --}}


                {{-- <div class="post-section" id="{{ $post->id  }}">

                    <div class="PostHeader d-flex justify-content-between pb-4"
                        style="border-bottom: 1px solid #f7f6f6">

                        <div class="d-flex first">

                            <div class="postProfileIcon">
                                @if (isset($data['user_information']->profile_picture))
                                    <img src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                @else
                                <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                @endif
                            </div>

                            <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>

                            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}</span>


                        </div>

                        <div class="d-flex second">

                            @if ($post->post_scope == 'public')
                            <span class="material-symbols-outlined user">
                                <img src="{{ asset('storage/assets/images/public-post.png') }}" title="Public Post" alt="Public Post" style="width: 25px; height: 25px; margin-right: 10px">
                            </span>
                            @else
                            <span class="material-symbols-outlined user">
                                <img src="{{ asset('storage/assets/images/private-post.png') }}" title="Private Post" alt="Private Post" style="width: 25px; height: 25px; margin-right: 10px">
                            </span>
                            @endif

                            <div class="dropdown EditPostDropdown">
                                <span class="material-symbols-outlined more" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-bs-auto-close="outside">

                                    more_horiz

                                </span>

                                <form class="dropdown-menu p-4" style="width: 177px;">
                                    <button type="button" class="btn edit mb-2">Edit</button>
                                    <button type="button" class="btn mb-2 delete" onclick="deletePost({{ $post->id  }})">Delete</button>
                                </form>

                            </div>

                        </div>

                    </div>
                    <h3 class="mt-4 text-content">@php

                        if (isset($post->PostText->post_content)) {
                            echo nl2br(e($post->PostText->post_content));
                        }

                    @endphp</h3>
                    <div class="d-flex links">
                        @if ($post->tags->count() > 0)
                            @foreach ($post->tags as $tag)
                            <a href="{{ url("tag/$tag->slug") }}">{{ $tag->name }}</a>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex links">
                        @if ($post->post_scope == 'private')
                            @if ($post->viewers->isNotEmpty())
                                Who can see your post:
                                <span class="viewersData" style="    display: flex;
                                position: relative;
                                bottom: 7px;">
                                @foreach ($post->viewers as $viewer)
                                <a href="#">{{ $viewer->first_name }} {{ $viewer->last_name }}</a>
                                @endforeach
                            </span>
                            @endif
                        @endif
                    </div>
                </div> --}}
            @elseif($post->post_type == 'video' || $post->post_type == 'text/video')
                {{-- POST TYPE - VIDEO - BEGINNING --}}

                <section id="{{ $post->id  }}">
                    <div class="card-layout">
                        @php $videoRand = rand(1,1000000) @endphp
                        <div class="card-top">
                            <div class="card-top-text">
                                <div class="card-top-left">
                                    @if (isset($data['user_information']->profile_picture))
                                        <img class="avatar"
                                             src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                    @else
                                        <img class="avatar" src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                    @endif

                                </div>
                                <div class="card-top-right">
                                    <div class=" edit dropdown">
                                        <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="circle"></div>
                                            <div class="circle"></div>
                                            <div class="circle"></div>
                                        </div>
                                        <ul class="dropdown-menu button-box">
{{--                                            <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                            <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                        </ul>
                                    </div>
                                    <script>

                                        const editvideopostDropdown = (id)=>{
                                            console.log(id)
                                            editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                            editPostDropdown.classList.toggle("activedropdown")
                                        }
                                    </script>
                                    <h6 class="avatar-text">{{ $data['user']->first_name }}
                                        {{ $data['user']->last_name }}</h6>
                                    <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg" alt="">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-top-desc">
                                <div class="card-top-desc-text">
                                    <h3 class="content-text">@php

                                            if (isset($post->PostText->post_content)) {
                                                echo nl2br(e($post->PostText->post_content));
                                            }

                                        @endphp</h3>
                                </div>
                                @if ($post->tags->count() > 0)
                                    <div class="card-top-desc-tags">
                                        @foreach ($post->tags as $tag)
                                            <span><a
                                                        href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-middle">
                            <div class="card4-content">
                                @if (isset($post->PostVideo->video_path))
                                    @php

                                        $path = asset($post->PostVideo->video_path);
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);

                                    @endphp
                                    <video id="myVideo" width="640px" height="360px" controls>
                                        <source src="{{ asset($post->PostVideo->video_path) }}"
                                                type="video/@php echo "$extension"; @endphp">
                                    </video>


                                    {{-- <button id="playButton"><img src="{{ asset('storage/assets/posts') }}/img/play.svg"
                                            alt=""></button>
                                    <button id="pauseButton"><img
                                            src="{{ asset('storage/assets/posts') }}/img/stop.svg"
                                            alt=""></button> --}}
                                @endif
                            </div>
                        </div>
                        @if ($post->post_scope == 'private')
                            <div class="card-bottom">
                                <div class="card-bottom-left">
                                    <p class="whoSeePrivateBtn">Visible to: </p>
                                    <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                 alt="">Private</button>
                                </div>
                                @if ($post->viewers->isNotEmpty())
                                    <div class="card-bottom-right">
                                        <div class="card-bottom-right-text">
                                            <p class="whoSee">Who can see your post?</p>
                                        </div>
                                        <div class="card-bottom-right-navbtn">
                                            <img class="catLeft" src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                 alt="">
                                        </div>
                                        <div class="card-bottom-right-tags">
                                            @foreach ($post->viewers as $viewer)
                                                <span><a href="#">{{ $viewer->first_name }}
                                                        {{ $viewer->last_name }}</a></span>
                                            @endforeach
                                        </div>
                                        <div class="card-bottom-right-navbtn">
                                            <img class="catRight"
                                                 src="{{ asset('storage/assets/posts') }}/img/next.svg" alt="">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </section>

                {{-- POST TYPE - VIDEO - END --}}
                {{-- <div class="post-section" id="{{ $post->id }}">

                    <div class="PostHeader d-flex justify-content-between pb-4"
                        style="border-bottom: 1px solid #f7f6f6">

                        <div class="d-flex first">

                            <div class="postProfileIcon">
                                @if (isset($data['user_information']->profile_picture))
                                    <img
                                        src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                @else
                                    <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                @endif
                            </div>

                            <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>

                            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}</span>

                        </div>

                        <div class="d-flex second">

                            <span class="material-symbols-outlined user">

                                supervised_user_circle

                            </span>

                            <p>Public</p>

                            <div class="dropdown EditPostDropdown">

                                <span class="material-symbols-outlined more" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-bs-auto-close="outside">

                                    more_horiz

                                </span>

                                <form class="dropdown-menu p-4" style="width: 177px;">
                                    <button type="button" class="btn edit mb-2">Edit</button>
                                    <button type="button" class="btn mb-2 delete"
                                        onclick="deletePost({{ $post->id }})">Delete</button>
                                </form>

                            </div>

                        </div>

                    </div>
                    <h3 class="mt-4 text-content">@php

                        if (isset($post->PostText->post_content)) {
                            echo nl2br(e($post->PostText->post_content));
                        }

                    @endphp</h3>

                    @if (isset($post->PostVideo->video_path))
                        <div class="post-video">
                            <video controls style="max-width: 100%;">
                                @php

                                    $path = asset($post->PostVideo->video_path);
                                    $extension = pathinfo($path, PATHINFO_EXTENSION);

                                @endphp
                                <source src="{{ asset($post->PostVideo->video_path) }}"
                                    type="video/@php echo "$extension"; @endphp">
                            </video>
                        </div>
                    @endif
                    <div class="d-flex links">
                        @if ($post->tags->count() > 0)
                            @foreach ($post->tags as $tag)
                                <a href="{{ url("tag/$tag->slug") }}">{{ $tag->name }}</a>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex links">
                        @if ($post->post_scope == 'private')
                            @if ($post->viewers->isNotEmpty())
                                Who can see your post:
                                <span class="viewersData"
                                    style="    display: flex;
                                position: relative;
                                bottom: 7px;">
                                    @foreach ($post->viewers as $viewer)
                                        <a href="#">{{ $viewer->first_name }} {{ $viewer->last_name }}</a>
                                    @endforeach
                                </span>
                            @endif
                        @endif
                    </div>
                </div> --}}
            @elseif($post->post_type == 'documents' || $post->post_type == 'text/documents')
                @php

                    if ($post->postDocument) {
                        $documentPaths = explode(',', $post->postDocument->document_path);
                    }

                @endphp

                @if ($post->PostDocument)
                    @php

                        $randomNumber = rand(1, 1000);

                    @endphp
                    {{-- POST TYPE - DOCUMENT - BEGINNING --}}

                    <section id="{{ $post->id  }}">
                        <div class="card-layout">
                            @php $docrand = rand(1,1000000) @endphp
                            <div class="card-top">
                                <div class="card-top-text">
                                    <div class="card-top-left">
                                        @if (isset($data['user_information']->profile_picture))
                                            <img class="avatar"
                                                 src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                        @else
                                            <img class="avatar"
                                                 src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                        @endif

                                    </div>
                                    <div class="card-top-right">
                                        <div class=" edit dropdown">
                                            <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                            </div>
                                            <ul class="dropdown-menu button-box">
{{--                                                <li><button class="btn public mx-auto d-block my-2 w-100 edit">Edit</button></li>--}}
                                                <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                            </ul>
                                        </div>
                                        <script>

                                            const editdocpostDropdown = (id)=>{
                                                console.log(id)
                                                editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                editPostDropdown.classList.toggle("activedropdown")
                                            }
                                        </script>
                                        <h6 class="avatar-text">{{ $data['user']->first_name }}
                                            {{ $data['user']->last_name }}</h6>
                                        <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                alt="">
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-top-desc">
                                    <div class="card-top-desc-text">
                                        <h3 class="content-text">@php

                                                if (isset($post->PostText->post_content)) {
                                                    echo nl2br(e($post->PostText->post_content));
                                                }

                                            @endphp</h3>
                                    </div>
                                    @if ($post->tags->count() > 0)
                                        <div class="card-top-desc-tags">
                                            @foreach ($post->tags as $tag)
                                                <span><a
                                                            href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-middle">
                                <div class="card5-content">

                                    @foreach ($documentPaths as $index => $documentPath)
                                        <div class="file">
                                            @php
                                                $randomNumber = rand(1, 1000);
                                                $id = $documentPath . $randomNumber . 'document';
                                            @endphp
                                            <div class="file-left">
                                                <img src="@if (pathinfo($documentPath, PATHINFO_EXTENSION) == 'pdf') {{ asset('storage/assets/images/pdf.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'doc'){{ asset('storage/assets/images/doc.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'docx'){{ asset('storage/assets/images/docx.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xls'){{ asset('storage/assets/images/xls.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xlsx'){{ asset('storage/assets/images/xlsx.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'ppt'){{ asset('storage/assets/images/ppt.png') }}
                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'pptx'){{ asset('storage/assets/images/pptx.png') }} @endif"
                                                     width="30px">

                                                <h2>
                                                    @if (strlen($documentPath) > 25)
                                                        {{ substr($documentPath, 0, 25) }}&hellip;{{ substr($documentPath, -4) }}
                                                    @else
                                                        {{ $documentPath }}
                                                    @endif
                                                </h2>
                                            </div>
                                            <div class="file-right">
                                                <a href="{{ asset('user_media/' . $post->user_id . '/documents/' . $documentPath) }}"
                                                   target="_blank" style="text-decoration: none;">
                                                    <img src="{{ asset('storage/assets/posts') }}/img/download.svg"
                                                         alt="">
                                                    <button>Download</button>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            @if ($post->post_scope == 'private')
                                <div class="card-bottom">
                                    <div class="card-bottom-left">
                                        <p class="whoSeePrivateBtn">Visible to: </p>
                                        <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                     alt="">Private</button>
                                    </div>
                                    @if ($post->viewers->isNotEmpty())
                                        <div class="card-bottom-right">
                                            <div class="card-bottom-right-text">
                                                <p class="whoSee">Who can see your post?</p>
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catLeft"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                            <div class="card-bottom-right-tags">
                                                @foreach ($post->viewers as $viewer)
                                                    <span><a href="#">{{ $viewer->first_name }}
                                                            {{ $viewer->last_name }}</a></span>
                                                @endforeach
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catRight"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </section>

                    {{-- POST TYPE - DOCUMENT - END --}}

                    {{-- <div class="post-section" id="{{ $post->id }}">

                        <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">

                            <div class="d-flex first ">

                                <div class="postProfileIcon">
                                    @if (isset($data['user_information']->profile_picture))
                                        <img
                                            src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                    @else
                                        <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                    @endif
                                </div>

                                <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>

                                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}</span>

                            </div>

                            <div class="d-flex second">

                                <span class="material-symbols-outlined user">

                                    supervised_user_circle

                                </span>

                                <p>Public</p>

                                <div class="dropdown EditPostDropdown">

                                    <span class="material-symbols-outlined more" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">

                                        more_horiz

                                    </span>

                                    <form class="dropdown-menu p-4" style="width: 177px;">
                                        <button type="button" class="btn edit mb-2">Edit</button>
                                        <button type="button" class="btn mb-2 delete"
                                            onclick="deletePost({{ $post->id }})">Delete</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                        <h3 class="mt-4 text-content">@php

                            if (isset($post->PostText->post_content)) {
                                echo nl2br(e($post->PostText->post_content));
                            }

                        @endphp</h3>

                        <div id="carouselExampleCaptions2" class="carousel slide carouselExampleCaptions">

                            @if (count($documentPaths) > 1)
                                <div class="docsContainer" style="width: 100%;">

                                    @foreach ($documentPaths as $index => $documentPath)
                                        @php

                                            $randomNumber = rand(1, 1000);

                                            $id = $documentPath . $randomNumber . 'document';

                                        @endphp

                                        <div class="docName {{ $index === 0 ? 'active' : '' }} "
                                            id="{{ $id }}">

                                            <a download="download"
                                                href="{{ asset('public/user_media/' . $post->user_id . '/documents/' . $documentPath) }}"
                                                target="_blank">
                                                <div> <img
                                                        src="@if (pathinfo($documentPath, PATHINFO_EXTENSION) == 'pdf') {{ asset('storage/assets/images/pdf.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'doc'){{ asset('storage/assets/images/doc.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'docx'){{ asset('storage/assets/images/docx.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xls'){{ asset('storage/assets/images/xls.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xlsx'){{ asset('storage/assets/images/xlsx.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'ppt'){{ asset('storage/assets/images/ppt.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'pptx'){{ asset('storage/assets/images/pptx.png') }} @endif">

                                                    @if (strlen($documentPath) > 25)
                                                        {{ substr($documentPath, 0, 25) }}&hellip;{{ substr($documentPath, -4) }}
                                                    @else
                                                        {{ $documentPath }}
                                                    @endif

                                                </div> <span class="material-symbols-outlined"
                                                    onclick="deleteDoc('sampleassdagdyagsdygvasdv...pdf0.5971909259609172')">cancel</span>

                                            </a>

                                            <!-- <div
                                          onclick="openPreview(this, '{{ $id }}', '{{ asset('public/user_media/' . $post->user_id . '/documents/' . $documentPath) }}')"

                                                style="padding-right:1rem; border-right: 1px solid #00000052;  font-size:1.4rem; font-size: 1.2rem; margin-left: auto; margin-right: 1rem; display:flex;justify-content: center;align-items: center; display: flex;justify-content: center;

                                        align-items: center;">

                                                Preview <i class="fa-solid fa-eye fa-2x"

                                                    style="font-size:1.6rem; margin-left:.5rem;"></i> </div>  -->

                                            <a style="margin-left:auto;"
                                                href="{{ asset('public/user_media/' . $post->user_id . '/documents/' . $documentPath) }}">
                                                <i class="fa-solid fa-download fa-2x"
                                                    style="font-size: 1.6rem; margin-left:.5rem;"></i>
                                            </a>

                                        </div>
                                    @endforeach

                                </div>
                            @else
                                class="docName {{ $index === 0 ? 'active' : '' }} "
                                            id="{{ $id }}">

                                            <a download="download"
                                                href="{{ asset('public/user_media/' . $post->user_id . '/documents/' . $documentPaths[0]) }}"
                                                target="_blank">

                                                <div> <img
                                                        src="@if (pathinfo($documentPath, PATHINFO_EXTENSION) == 'pdf') {{ asset('storage/assets/images/pdf.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'doc'){{ asset('storage/assets/images/doc.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'docx'){{ asset('storage/assets/images/docx.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xls'){{ asset('storage/assets/images/xls.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'xlsx'){{ asset('storage/assets/images/xlsx.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'ppt'){{ asset('storage/assets/images/ppt.png') }}

                                                        @elseif(pathinfo($documentPath, PATHINFO_EXTENSION) == 'pptx'){{ asset('storage/assets/images/pptx.png') }} @endif">

                                                    @if (strlen($documentPath) > 25)
                                                        {{ substr($documentPath, 0, 25) }}&hellip;{{ substr($documentPath, -4) }}
                                                    @else
                                                        {{ $documentPath }}
                                                    @endif

                                                </div> <span class="material-symbols-outlined"
                                                    onclick="deleteDoc('sampleassdagdyagsdygvasdv...pdf0.5971909259609172')">cancel</span>

                                            </a>


                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>

                        <div class="d-flex links">
                            @if ($post->tags->count() > 0)
                                @foreach ($post->tags as $tag)
                                    <a href="{{ url("tag/$tag->slug") }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>
                        <div class="d-flex links">
                            @if ($post->post_scope == 'private')
                                @if ($post->viewers->isNotEmpty())
                                    Who can see your post:
                                    <span class="viewersData"
                                        style="    display: flex;
                                    position: relative;
                                    bottom: 7px;">
                                        @foreach ($post->viewers as $viewer)
                                            <a href="#">{{ $viewer->first_name }} {{ $viewer->last_name }}</a>
                                        @endforeach
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div> --}}
                @endif



                {{-- AUDIO START --}}
            @elseif($post->post_type == 'audio' || $post->post_type == 'text/audio')
                @php

                    if ($post->postAudio) {
                        $audioPaths = explode(',', $post->postAudio->audio_path);
                    }

                @endphp

                @if ($post->PostAudio)
                    @php

                        $randomNumber = rand(1, 1000);

                    @endphp

                    <section id="{{ $post->id  }}">
                        <div class="card-layout">
                            <div class="card-top">
                                <div class="card-top-text">
                                    <div class="card-top-left">
                                        @if (isset($data['user_information']->profile_picture))
                                            <img class="avatar"
                                                 src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                        @else
                                            <img class="avatar"
                                                 src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                        @endif

                                    </div>
                                    <style>
                                        .card-top-right{
                                            position: relative;
                                        }
                                        .edit{
                                            display:flex;
                                            flex-direction : column;
                                            position: absolute;
                                            right: 0;
                                            top: -7px;
                                        }
                                        .edit .editButton{
                                            display : flex;

                                        }
                                        .edit .editButton .circle{
                                            width : 5px;
                                            height : 5px;
                                            background: grey;
                                            margin : 0 2px;
                                            border-radius:100%;
                                        }
                                        .edit  .editPostDropdown{
                                            display: flex;
                                            width: auto !important;
                                            flex-direction: column;
                                            padding: 19px;
                                            background: white;
                                            border-radius: 5px;
                                            box-shadow: 5px 5px 5px #c0c0c033;
                                            position: absolute;
                                            display : none;
                                        }
                                        .edit  .editPostDropdown button{
                                            margin:5px 0;
                                        }
                                    </style>
                                    <div class="card-top-right">



                                        <div class=" edit dropdown">
                                            <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                            </div>
                                            <ul class="dropdown-menu button-box">
{{--                                                <li><button class="btn public mx-auto d-block my-2 w-100">Edit</button></li>--}}
                                                <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                            </ul>
                                        </div>

                                        <h6 class="avatar-text">{{ $data['user']->first_name }}
                                            {{ $data['user']->last_name }}</h6>
                                        <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                alt="">
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-top-desc">
                                    <div class="card-top-desc-text">
                                        <h3 class="content-text">@php

                                                if (isset($post->PostText->post_content)) {
                                                    echo nl2br(e($post->PostText->post_content));
                                                }

                                            @endphp</h3>
                                    </div>
                                    @if ($post->tags->count() > 0)
                                        <div class="card-top-desc-tags">
                                            @foreach ($post->tags as $tag)
                                                <span><a
                                                            href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-middle">
                                <div class="card3-content">
                                    <div class="music">
                                        <!-- <audio controls preload="metadata">
                                            <source
                                                src=""
                                                type="audio/ogg">
                                        </audio> -->

                                        @php $randaudio = rand(1,1000000) @endphp
                                        <div class="track" id="track<?=$randaudio?>">
                                            <img src="{{ asset('storage/assets/images/play.svg') }}" id="playBtn<?=$randaudio?>" alt="">
                                            <div class="waveform" id="waveform<?=$randaudio?>"></div>
                                            <!-- <div class=".wavesurfer-wrapper"></div>
                                            <div id="waveform"></div> -->
                                            <h2 id="currentTimeHeading<?=$randaudio?>">0:00</h2>

                                            <script src="{{ asset('storage/assets/posts/pt-wavesurfer.js') }}"></script>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @if ($post->post_scope == 'private')
                                <div class="card-bottom">
                                    <div class="card-bottom-left">
                                        <p class="whoSeePrivateBtn">Visible to: </p>
                                        <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                     alt="">Private</button>
                                    </div>
                                    @if ($post->viewers->isNotEmpty())
                                        <div class="card-bottom-right">
                                            <div class="card-bottom-right-text">
                                                <p class="whoSee">Who can see your post?</p>
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catLeft"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                            <div class="card-bottom-right-tags">
                                                @foreach ($post->viewers as $viewer)
                                                    <span><a href="#">{{ $viewer->first_name }}
                                                            {{ $viewer->last_name }}</a></span>
                                                @endforeach
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catRight"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <script>
                            const playBtn<?=$randaudio?> = document.getElementById("playBtn<?=$randaudio?>");
                            const track<?=$randaudio?> = document.getElementById("track<?=$randaudio?>");
                            const audioval<?=$randaudio?> = document.getElementById("currentTimeHeading<?=$randaudio?>");

                            var wavesurfer<?=$randaudio?> = WaveSurfer.create({
                                container: '#waveform<?=$randaudio?>',
                                waveColor: '#FFFFFF80',
                                progressColor: '#21BA90',
                                barWidth: "4",
                                height: "60",
                                barRadius: "10",
                                responsive: true,
                                barGap: "6",
                                // url: "./audio/myway.mp3"
                            });

                            wavesurfer<?=$randaudio?>.load("{{ asset('user_media/' . $post->user_id . '/audio/' . $audioPaths[0]) }}");

                            // playBtn.src = "{{ asset('storage/assets/images/play.svg') }}";
                            audioval<?=$randaudio?>.style.color = "var(--gray-scale-5, #EEE)";

                            function updateWaveformHeight() {
                                var waveformCanvas = document.querySelectorAll('#waveform<?=$randaudio?> .wavesurfer-wave canvas');
                                var newHeight = window.innerWidth > 500 ? "3px" : "1px";

                                for (var i = 0; i < waveformCanvas.length; i++) {
                                    waveformCanvas[i].style.height = newHeight;
                                }
                            }

                            wavesurfer<?=$randaudio?>.on('ready', function () {
                                displayTotalDuration();

                                wavesurfer<?=$randaudio?>.on('audioprocess', function () {
                                    updateCurrentTimeDisplay();
                                });

                                playBtn<?=$randaudio?>.onclick = function () {
                                    if (wavesurfer<?=$randaudio?>.isPlaying()) {
                                        wavesurfer<?=$randaudio?>.pause();
                                        track<?=$randaudio?>.style.background = "#21BA90"; // Set the desired background when playing
                                        playBtn<?=$randaudio?>.src = "{{ asset('storage/assets/images/play.svg') }}";
                                        wavesurfer<?=$randaudio?>.setOptions({
                                            waveColor: '#FFFFFF80',
                                            progressColor: '#21BA90',
                                        });

                                        audioval<?=$randaudio?>.style.color = "var(--gray-scale-5, #EEE)";
                                    } else {
                                        wavesurfer<?=$randaudio?>.play();
                                        track<?=$randaudio?>.style.background = "#FFFFFF80"; // Set the background to none when paused
                                        wavePlay = true;
                                        playBtn<?=$randaudio?>.src = "{{ asset('storage/assets/images/stop.svg') }}";
                                        wavesurfer<?=$randaudio?>.setOptions({
                                            waveColor: "#21BA9080",
                                            progressColor: '#21BA90',
                                        });
                                        audioval<?=$randaudio?>.style.color = "var(--gray-scale-2, #666)";
                                    }
                                };

                                updateWaveformHeight();
                            });

                            window.addEventListener('resize', updateWaveformHeight);

                            function displayTotalDuration() {
                                var totalDuration = wavesurfer<?=$randaudio?>.getDuration();
                                var formattedTotalDuration = formatTime(totalDuration);
                                document.getElementById('currentTimeHeading<?=$randaudio?>').textContent = formattedTotalDuration;
                                // console.log(formattedCurrentTime)
                            }

                            function updateCurrentTimeDisplay() {
                                var currentTime = wavesurfer<?=$randaudio?>.getCurrentTime();
                                var formattedCurrentTime = formatTime(currentTime);
                                document.getElementById('currentTimeHeading<?=$randaudio?>').textContent = "" + formattedCurrentTime;
                                // console.log(formattedCurrentTime)
                            }

                            function formatTime(timeInSeconds) {
                                var date = new Date(null);
                                date.setSeconds(timeInSeconds);
                                var formattedTime = date.toISOString().substr(11, 8);
                                if (formattedTime.startsWith('00:')) {
                                    formattedTime = formattedTime.substr(3);
                                }
                                return formattedTime;
                            }
                        </script>
                    </section>

                    {{-- AUDIO END --}}

                    {{-- <div class="post-section" id="{{ $post->id }}">
                        <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
                            <div class="d-flex first ">
                                <div class="postProfileIcon">
                                    @if (isset($data['user_information']->profile_picture))
                                        <img
                                            src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                    @else
                                        <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                    @endif
                                </div>
                                <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>
                                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}</span>

                            </div>

                            <div class="d-flex second">

                                <span class="material-symbols-outlined user">

                                    supervised_user_circle

                                </span>

                                <p>Public</p>

                                <div class="dropdown EditPostDropdown">

                                    <span class="material-symbols-outlined more" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">

                                        more_horiz

                                    </span>

                                    <form class="dropdown-menu p-4" style="width: 177px;">
                                        <button type="button" class="btn edit mb-2">Edit</button>
                                        <button type="button" class="btn mb-2 delete"
                                            onclick="deletePost({{ $post->id }})" onclick="deletePost({{ $post->id  }})">Delete</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                        <h3 class="mt-4 text-content">@php

                            if (isset($post->PostText->post_content)) {
                                echo nl2br(e($post->PostText->post_content));
                            }

                        @endphp</h3>

                        <div id="carouselExampleCaptions2" class="carousel slide carouselExampleCaptions">
                            <audio controls preload="metadata">

                                <source
                                    src="{{ asset('public/user_media/' . $post->user_id . '/audio/' . $audioPaths[0]) }}"
                                    type="audio/ogg">

                            </audio>
                        </div>

                        <div class="d-flex links">
                            @if ($post->tags->count() > 0)
                                @foreach ($post->tags as $tag)
                                    <a href="{{ url("tag/$tag->slug") }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>
                        <div class="d-flex links">
                            @if ($post->post_scope == 'private')
                                @if ($post->viewers->isNotEmpty())
                                    Who can see your post:
                                    <span class="viewersData"
                                        style="    display: flex;
                                position: relative;
                                bottom: 7px;">
                                        @foreach ($post->viewers as $viewer)
                                            <a href="#">{{ $viewer->first_name }} {{ $viewer->last_name }}</a>
                                        @endforeach
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div> --}}
                @endif


                {{-- AUDIO END --}}



            @elseif($post->post_type == 'images' || $post->post_type == 'text/images')
                @php

                    if ($post->PostImage) {
                        $imagePaths = explode(',', $post->PostImage->image_path);
                    }

                @endphp

                @if ($post->PostImage)
                    {{-- IMAGES START --}}
                    <section id="{{ $post->id  }}">
                        @php $rand = rand(1,1000000) @endphp

                        <div class="card-layout imgcarousel" id="imgcarousel<?=$rand?>" >
                            <div class="card-top">
                                <div class="card-top-text">
                                    <div class="card-top-left">

                                        @if (isset($data['user_information']->profile_picture))
                                            <img class="avatar"
                                                 src="{{ asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                        @else
                                            <img class="avatar"
                                                 src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                        @endif

                                    </div>
                                    <div class="card-top-right">
                                        <div class=" edit dropdown">
                                            <div class=" editButton dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                                <div class="circle"></div>
                                            </div>
                                            <ul class="dropdown-menu button-box">
{{--                                                <li>--}}
{{--                                                    <button class="text-center btn public d-block my-2 w-100" >Edit</button>--}}
{{--                                                </li>--}}

                                                <li><button class="btn public mx-auto d-block my-2 w-100" onclick="deletePost({{ $post->id  }})">Delete</button></li>
                                            </ul>
                                        </div>
                                        <script>

                                            editimagespostDropdown = (id)=>{
                                                console.log(id)
                                                editPostDropdown = document.querySelector(`#${id} .editPostDropdown`)
                                                editPostDropdown.classList.toggle("activedropdown")
                                            }
                                        </script>
                                        <h6 class="avatar-text">{{ $data['user']->first_name }}
                                            {{ $data['user']->last_name }}</h6>
                                        <p><img src="{{ asset('storage/assets/posts') }}/img/clock.svg"
                                                alt="">
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('l, F d, Y \a\t h:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-top-desc">
                                    <div class="card-top-desc-text">
                                        <h3 class="content-text">@php

                                                if (isset($post->PostText->post_content)) {
                                                    echo nl2br(e($post->PostText->post_content));
                                                }

                                            @endphp</h3>
                                    </div>
                                    @if ($post->tags->count() > 0)
                                        <div class="card-top-desc-tags">
                                            @foreach ($post->tags as $tag)
                                                <span><a
                                                            href="{{ url("tag/$tag->slug") }}">#{{ $tag->name }}</a></span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-middle">
                                <div class="card2-content card2contentunique<?=$rand?>">

                                    <div class="card2-top">
                                        <div class="images">

                                            @php $images = $imagePaths @endphp
                                            @if (count($imagePaths) > 1)
                                                @foreach ($imagePaths as $index => $imagePath)


                                                    <img onclick="OpenImageModal(event, true,'{{ asset('public/user_media/' . $post->user_id . '/images/' . $imagePath) }}', 'card2contentunique<?=$rand?>')"
                                                         src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePaths[0]) }}"
                                                     class="d-block w-100">
                                            @endif
                                            <!-- {{-- <img src="{{ asset('storage/assets/posts') }}/img/card2-2.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-3.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-1.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-2.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-3.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-1.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-2.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-3.png">
                                                <img src="{{ asset('storage/assets/posts') }}/img/card2-1.png"> --}} -->
                                        </div>
                                    </div>
                                    @if (count($imagePaths) > 1)
                                        @php $counter = 1; @endphp
                                                <!-- <script>
                                    var indexValue = 1;
                                        </script> -->
                                        <div class="card2-bottom">
                                            <div class="card2-left " onclick="side_slide(-1, {{ count($images) }}, <?php echo $rand?>)">
                                                <button>
                                                    <img src="{{ asset('storage/assets/posts') }}/img/left.svg"
                                                         alt=""></button>
                                            </div>
                                            <div class="card2-middle">
                                                <!-- <img src="./img/card2-1.png" alt="">
                            <img src="./img/card2-2.png" alt="">
                            <img src="./img/card2-3.png" alt=""> -->

                                                <div class="btm-slides btmslidesunique<?=$rand?> slider-container">
                                                    <div class="slider postThumbnaulSlider" id="slider" style="transform:translateX(0);">
                                                        @foreach ($imagePaths as $index => $imagePath)
                                                            <span class="slider-item"
                                                                  onclick="btm_slide({{ $counter }}, {{ count($images) }}, <?php echo $rand?>)"><img
                                                                        src="{{ asset('user_media/' . $post->user_id . '/images/' . $imagePath) }}"
                                                                        style="width: 75px; height:75px; margin: auto 5px;"></span>
                                                            @php $counter++; @endphp
                                                        @endforeach

                                                        {{--
                                                            <span class="slider-item" onclick="btm_slide(2)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-2.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(3)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-3.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(4)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-1.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(5)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-2.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(6)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-3.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(7)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-1.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(8)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-2.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(9)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-3.png"></span>
                                                    <span class="slider-item" onclick="btm_slide(10)"><img
                                                            src="{{ asset('storage/assets/posts') }}/img/card2-3.png"></span> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-2-right" onclick="side_slide(1, {{ count($images) }}, <?php echo $rand?>)">
                                                <button><img src="{{ asset('storage/assets/posts') }}/img/right.svg"
                                                             alt=""></button>
                                            </div>
                                        </div>


                                    @endif
                                </div>







                            </div>
                            @if ($post->post_scope == 'private')
                                <div class="card-bottom">
                                    <div class="card-bottom-left">
                                        <p class="whoSeePrivateBtn">Visible to: </p>
                                        <button><img src="{{ asset('storage/assets/posts') }}/img/private.svg"
                                                     alt="">Private</button>
                                    </div>
                                    @if ($post->viewers->isNotEmpty())
                                        <div class="card-bottom-right">
                                            <div class="card-bottom-right-text">
                                                <p class="whoSee">Who can see your post?</p>
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catLeft"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                            <div class="card-bottom-right-tags">
                                                @foreach ($post->viewers as $viewer)
                                                    <span><a href="#">{{ $viewer->first_name }}
                                                            {{ $viewer->last_name }}</a></span>
                                                @endforeach
                                            </div>
                                            <div class="card-bottom-right-navbtn">
                                                <img class="catRight"
                                                     src="{{ asset('storage/assets/posts') }}/img/next.svg"
                                                     alt="">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </section>

                    {{-- IMAGES END --}}
                    {{-- <div class="post-section" id="{{ $post->id }}">
                        <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
                            <div class="d-flex first ">
                                <div class="postProfileIcon">
                                    @if (isset($data['user_information']->profile_picture))
                                        <img
                                            src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                                    @else
                                        <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                    @endif
                                </div>
                                <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>
                                <span
                                    id="postTime">{{ \Carbon\Carbon::parse($post->created_at)->format('j F \a\t h.i A') }}</span>
                            </div>
                            <div class="d-flex second">
                                <span class="material-symbols-outlined user">
                                    supervised_user_circle
                                </span>
                                <p>Public</p>
                                <div class="dropdown EditPostDropdown">
                                    <span class="material-symbols-outlined more" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">
                                        more_horiz
                                    </span>
                                    <form class="dropdown-menu p-4" style="width: 177px;">
                                        <button type="button" class="btn edit mb-2"
                                            onclick="openEditModal({{ $post->id }})">Edit</button>
                                        <button type="button" class="btn mb-2 delete"
                                            onclick="deletePost({{ $post->id }})">Delete</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                        <h3 class="mt-4 text-content">@php

                            if (isset($post->PostText->post_content)) {
                                echo nl2br(e($post->PostText->post_content));
                            }

                        @endphp</h3>
                        <div id="carouselExampleCaptions2" class="carousel slide carouselExampleCaptions">

                            @if (count($imagePaths) > 1)
                                <div class="carousel-indicators">

                                    @foreach ($imagePaths as $index => $imagePath)
                                        <div alt="" class="imgNavigator {{ $index === 0 ? 'active' : '' }}"
                                            data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0"
                                            aria-label="Slide 1"
                                            style="background: url('{{ asset('public/user_media/' . $post->user_id . '/images/' . $imagePath) }}">

                                        </div>
                                    @endforeach

                                </div>

                                <div class="carousel-inner">

                                    @foreach ($imagePaths as $index => $imagePath)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                                            <img src="{{ asset('public/user_media/' . $post->user_id . '/images/' . $imagePath) }}"
                                                class="d-block w-100">

                                        </div>
                                    @endforeach

                                </div>
                                <div class="navigatorScroll d-flex  justify-content-between">

                                    <button onclick="navigatorScroll(false, 'carouselExampleCaptions2')"><i
                                            class="fa-solid fa-chevron-left"></i></button>

                                    <button onclick="navigatorScroll(true, 'carouselExampleCaptions2')"> <i
                                            class="fa-solid fa-chevron-right"></i></button>

                                </div>
                            @else
                                <!-- Single image -->

                                <img src="{{ asset('public/user_media/' . $post->user_id . '/images/' . $imagePaths[0]) }}"
                                    class="d-block w-100">
                            @endif
                        </div>
                        <div class="d-flex links">
                            @if ($post->tags->count() > 0)
                                @foreach ($post->tags as $tag)
                                    <a href="{{ url("tag/$tag->slug") }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>
                        <div class="d-flex links">
                            @if ($post->post_scope == 'private')
                                @if ($post->viewers->isNotEmpty())
                                    Who can see your post:
                                    <span class="viewersData"
                                        style="    display: flex;
                                    position: relative;
                                    bottom: 7px;">
                                        @foreach ($post->viewers as $viewer)
                                            <a href="#">{{ $viewer->first_name }}
                                                {{ $viewer->last_name }}</a>
                                        @endforeach
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div> --}}
                @endif
            @endif
        @endforeach

        {{-- CONNECTING JS --}}

        <script src="{{ asset('storage/assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('storage/assets/posts/pt-main.js') }}"></script>


        {{-- CONNECTING JS END --}}
    @endif

    {{--     <div class="post-section" id="postId3">

        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">

            <div class="d-flex first">

                <div class="postProfileIcon">

                    @isset($data['user_information']->profile_picture)
                        <img src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                    @endisset

                </div>

                <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>

                <span>12 April at 09.28 PM</span>

            </div>

            <div class="d-flex second">

                <span class="material-symbols-outlined user">

                    supervised_user_circle

                </span>

                <p>Public</p>

                <div class="dropdown EditPostDropdown">

                    <span class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false"
                        data-bs-auto-close="outside">

                        more_horiz

                    </span>

                    <form class="dropdown-menu p-4" style="width: 177px;">
                        <button type="button" class="btn edit mb-2">Edit</button>
                        <button type="button" class="btn mb-2 delete" onclick="deletePost({{ $post->id  }})">Delete</button>
                    </form>

                </div>

            </div>

        </div>

        <audio controls preload="metadata">

            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-13.mp3" type="audio/ogg">

        </audio>

    </div>

    <div class="post-section" id="postId4">

        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">

            <div class="d-flex first">

                <div class="postProfileIcon">

                    @isset($data['user_information']->profile_picture)
                        <img src="{{ asset('public/user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) }}" />
                    @endisset

                </div>

                <p>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</p>

                <span>12 April at 09.28 PM</span>

            </div>

            <div class="d-flex second">

                <span class="material-symbols-outlined user">

                    supervised_user_circle

                </span>

                <p>Public</p>

                <div class="dropdown EditPostDropdown">

                    <span class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false"
                        data-bs-auto-close="outside">

                        more_horiz

                    </span>

                    <form class="dropdown-menu p-4" style="width: 177px;">
                        <button type="button" class="btn edit mb-2">Edit</button>
                        <button type="button" class="btn mb-2 delete" onclick="deletePost({{ $post->id  }})">Delete</button>
                    </form>

                </div>

            </div>

        </div>

    </div> --}}

</div>
