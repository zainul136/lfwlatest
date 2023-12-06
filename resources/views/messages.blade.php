@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')

    @include('vendor.Chatify.pages.app')

    {{--
    <div class="container-fluid p-0"
        style="
        background-color: rgba(18, 32, 59, 0.09);
        padding: 30px 0px !important;
        min-height: 100vh;
      ">
        <div class="container message">
            <div class="d-flex justify-content-center">
                <div class="col-3 contact  messages">
                    <div class="input d-flex justify-content-start align-items-center">
                        <img src="{{ asset('storage/assets/images') }}/search.png" alt="">
                        <input type="text " class="border-0 " placeholder="search for chat, People...">
                    </div>
                    <div class="online">
                        <h2>Online</h2>
                        <div class="d-flex">
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                            <p class="d-flex flex-column justify-content-center align-items-center"><img
                                    src="{{ asset('storage/assets/images') }}/online1.png" alt=""> <span>
                                    Jesus</span></p>
                        </div>
                    </div>
                    <div class="allmsgs">
                        <div class="d-flex justify-content-start align-items-center">

                            <div class="dropdown">

                                <h3 class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">All Messages
                                </h3>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Unread</a></li>

                                </ul>
                            </div>
                            <span class="unread">Unread(12)</span>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>Online</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time">10:58 AM</p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM <span
                                    class="alert">1</span></p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM <span
                                    class="alert">1</span></p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM</p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM <span
                                    class="alert">2</span></p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM</p>
                        </div>
                        <div class="d-flex r1 justify-content-between" onclick="OpenMessagePage()">
                            <div class="d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>
                                    <p>Jesus Cooper, <span>12 April</span></p>
                                    <p>Forem ipsum dolor sit amet, consectetur adipis.</p>
                                </div>
                            </div>
                            <p class="time d-flex flex-column justify-content-center align-items-center">10:58 AM</p>
                        </div>
                    </div>
                </div>
                <div class="col9  contact msgwindow" style="margin-top: 30px;">
                    <div class="top d-flex justify-content-between w-100 align-items-center">
                        <div class="d-flex justify-content-center align-items-start">

                            <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                            <p class="d-flex flex-column justify-content-center align-items-start">Jesus Cooper
                                <span>Online</span>
                            </p>
                        </div>
                        <img src="{{ asset('storage/assets/images') }}/search.png" alt="" class="search">
                    </div>
                    <div class="middle">
                        <p class="date">DEC 04, 2022</p>
                        <div class="r1 d-flex justify-content-between align-items-start">
                            <div class="left d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>


                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem
                                        sollicitudin lacus.</p>
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                        <div class="r1 r2 d-flex justify-content-between align-items-end">
                            <div class="left d-flex flex-row-reverse">

                                <img src="{{ asset('storage/assets/images') }}/Ellipse 6.png" alt="">
                                <div class="flex-column d-flex align-items-end">


                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem
                                        sollicitudin lacus.</p>
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                        <div class="r1 d-flex justify-content-between align-items-start">
                            <div class="left d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>


                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem.
                                    </p>
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                        <div class="r1 r2 d-flex justify-content-between align-items-end ">
                            <div class="left d-flex flex-row-reverse">

                                <img src="{{ asset('storage/assets/images') }}/Ellipse 6.png" alt="">
                                <div class="flex-column d-flex align-items-end">

                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem.
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                        <div class="r1 d-flex justify-content-between align-items-start">
                            <div class="left d-flex">

                                <img src="{{ asset('storage/assets/images') }}/online1.png" alt="">
                                <div>

                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem.
                                    </p>
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                        <div class="r1 r2 d-flex justify-content-between align-items-end ">
                            <div class="left d-flex flex-row-reverse">

                                <img src="{{ asset('storage/assets/images') }}/Ellipse 6.png" alt="">
                                <div class="flex-column d-flex align-items-end">

                                    <p>Gorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                        dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem.
                                </div>
                            </div>
                            <p class="right">
                                10:58 AM
                            </p>
                        </div>
                    </div>
                    <div class="bottom d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/assets/images') }}/more.png" alt="">
                        <img src="{{ asset('storage/assets/images') }}/voice.png" alt="" class="voice">
                        <img src="{{ asset('storage/assets/images') }}/emoji.png" alt="">
                        <input type="text">
                        <img src="{{ asset('storage/assets/images') }}/send.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR SEARCH ICON JS  -->
    <script>
        // Store the relevant element in a variable
        const searchIconParent = document.querySelector(".searchIconParent");
        const searchBar = document.querySelector(".searchBar");
        const navLinksParent = document.querySelector(".main .header .navbar");
        const navLinks = document.querySelectorAll(".main .header .navbar .nav-item");
        const cancelBtn = document.querySelector(".cancelBtn");

        // Applying event to that element
        searchIconParent.addEventListener("click", function(e) {
            e.preventDefault();

            searchBar.setAttribute("style", "display:flex !important");
            // navLinksParent.style.overflowX = "hidden";
            navLinksParent.style.width = "auto";
            searchBar.style.visibility = "visible";
            for (let i = 0; i < navLinks.length; i++) {
                if (i !== navLinks.length - 1) {
                    // navLinks[i].classList.remove("moveOrigin");
                    // navLinks[i].classList.add("moveRight");
                    navLinks[i].style.position = "absolute";
                    navLinks[i].style.display = "none";
                }
            }
        });

        cancelBtn.addEventListener("click", function(e) {
            e.preventDefault();

            searchBar.setAttribute("style", "display:none !important");
            navLinksParent.style.width = "100%";
            searchBar.style.visibility = "hidden";
            for (let i = 0; i < navLinks.length; i++) {
                if (i !== navLinks.length - 1) {
                    // navLinks[i].classList.remove("moveRight");
                    // navLinks[i].classList.add("moveOrigin");
                    navLinks[i].style.position = "unset";
                    navLinks[i].style.display = "block";
                }
            }
        });
    </script>
    <script src="{{ asset('storage/assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('storage/assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('storage/assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('storage/assets') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        const OpenMessagePage = () => {
            if (window.innerWidth <= 992) {
                window.location.href = "./MobilemsgPage.html"
            } else {
                return
            }
        }
    </script>
 --}}@endsection

@section('footer')
    @include('layouts.footer')
@endsection
