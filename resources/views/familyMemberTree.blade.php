<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="" name="description" />
    <meta content="greenbrier" name="keywords" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <title>Family Tree</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Link to the file hosted on your server, -->
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet" />
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        .container {
            max-width: 1637px !important;
        }
    </style>
</head>

<body style="background-color: #12203b17; overflow-x: hidden;">
    <div class="fadeBody"></div>
    <div class="sideMenu">
<div class="sideMenuIcons">
    
    <img src="./images/location.png" alt="">
    <div class="searchUser position-relative d-flex">
        <form role="search" class=" SearchUserInput position-absolute">
            <input type="search" placeholder="search a person" class="form-control search"  aria-label="Search">
            <img src="./images/sideSearch.png" alt="">
        </form>
        <img src="./images/searchuser.png" alt="" onclick="OpenSearchUser()">
    </div>
    <div class="zoom d-flex position-relative">
        <div class="zoomBtns position-absolute">
            <img src="./images/zoomout.png" alt="" onclick="zoomOut()">
            <img src="./images/zoomin.png" alt="" onclick="zoomIn()">
        </div>
        <img src="./images/zoom.png" alt="" onclick="OpenZoom()">
    </div>
</div>
        <img src="./images/menu.png" alt="" class="menu" onclick="OpenMenu(event)">
    </div>
    <!-- Header  -->
    <section class="main familymembertree">
        <div class="container-fluid header">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">
                        <img src="images/logosvg1.svg" alt="logo" />
                      </a>
                      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button> -->
                      <form class="d-flex d-none d-lg-block searchBar">
                          <div class="d-flex position-relative w-100">
          
                            <input
                            class="form-control me-2 search w-100"
                            placeholder="Search for users"
                            />
                            <a href="./SendRequestPage.html" class="position-absolute" style="top: 30%; right: 5%;"
                              >
                              <i class="fa fa-search  "  aria-hidden="true"></i>
                            </a>
                          </div>
                          <a class="cancelBtn"> Cancel </a>
                        </form>
                      <div class=" navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                          <li class="nav-item animation d-lg-none searchIconParent">
                              <a
                                class="nav-link text-center"
                                aria-current="page"
                                href="./index.html"
                              >
                                <i class="fa-solid fa-magnifying-glass"></i> <br />
                                Search</a
                              >
                            </li>
                          <li class="nav-item">
                            <a class="nav-link  text-center" aria-current="page" href="./index.html">
                              <img src="images/Vector (1).png" /><br />
                              Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active text-center" aria-current="page" href="./MyfamilyMember.html">
                              <img src="images/familytree.png" /><br />
                              My Family</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-center" href="./message.html">
                              <img src="images/Vector (2).png" /><br />
                              Message</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-center" href="./RequestPage.html">
                              <img src="images/requesticon.png" /><br />Request</a>
                          </li>
                          
                          <li class="nav-item dropdown">
                            <a class="nav-link text-center" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="images/Vector (3).png" /><br />Notification</a>
                              <ul class="dropdown-menu NotificationDropdown"> 
                                <li><a class="dropdown-item" href="./FAQ.html">Notifications</a></li>
                                <div class="requests">
                                  <div class="r1 d-flex justify-content-between">
                                      <div class="left d-flex">
                              
                                          <img src="./images/request.png" alt="">
                                          <div class="name">
                                              <h2>John cristeno <span>(Uncle)</span> Send you a Request </h2>
                                              <p>Johncristeno123@gmail.com</p>
                                              <div class="d-flex">
                                                  <button>Confirm</button>
                                                  <button>Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="right d-flex flex-column align-items-end">
                                          <p>Age: 34</p>
                                          <p>Spain <img src="./images/BG.png" alt=""></p>
                                      </div>
                                  </div>
                                  <div class="r1 d-flex justify-content-between">
                                      <div class="left d-flex">
                              
                                          <img src="./images/request.png" alt="">
                                          <div class="name">
                                              <h2>John cristeno <span>(Uncle)</span> Send you a Request </h2>
                                              <p>Johncristeno123@gmail.com</p>
                                              <div class="d-flex">
                                                  <button>Confirm</button>
                                                  <button>Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="right d-flex flex-column align-items-end">
                                          <p>Age: 34</p>
                                          <p>Spain <img src="./images/BG.png" alt=""></p>
                                      </div>
                                  </div>
                                  <div class="r1 d-flex justify-content-between">
                                      <div class="left d-flex">
                              
                                          <img src="./images/request.png" alt="">
                                          <div class="name">
                                              <h2>John cristeno <span>(Uncle)</span> Send you a Request </h2>
                                              <p>Johncristeno123@gmail.com</p>
                                              <div class="d-flex">
                                                  <button>Confirm</button>
                                                  <button>Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="right d-flex flex-column align-items-end">
                                          <p>Age: 34</p>
                                          <p>Spain <img src="./images/BG.png" alt=""></p>
                                      </div>
                                  </div>
                                  <div class="r1 d-flex justify-content-between">
                                      <div class="left d-flex">
                              
                                          <img src="./images/request.png" alt="">
                                          <div class="name">
                                              <h2>John cristeno <span>(Uncle)</span> Send you a Request </h2>
                                              <p>Johncristeno123@gmail.com</p>
                                              <div class="d-flex">
                                                  <button>Confirm</button>
                                                  <button>Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="right d-flex flex-column align-items-end">
                                          <p>Age: 34</p>
                                          <p>Spain <img src="./images/BG.png" alt=""></p>
                                      </div>
                                  </div>
                                  <div class="r1 d-flex justify-content-between">
                                      <div class="left d-flex">
                              
                                          <img src="./images/request.png" alt="">
                                          <div class="name">
                                              <h2>John cristeno <span>(Uncle)</span> Send you a Request </h2>
                                              <p>Johncristeno123@gmail.com</p>
                                              <div class="d-flex">
                                                  <button>Confirm</button>
                                                  <button>Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="right d-flex flex-column align-items-end">
                                          <p>Age: 34</p>
                                          <p>Spain <img src="./images/BG.png" alt=""></p>
                                      </div>
                                  </div>
                                
                               
                              </div>
                              </ul>
                          </li>
                     
                          <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="d-flex align-items-center">
                                <img src="images/Ellipse 6.png" class="girl postProfileIcon"/>
                                <p class="emile">emile</p>
                                <img src="images/arrow.png" class="arrow" />
                              </div>
                            </a>
                            <ul class="dropdown-menu navDropdown">
                              <li>
                                <div class="d-flex">
          
                                  <img src="images/Ellipse 6.png" alt="">
                                  <h2>Jenifer Emile
                                    <span>Jeniferemile126gmail.com</span>
                                  </h2>
                                </div>
                                <a href="./editProfile.html" class="ViewProfile">
                                  Edit Profile
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="./settings.html">Setting & Privacy</a>
                              </li>
                              <li><a class="dropdown-item" href="./FAQ.html">FAQ</a></li>
                              
                              <li>
                                <a class="dropdown-item" href="./contact.html">Contact</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="./contact.html">Sign Out</a>
                              </li>
                            </ul>
                          </li>
                          
                        </ul>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
    </section>
    <div class="container-fluid p-0 familyMemberTree" style="
        padding: 30px 0px !important;
        min-height: 100vh;
        overflow: scroll !important;
      ">
        <div class="container family-tree">

            <div class="row">
                <div class=" col-sm-3" style="top: 20px;">
                    <div class="green-outer">
                        <div class="green-box">
                            <div class="edit d-flex justify-content-end dropdown">
                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside"><span class="material-symbols-outlined "> edit
                                    </span></a>
                                <form class="dropdown-menu p-4 editDropdown">
                                    <p>Edit Info <span>* Indicates required</span></p>
                                    <h2>Basic Info</h2>
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                                        <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                            placeholder="Jenifer">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                                        <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                            placeholder="Emile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormEmail2" class="form-label">Email* </label>
                                        <input type="email" class="form-control" id="exampleDropdownFormEmail2"
                                            placeholder="Jeniferemile126gmail.com">
                                    </div>
                                    <div class="w-100 d-flex">

                                        <div class="mb-3 w-50">
                                            <label for="exampleDropdownFormEmail2" class="form-label">Country* </label>
                                            <div class="dropdown countryDropdown">
                                                <button class="button form-control dropdown-toggle"
                                                    id="exampleDropdownFormEmail2"
                                                    placeholder="Jeniferemile126gmail.com" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="./images/BG.png" alt="">
                                                    <img src="./images/dropdown.png" class="drop" alt="">
                                                    Spain
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>


                                        </div>
                                        <div class="mb-3 w-50">
                                            <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth*
                                            </label>
                                            <div class="dropdown countryDropdown">
                                                <button class="button form-control dropdown-toggle"
                                                    id="exampleDropdownFormEmail2"
                                                    placeholder="Jeniferemile126gmail.com" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="./images/cal.png" alt="">
                                                    <img src="./images/dropdown.png" class="drop" alt="">
                                                    <p id="editout">
                                                        02/17/2009
                                                    </p>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div id="c">
                                                        <div id="editdisp">

                                                            <div id="editprev" class="nav"><img
                                                                    src="./images/clprev.png" alt=""></div>
                                                            <div id="editmonth">Hello world</div>
                                                            <div id="editnext" class="nav"><img
                                                                    src="./images/Clnext.png" alt=""></div>
                                                        </div>
                                                        <div id="editcal"></div>

                                                        <div
                                                            class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                                                            <a href="" class="btn w-50 private">Cancel</a>
                                                            <a href="" class="btn w-50 public">Search</a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary submit">Save</button>
                                </form>
                            </div>
                            
                        </div>
                        <div class="greenemail">
                            <p>
                                Name: <span class="float-end">Jenifer Emile</span>
                              </p>
                            <p>
                                Email: <span class="float-end">Jeniferemile126gmail.com</span>
                            </p>
                            <p>Country: <span class="float-end">Spain</span></p>
                            <p>Age: <span class="float-end">38</span></p>
                        </div>
                    </div>
                    <div id="map">

                    </div>

                    <!-- <button class="btn w-100 bg-white reqpubpf">Request for Public Profile</button> -->
                    <button class="reqpubpf justify-content-center align-items-center">Request for Public Profile </button>
                </div>
                <div class="col-sm-9 p-0">
                    <div class="bar bg-white d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center">

                            <img src="./images/home.png" alt="" class="home">
                            <img src="./images/setting.png" alt="" class="setting">
                        </div>
                        <div class="input form-control">
                            <img src="./images/search.png" alt="">
                            <input class=" border-0" type="search" placeholder="Find someone on this tree">
                        </div>
                        <div class="d-flex align-items-center">

                            <input max="150" onchange="Range(event)" type="range" name="" id=""
                                class="range styled-slider slider-progress" value="100">
                            <p id="RangVal">
                                50%
                            </p>
                        </div>
                    </div>
                    <div class="family-tree" style=" width: 104%;">
                        <div id="zoomdiv" class="rows d-flex justify-content-center align-items-end"
                            style="flex-direction: column; position: relative; transform: scale(.75); top: -100px; ">
                            <div class="row1 cards d-flex position-relative" style="height: 300px; align-items: flex-end;">
                                <div  class="card deceasedCard">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <img src="./images/Fam1.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Grand Father</p>
                                        <p class="name">(Late) J.Bergson</p>
                                        <p>
                                            <span>1972-2023</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    
                                    <div class="line">
                                        <div class="circle"></div>
                                    </div>
                                    <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
                                </div>
            
                                <a onclick="GetLocation(39.29,-76.831)" class="card">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <img src="./images/fam2.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Grand Mother</p>
                                        <p class="name">Jocelyn Bergson</p>
                                        <p>
                                            <span>Age: 98</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <div class="line"></div>
            
                                </a>
            
            
            
                            </div>
                            <div class="row2 cards d-flex position-relative">
                                <div class="card deceasedCard">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam3.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Uncle</p>
                                        <p class="name">(Late) M.Levin</p>
                                        <p>
                                            <span>1972-2023</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
            
                                </div>
            
                                <a onclick="GetLocation(39.2, -76.641)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam4.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Aunt</p>
                                        <p class="name">Maria Levin</p>
                                        <p>
                                            <span>Age: 79</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                </a>
                                <a onclick="GetLocation(39.2, -76.891)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam5.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Father</p>
                                        <p class="name">Alfredo Levin</p>
                                        <p>
                                            <span>Age: 76</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <div class="line2">
                                        <div class="circle"></div>
                                    </div>
            
                                </a>
                                <div href="./DeceasedPersonProfile.html" class="card deceasedCard">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam6.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Grand Father</p>
                                        <p class="name">(Late) A. Levin</p>
                                        <p>
                                            <span>1972-2023</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    
                                    <div class="line2"></div>
                                    <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
                                </div>
                                <a onclick="GetLocation(39.2,-76.641)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam1.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Uncle</p>
                                        <p class="name">Gustavo Levin</p>
                                        <p>
                                            <span>Age: 80</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                </a>
                                <div href="" class="Vline"><div class="Iline"></div></div>
            
                            </div>
                            <div class="row3 cards d-flex position-relative">
                                <div  class="card deceasedCard">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
                                        <img src="./images/fam7.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Brother</p>
                                        <p class="name">(Late) B. Levin</p>
                                        <p>
                                            <span>1972-2023</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
                                </div>
                                <a onclick="GetLocation(39.22,-76.301)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
                                        <img src="./images/fam8.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Twin Sister</p>
                                        <p class="name">Erin Levin</p>
                                        <p>
                                            <span>Age: 50</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                </a>
                                <a onclick="GetLocation(39.34,-76.491)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
                                        <img src="./images/Fam9.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">You</p>
                                        <p class="name">Jakob Levin</p>
                                        <p>
                                            <span>Age: 58</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <div class="line2">
                                        <div class="circle"></div>
                                    </div>
            
                                </a>
                                <a onclick="GetLocation(39.045753, -76.641273)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
            
                                        <img src="./images/fam10.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Wife</p>
                                        <p class="name">Lydia Philips</p>
                                        <p>
                                            <span>Age: 51</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <div class="line2"></div>
            
                                </a>
                                <div href="" class="Vline">
                                    <div class="Iline"></div>
                                </div>
            
                            </div>
                            <div class="row4 cards d-flex position-relative">
                                <div  class="card deceasedCard">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
            
                                        <img src="./images/fam11.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Daughter</p>
                                        <p class="name">(Late) M.Levin</p>
                                        <p>
                                            <span>1972-2023</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                    <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
            
                                </div>
                                <a onclick="GetLocation(39.045753, -76.641273)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
                                        <img src="./images/fam12.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Son</p>
                                        <p class="name">Chance Levin</p>
                                        <p>
                                            <span>Age: 40</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                </a>
                                <a onclick="GetLocation(39.045753, -76.641273)" class="card bg-white">
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <div class="line"></div>
                                        <img src="./images/fam13.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center ">
                                        <p class="tag">Grand Daughter</p>
                                        <p class="name">Marley Levis</p>
                                        <p>
                                            <span>Age: 101</span> <br>
                                            <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                        </p>
                                    </div>
                                </a>
                                <div class="Vline"></div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>


        </div>
        
        <div class="col-sm-12 familyTreeMb" id="familyTreeMb">
            <!-- Main Person  -->
            <div class="per1 d-flex justify-content-start align-items-center">
                <div class="img">
                    <img src="./images/fam9.png" alt="">
                </div>
                <div class="text d-flex flex-column">
                    <p class="tag d-flex justify-content-center align-items-center">You</p>
                    <h2>Jakob Elvin</h2>
                    <div class="age d-flex justify-content-between align-items-center">
                        <p>Age: 58</p>
                        <p>Spain <img src="./images/BG.png" alt=""></p>
                    </div>
                </div>

             
                    <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                    </div>
            </div>
            <!-- main Person Tree  -->
            <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                <!-- INNER ACCORDIAN  -->
                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseOneInner" aria-expanded="true"
                    aria-controls="collapseOneInner">
                        <p>Grand Parents</p>
                        <img src="" alt="" >
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseOneInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="./images/fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="./images/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOneInnerI" aria-expanded="true" aria-controls="collapseOneInnerI"></div>
                        </div>
                        <div id="collapseOneInnerI" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwoInner" aria-expanded="true"
                    aria-controls="collapseTwoInner">
                        <p>Parents</p>
                        <img src="" alt="" >
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseTwoInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="./images/fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="./images/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwoInnerI" aria-expanded="true" aria-controls="collapseTwoInnerI"></div>
                        </div>
                        <div id="collapseTwoInnerI" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseThreeInner" aria-expanded="true"
                    aria-controls="collapseThreeInner">
                        <p>Spouse</p>
                        <img src="" alt="" >
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseThreeInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="./images/fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="./images/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThreeInnerI" aria-expanded="true" aria-controls="collapseThreeInnerI"></div>
                        </div>
                        <div id="collapseThreeInnerI" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseFourInner" aria-expanded="true"
                    aria-controls="collapseFourInner">
                        <p>Children</p>
                        <img src="" alt="" >
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseFourInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="./images/fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="./images/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFourInnerI" aria-expanded="true" aria-controls="collapseFourInnerI"></div>
                        </div>
                        <div id="collapseFourInnerI" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="Inner-accordian">
                    <!-- Second Person   -->
                    <div class="innerbtn d-flex justify-content-between align-items-center collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseFiveInner" aria-expanded="true"
                    aria-controls="collapseFiveInner">
                        <p>Siblings</p>
                        <img src="" alt="" >
                        <div class="img">

                        </div>
                    </div>
                    <!-- SEcond PErson Accordian  -->
                    <div id="collapseFiveInner" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <!-- INNER INNER ACCORDIAN  -->
                        <div class="per1 d-flex justify-content-start align-items-center">
                            <div class="img">
                                <img src="./images/fam1.png" alt="">
                            </div>
                            <div class="text d-flex flex-column">
                                <p class="tag d-flex justify-content-center align-items-center">Brother</p>
                                <h2>Mr Chipping</h2>
                                <div class="age d-flex justify-content-between align-items-center">
                                    <p>Age: 58</p>
                                    <p>Spain <img src="./images/BG.png" alt=""></p>
                                </div>
                            </div>

                            <div class="add accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFiveInnerI" aria-expanded="true" aria-controls="collapseFiveInnerI"></div>
                        </div>
                        <div id="collapseFiveInnerI" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Grand Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Parents</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Spouse</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Children</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                            <div class="innerbtn d-flex justify-content-between align-items-center collapsed">
                                <p>Siblings</p>
                                <img src="./images/addin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<!-- NAVBAR SEARCH ICON JS  -->
    <script>



        let zoom = 1
        const Range = (e) => {
            zoom = e.target.value * 0.01
            document.getElementById("RangVal").innerText = e.target.value
            if (e.target.value < 90) {

                document.getElementById("zoomdiv").style.transformOrigin = `center 0`
                document.getElementById("zoomdiv").style.transform = `scale(${zoom})`
            } else if (e.target.value > 90) {
                document.getElementById("zoomdiv").style.transformOrigin = ``
                document.getElementById("zoomdiv").style.transform = `scale(${zoom})`
                document.getElementById("zoomdiv").style.transformOrigin = `0% 0% 0px`

            }
        }
    </script>


    <!-- editcal  -->
    <script>
            ; (function ($, window, document, undefined) {
                'use strict';

                // helpers
                function _id(e) { return document.getElementById(e); }
                function _e(e) { return document.querySelector(e); }
                function _ee(e) { return document.querySelectorAll(e); }
                function _for(e, f) { var i, len = e.length; for (i = 0; i < len; i++) { f(e[i]); } }
                function log(e, before) { before = before || ''; console.log(before + e); }
                function _hasClass(el, selector) { var className = " " + selector + " "; if ((" " + el.className + " ").replace(/[\n\t]/g, " ").indexOf(className) > -1) { return true; } else { return false; } }


                // user select/click action
                function userSelect(e, main, month, year) {

                    var sel1 = _id('sel1'),
                        sel2 = _id('sel2');


                    var isDisabled = _hasClass(e, 'disabled');



                    // temp
                    _id('editout').innerHTML = e.innerText + '/' + month + '/' + year;







                } //userSelect(e);









                /*-----------------------------------------------------
                  
                  GET MONTH DATA
                  
                -----------------------------------------------------*/

                function getMonth(year, month) {

                    /* Expects month to be in 1-12 index based. */
                    var monthInformation = function (year, month) {
                        /* Create a date. Usually month in JS is 0-11 index based but here is a hack that can be used to calculate total days in a month */
                        var date = new Date(year, month, 0);
                        /* Get the total number of days in a month */
                        this.totalDays = date.getDate();
                        /* End day of month. Like Saturday is end of month etc. 0 means Sunday and 6 means Saturday */
                        this.endDay = date.getDay();
                        date.setDate(0);
                        /* Start day of month. Like Saturday is start of month etc. 0 means Sunday and 6 means Saturday */
                        this.startDay = date.getDay();
                        /* Here we generate days for 42 cells of a Month */
                        this.days = [];
                        /* Here we calculate previous month dates for placeholders if starting day is not Sunday */
                        var prevMonthDays = 0;
                        if (this.startDay !== 0) {
                            prevMonthDays = new Date(year, month - 1, 0).getDate() - this.startDay;
                        }
                        /* This is placeholder for next month. If month does not end on Saturday, placeholders for next days to fill other cells */
                        var count = 0;
                        // 42 = 7 columns * 6 rows. This is the standard number. Verify it with any standard Calendar
                        for (var i = 0; i < 42; i++) {
                            var day = {};
                            /* So start day is not Sunday, so we can display previous month dates. For that below we identify previous month dates */
                            if (i < this.startDay) {
                                day.date = (prevMonthDays = prevMonthDays + 1);
                                /* belong to next month dates. So, month does not end on Saturday. So here we get next month dates as placeholders */
                            } else if (i > this.totalDays + (this.startDay - 1)) {
                                day.date = (count = count + 1);
                                /* belong to current month dates. */
                            } else {
                                day.date = (i - this.startDay) + 1;
                            }
                            this.days[this.days.length] = day.date;
                        }
                    };
                    // ini


                    /* Usage below */
                    var m = {};
                    monthInformation.call(m, year, month);


                    var days = m.days,
                        startDay = m.startDay,
                        endDay = m.endDay,
                        totalDays = m.totalDays,
                        len = days.length,
                        key, str = '', i = 0,
                        t = $('#t');

                    //console.clear();
                    //console.log(m);

                    str += '<table>';
                    str += '<thead><tr><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr></thead><tbody>';

                    for (key in days) {
                        i++;

                        if (i === 1) str += '<tr>';

                        //if( key < startDay || key > totalDays ) { str += '<td class="notCurMonth"><i>'+days[key]+'</i></td>'; }
                        //else { str += '<td><i>'+days[key]+'</i></td>'; }

                        str += '<td><i>' + days[key] + '</i></td>';
                        console.log(key)
                        if (i === 7) { str += '</tr>'; i = 0; }

                    }
                    str += '</tbody></table>';
                    $('#editcal').append(str);



                } // end getMonth()

                // months array (0 based index)
                var monthArr = [
                    'january',
                    'february',
                    'march',
                    'april',
                    'may',
                    'june',
                    'july',
                    'august',
                    'september',
                    'october',
                    'november',
                    'december'
                ]

                /* INIT */
                var date = new Date();
                var month = date.getMonth() + 1,
                    year = date.getFullYear();

                getMonth(month, year);
                console.log(month)
                $('#editmonth').text(monthArr[month - 1] + ' ' + year); // set month text

                function bind(month, year) {
                    var tb = _id('editcal');
                    $(tb).on('click', 'td', function () { userSelect(this, null, month, year); });

                    // next month
                    $('#editdisp').on('click', 'div', function () {
                        var t = this;
                        if (t.id == 'editnext') {
                            month++;
                            if (month > 12) { year++; month = 1; } // switch year and reset month
                        }
                        else {
                            month--;
                            if (month < 1) { year--; month = 12; } // switch year and reset month
                        }

                        $('table').remove();
                        getMonth(month, year);
                        $('#editmonth').text(monthArr[month - 1] + ' ' + year);
                    })

                };

                bind(month, year);

            })(jQuery, window, document); // end() init
    </script>
    


    <script>
       
function initMap(){
    var MapLocation = {lat : 39.045753, lng : -76.641273}
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom : 10,
        center : MapLocation
    })

    let markerOptions = {
        position  : new google.maps.LatLng(39.045753,-76.641273),
        icon : "./images/marker.png"
    }
    let marker = new google.maps.Marker(markerOptions)
    
    
    let markerOptions2 = {
        position  : new google.maps.LatLng(39.2,-76.641),
        icon : "./images/marker2.png"
    }
    let marker2 = new google.maps.Marker(markerOptions2)
    let markerOptions3 = {
        position  : new google.maps.LatLng(39.2,-76.891),
        icon : "./images/marker3.png"
    }
    let marker3 = new google.maps.Marker(markerOptions3)
    let markerOptions4 = {
        position  : new google.maps.LatLng(39.29,-76.831),
        icon : "./images/marker4.png"
    }
    let marker4 = new google.maps.Marker(markerOptions4)
    let markerOptions5 = {
        position  : new google.maps.LatLng(39.22,-76.301),
        icon : "./images/marker5.png"
    }
    let marker5 = new google.maps.Marker(markerOptions5)
    let markerOptions6 = {
        position  : new google.maps.LatLng(39.34,-76.491),
        icon : "./images/marker6.png"
    }
    let marker6 = new google.maps.Marker(markerOptions6)
    marker.setMap(map)
    marker2.setMap(map)
    marker3.setMap(map)
    marker4.setMap(map)
    marker5.setMap(map)
    marker6.setMap(map)


}
const GetLocation = (lat, lng)=>{
    var MapLocation = {lat, lng}
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom : 12,
        center : MapLocation
    })

    let markerOptions = {
        position  : new google.maps.LatLng(39.045753,-76.641273),
        icon : "./images/marker.png"
    }
    let marker = new google.maps.Marker(markerOptions)
    
    
    let markerOptions2 = {
        position  : new google.maps.LatLng(39.2,-76.641),
        icon : "./images/marker2.png"
    }
    let marker2 = new google.maps.Marker(markerOptions2)
    let markerOptions3 = {
        position  : new google.maps.LatLng(39.2,-76.891),
        icon : "./images/marker3.png"
    }
    let marker3 = new google.maps.Marker(markerOptions3)
    let markerOptions4 = {
        position  : new google.maps.LatLng(39.29,-76.831),
        icon : "./images/marker4.png"
    }
    let marker4 = new google.maps.Marker(markerOptions4)
    let markerOptions5 = {
        position  : new google.maps.LatLng(39.22,-76.301),
        icon : "./images/marker5.png"
    }
    let marker5 = new google.maps.Marker(markerOptions5)
    let markerOptions6 = {
        position  : new google.maps.LatLng(39.34,-76.491),
        icon : "./images/marker6.png"
    }
    let marker6 = new google.maps.Marker(markerOptions6)
    marker.setMap(map)
    marker2.setMap(map)
    marker3.setMap(map)
    marker4.setMap(map)
    marker5.setMap(map)
    marker6.setMap(map)

}

let menu = false
 const OpenMenu = (e)=>{
menu = !menu
const sideMenu = document.querySelector(".sideMenuIcons")
const fadeBody = document.querySelector(".fadeBody")
if(menu){
    fadeBody.style.display = "flex"
    e.target.src = "./images/closemenu.png"
    sideMenu.style.visibility = "visible"
}else{
    
    fadeBody.style.display = "none"
    e.target.src = "./images/menu.png"
    sideMenu.style.visibility = "hidden"
}
 }


 let zoomToggle = false
let zoombutton = document.querySelector(".zoomBtns")
const OpenZoom = ()=>{
    zoomToggle = !zoomToggle
    if(zoomToggle){
        zoombutton.style.display = "flex"
    }else{
        zoombutton.style.display = "none"
    }
}

let SearchUSer = false
let SearchUserInput = document.querySelector(".SearchUserInput")
const OpenSearchUser = ()=>{
SearchUSer = !SearchUSer
if(SearchUSer){
    SearchUserInput.style.display = "flex"
}else{
    SearchUserInput.style.display = "none"
}
}


const zoomIn = ()=>{
    document.querySelector("#zoomdiv").style.transform = "scale(1)"
    document.querySelector("#zoomdiv").style.transformOrigin = "center center"
    document.querySelector("#zoomdiv").style.top = "81px"
}
const zoomOut = ()=>{
    document.querySelector("#zoomdiv").style.transform = "scale(.75)"
    document.querySelector("#zoomdiv").style.top = "-100px"

}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHCtv8Nf7HWwebTl98pcxfIfOkur3t-rg&callback=initMap"></script>
</body>

</html>