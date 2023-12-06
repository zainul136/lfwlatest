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
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="build/css/countrySelect.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Link to the file hosted on your server, -->
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        html{
            scroll-behavior: smooth !important;
        }
        .container {
            max-width: 1637px !important;
        }
    </style>
</head>

<body style="background-color: #12203b17; overflow-x: hidden;">
    <div class="fadeBody" onclick="OpenMenu(event)"></div>
    <div class="sideMenu">
<div class="sideMenuIcons">
    
    
    <img src="./images/location.png" alt=""  onclick="GetLocation(39.34,-76.491, 'Jakob Levin', 'jakoblevin@gmail.com', 58)">
    <div class="searchUser position-relative d-flex">
        <form role="search" class=" SearchUserInput position-absolute">
            <input type="search" placeholder="search a person" class="form-control search"  aria-label="Search">
            <a href="#"> <i class="fa fa-search " aria-hidden="true" ></i></a>


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
    <section class="main MyfamilyMember">
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
                            <a class="nav-link  active text-center" aria-current="page" href="./MyfamilyMember.html">
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
        /* padding: 30px 0px !important; */
        min-height: 100vh;
           overflow: scroll !important;
           overflow-x: hidden !important;
           padding-top: 0 !important;
      ">
        <div class="container  family-tree familyMembertree" style=" max-width: 100% !important;">


            <div class="w-100 d-flex flex-row-reverse">
                <div class=" col-sm-3" style="top: 20px; width: 33.33%; height: 100vh;">
                    <div class="green-outer ">
                        <div class="green-box">
                            <!-- <div class="edit d-flex justify-content-end dropdown">
                                <a href="" class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"><span class="material-symbols-outlined " > edit </span></a>
                                <form class="dropdown-menu p-4 editDropdown">
                                  <p>Edit Info <span>* Indicates required</span></p>
                                  <h2>Basic Info</h2>
                                  <div class="mb-3">
                                    <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Jenifer">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Emile">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleDropdownFormEmail2" class="form-label">Email* </label>
                                    <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Jeniferemile126gmail.com">
                                  </div>
                                  <div class="w-100 d-flex">
                
                                    <div class="mb-3 w-50">
                                      <label for="exampleDropdownFormEmail2" class="form-label">Country* </label>
                                      <div class="dropdown countryDropdown">
                                      <button class="button form-control dropdown-toggle" id="exampleDropdownFormEmail2" placeholder="Jeniferemile126gmail.com" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                      <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth* </label>
                                      <div class="dropdown countryDropdown">
                                      <button  class="button form-control dropdown-toggle" id="exampleDropdownFormEmail2" placeholder="Jeniferemile126gmail.com" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./images/cal.png" alt=""> 
                                        <img src="./images/dropdown.png" class="drop" alt="">
                                        <p id="editout">
                                          02/17/2009
                                        </p>
                                        </button>
                                        <div class="dropdown-menu">
                                            <div id="c">
                                                <div id="editdisp">
                                                
                                                <div id="editprev" class="nav"><img src="./images/clprev.png" alt=""></div><div id="editmonth">Hello world</div><div id="editnext" class="nav"><img src="./images/Clnext.png" alt=""></div></div>
                                                <div id="editcal"></div>
                                               
                                                <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
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
                              </div> -->
                           
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
                    <button class="reqpubpf justify-content-center align-items-center">Request for Public Profile </button>

                    <!-- <button class="btn w-100 bg-white">Request for Public Profile</button> -->
                </div>
                <div class="col-sm-9 p-0 " style="width: 66.67%;" >
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

                            <input max="150" onchange="Range(event)" type="range" name="" id="range"
                                class="range styled-slider slider-progress" value="100">
                            <p id="RangVal">
                                50%
                            </p>
                        </div>
                    </div>
                    <div class="family-tree" style="width:100%; overflow: scroll; height: 100vh;">
                        <div id="zoomdiv" class="rows d-flex justify-content-center align-items-start"
                        style="flex-direction: column; position: relative; transform: scale(1); top: 50px;">
                            <div class="row1 cards  position-relative" style="height: 400px; align-items: flex-end;">
                                <div  class="card deceasedCard" >
                                    <div class="addline"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                    <div class="img d-flex justify-content-center align-items-center">
                                        <img src="./images/Fam1.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">(Late) J.Bergson</p>
                                <p class="name">Grand Father</p>
                                <p>
                                    <span>1972-2023</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                            <div class="line"><div class="circle"></div></div>   
                            <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>

                            </div>
            
                                <a onclick="GetLocation(39.045753,-76.641273, 'Jocelyn Bergson','jocelynbergson@gmail.com', 98)"  class="card" >
                                    <div class="addline"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                    <div class="img d-flex justify-content-center align-items-center">
                                        
                                        <img src="./images/fam2.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag" id="tag" style="">Mohammad Waqas</p>
                                <p class="name" style="">Grand Mother</p>
                                <p>
                                    <span>Age: 98</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                            
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                            
                            <div class="line"></div>
                        </a>
                        
                            </div>
                            <div class="row2 cards  position-relative">
                                <div  class="card deceasedCard" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                    
            
                                        <img src="./images/fam3.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">(Late) M.Levin</p>
                                <p class="name">Uncle</p>
                                <p>
                                    <span>1972-2023</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
            
                                </div>
            
                                <a onclick="GetLocation(39.2,-76.641, 'Maria Levin', 'marialevin@gmail.com', 79)" class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                               
            
                                        <img src="./images/fam4.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Maria Levin</p>
                                <p class="name">Aunt</p>
                                <p>
                                    <span>Age: 79</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <a onclick="GetLocation(39.2,-76.891, 'Alfredo Levin', 'alfredolevin@gmail.com', 76)" style=""  class="card bg-white" id="yourCard" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                    
            
                                        <img src="./images/fam5.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Alfredo Levin</p>
                                <p class="name">Father</p>
                                <p>
                                    <span>Age: 76</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                
                                <div class="line2"><div class="circle"></div></div>    
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                
                                </a>
                                <div  class="card deceasedCard" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                        
            
                                        <img src="./images/fam6.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">(Late) A. Levin</p>
                                <p class="name">Grand Father</p>
                                <p>
                                    <span>1972-2023</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                <div class="line2"></div>
                                <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>

                                </div>
                                <a onclick="GetLocation(39.29,-76.831)"  class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                    
            
                                        <img src="./images/Fam1.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Gustavo Levin</p>
                                <p class="name">Uncle</p>
                                <p>
                                    <span>Age: 80</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <div class="Vline">
                                    <div class="Iline"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                                
                            </div>

                           
                            <div class="row3 cards  position-relative">
                                <div  class="card deceasedCard" >
                                    <div class="img d-flex justify-content-center align-items-center">
                               
                                    <img src="./images/fam7.png" class="card-img-top" alt="...">
                                    <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">(Late) B. Levin</p>
                                <p class="name">Brother</p>
                                <p>
                                    <span>1972-2023</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
            
                                </div>
                                <a onclick="GetLocation(39.29,-76.831, 'Erin Levin', 'erinlevin@gmail.com', 50)" class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                               
                                    <img src="./images/fam8.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Erin Levin</p>
                                <p class="name">Twin Sister</p>
                                <p>
                                    <span>Age: 50</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> </div>
            
                                </a>
                                <a  onclick="GetLocation(39.34,-76.491, 'Jakob Levin', 'jakoblevin@gmail.com', 58)" class="card bg-white main-card" >
                                    <div id="main-card"  class="img d-flex justify-content-center align-items-center">
                                        
                                    <img src="./images/fam9.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div  class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Jakob Levin</p>
                                <p class="name">You</p>
                                <p>
                                    <span>Age: 58</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="line2"><div class="circle"></div></div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <a onclick="GetLocation(39.29,-76.831)" class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                     
                                    <img src="./images/fam10.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Lydia Philips</p>
                                <p class="name">Wife</p>
                                <p>
                                    <span>Age: 51</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="line2"></div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <div class="Vline">
                                    <div class="Iline"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                                
                            </div>
                            <div class="row4 cards  position-relative">
                                <div href="./DeceasedPersonProfile.html" class="card deceasedCard" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                 
                                        
                                        <img src="./images/fam11.png" class="card-img-top" alt="...">
                                        <img src="./images/deceased.png" class="card-img-top deceased" alt="...">
            
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">(Late) M.Levin</p>
                                <p class="name">Daughter</p>
                                <p>
                                    <span>1972-2023</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
                                <a href="./DeceasedPersonProfile.html" class="profileBtn">Visit Profile</a>
            
                                </div>
                                <a onclick="GetLocation(39.29,-76.831)" class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                                        
                                    <img src="./images/fam12.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Chance Levin</p>
                                <p class="name">Son</p>
                                <p>
                                    <span>Age: 40</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <a onclick="GetLocation(39.29,-76.831)" class="card bg-white" >
                                    <div class="img d-flex justify-content-center align-items-center">
                      
                                    <img src="./images/fam13.png" class="card-img-top" alt="...">
                                        <div class="circle">
            
                                        </div>
                                    </div>
                                <div class="card-body d-flex justify-content-center align-items-center ">
                                <p class="tag">Marley Levis</p>
                                <p class="name">Grand Daughter</p>
                                <p>
                                    <span>Age: 101</span> <br>
                                    <span>Spain <img src="./images/BG.png" class="flag" alt=""></span>
                                </p>
                                </div>
                                <div class="addline2"><img src="./images/add.png" alt="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></div>
            
                                </a>
                                <div class="Vline vline-3rd" >
                                    <div class="Iline"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>   
                            </div>
                           
                        </div>
                        <button id="load-more" class="btn" style="margin: auto;
                        margin-top: 80px;
                        /* padding: 4px 9px; */
                        width: 164px;
                        height: 29px;
                        background: #99DDCC;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-radius: 2rem;
                        color: white;" onclick="Loadcards()">Load More</button>
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
                                <img src="./images/Fam1.png" alt="">
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
                                <img src="./images/fam2.png" alt="">
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
                                <img src="./images/Fam1.png" alt="">
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
                                <img src="./images/Fam1.png" alt="">
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
                                <img src="./images/Fam1.png" alt="">
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

            <div class="innerbtngreen my-3 mb-0 d-flex justify-content-between align-items-center collapsed" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <p>Add New Member</p>
                <img src="./images/addin.png" alt="">
                </div>
            <a href="./mobileMapLocation.html" class="innerbtngreen d-flex justify-content-between align-items-center collapsed" style="text-decoration: none; color: #222222;">
                <p>Member Map Location</p>
                <!-- <img src="./images/addin.png" alt=""> -->
            </a>
        </div>
        
    </div>
    <!-- MODAL  -->
    <div
    class="modal fade SendRequestModal"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="edit  d-flex justify-content-end dropdown">

            <form class="dropdown-menu p-4 editDropdown d-block">
                <i class="fa-solid fa-xmark fa-2x position-absolute" data-bs-dismiss="modal" style="top: 2%; right: 4%;"></i>
              <p>Add Family Member<span>* Indicates required</span></p>
              <h2>Basic Info</h2>
              <div class="row">

              <div class="mb-3 col-lg-6">
                <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Jenifer" >
              </div>
              <div class="mb-3 col-lg-6">
                <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Emile" >
              </div>
            </div>
            <div class="row">
              <div class="dropdown w-100 col-lg-6 mb-3">
                <label for="exampleDropdownFormEmail2" class="form-label">Relationship*</label>

                <button style="height: 46px;" class="form-control rlptext text-start dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    Sister in Law
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Sister in Law','rlptext')">Sister in Law</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Brother in law','rlptext')">Brother in law</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Mother in Law','rlptext')">Mother in Law</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Father in Law','rlptext')">Father in Law</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Cousin','rlptext')">Cousin</a></li>
                </ul>
              </div>

            </div>
            <div class="row">
              <div class="dropdown col-lg-6 mb-3">
                <label for="exampleDropdownFormEmail2" class="form-label ">Relationship with other*</label>

                <button style="height: 46px;" class="form-control rlpwithother text-start dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    Brother Of
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Brother Of','rlpwithother')">Brother Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Sister Of','rlpwithother')">Sister Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Husband Of','rlpwithother')">Husband Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Wife Of','rlpwithother')">Wife Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Son Of','rlpwithother')">Son Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Grand Son Of','rlpwithother')">Grand Son Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Great Grand Son Of','rlpwithother')">Great Grand Son Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Daughter Of','rlpwithother')">Daughter Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Grand Daughter Of','rlpwithother')">Grand Daughter Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Great Grand Daughter Of','rlpwithother')">Great Grand Daughter Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Father Of','rlpwithother')">Father Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Grand Father Of','rlpwithother')">Grand Father Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Great Grand Father Of','rlpwithother')">Great Grand Father Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Mother Of','rlpwithother')">Mother Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Grand Mother Of','rlpwithother')">Grand Mother Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Great Grand Mother Of','rlpwithother')">Great Grand Mother Of</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Myself','rlpwithother')">Myself</a></li>
                   
                </ul>
              </div>
              <div class="dropdown  col-lg-6 mb-3">
                <label for="exampleDropdownFormEmail2" class="form-label">Name*</label>
                <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Other Name" >
                <!-- <button style="height: 46px;" class="form-control rlpname text-start dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    J.Bergson
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('J.Bergson','rlpname')">J.Bergson</a></li>
                    <li><a class="dropdown-item" href="#" onclick="rlpDrop('Jocelyn Bergson','rlpname')">Jocelyn Bergson</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('M.Levin','rlpname')">M.Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Maria Levin','rlpname')">Maria Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Alfredo Levin','rlpname')">Alfredo Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('A.Levin','rlpname')">A.Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Gustavo Levin','rlpname')">Gustavo Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('B.Levin','rlpname')">B.Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Erin levin','rlpname')">Erin levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Jackob Levin','rlpname')">Jackob Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Lydia Phillips','rlpname')">Lydia Phillips</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('M.Levin','rlpname')">M.Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Chance Levin','rlpname')">Chance Levin</a></li>
                  <li><a class="dropdown-item" href="#" onclick="rlpDrop('Marley Levin','rlpname')">Marley Levin</a></li>
                </ul> -->
              </div>
            </div>
              <div class=" row">

                <div class="mb-3  col-lg-6">
                    <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth* </label>
                    <div class="dropdown countryDropdown">
                    <!-- <button  class="button form-control dropdown-toggle" id="exampleDropdownFormEmail2" data-bs-auto-close="outside" placeholder="Jeniferemile126gmail.com" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="./images/caltrans.png" alt="" class="borcer-0" style="border: 0 !important;"> 
                      <p id="editout" style="margin-left: 8px; margin-right: 186px;">
                        02/17/2009
                      </p>
                      <img src="./images/dropdown.png" class="drop" alt="" style="border: 0 !important; width: 11px; height: 6px;">
                      </button> -->
                      <img src="./images/caltrans.png" alt="" class="borcer-0" style="border: 0 !important;"> 
                      <!-- <input type="text" name="jqueryDate" class="date form-control" placeholder="mm/dd/yyyy" max="10"> -->
                      <!-- <input name="dob" id="txtDate" class="date-slashes form-control" type="tel" maxlength="10" placeholder="mm/dd/yyyy">               -->
                      <!-- <input name="date" class="form-control" type="text" id="date" placeholder="10/12/2013"/> -->
                      <input type="date" name="date" class="form-control" id="date_sh" onfocus="this.showPicker()" onClick="this.showPicker()"/>
                      
                      <div class="dropdown-menu">
                          <div id="c">
                              <div id="editdisp">
                              
                              <div id="editprev" class="nav"><img src="./images/clprev.png" alt=""></div><div id="editmonth">Hello world</div><div id="editnext" class="nav"><img src="./images/Clnext.png" alt=""></div></div>
                              <div id="editcal"></div>
                             
                              <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                                <a href="" class="btn w-50 private">Cancel</a>
                                <a href="" class="btn w-50 public">Search</a>
                              </div>
                        
                            </div>   
                      </div>
                     
                    </div>  
            
                    
                  </div>
                  <div class=" col-lg-6 justify-content-start align-items-center d-flex">

                      <div class="d-flex justify-content-center align-items-center">
                          <input checked type="checkbox"  id="exampleDropdownFormEmail2" class="radiobtn" onchange="AorD(event, 'alive')">
                          <label for="exampleDropdownFormEmail2" class="form-label" style="margin-bottom: 0; margin-left: 12px; margin-right: 20px;">Alive</label>
                        </div>
                      <div class=" d-flex justify-content-center align-items-center">
                          <input type="checkbox" onchange="AorD(event, 'deceased')" id="exampleDropdownFormEmail2" class="radiobtn">
                          <label for="exampleDropdownFormEmail2" class="form-label" style="margin-bottom: 0; margin-left: 12px;">Deceased</label>
                        </div>
                    </div>
               
             </div>
           
            <div class="row emailCountry" >
                <div class="mb-3  col-lg-6">
                    <label for="exampleDropdownFormEmail2" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="xyz@gmail.com" >
                  </div>
              <div class=" form-group  first col-lg-6">
                <label for="username mb-2" style="display: block;">Country</label>
                <input id="country_selector" type="text" class="form-group col-lg-12" style=" height: 46px;">
                <div class="form-item " style="display:none;">
                    <input class="form-group border-0" type="text" id="country_selector_code" name="country_selector_code"
                        data-countrycodeinput="1" readonly="readonly"
                        placeholder="Selected country code will appear here" />
                    <label for="country_selector_code">...and the selected country code will be
                        updated
                        here</label>
                </div>
            </div>

            </div>
            <div class="mapAddress">
                <div class="formGroup">
                    <label for="map_address_field" class="form-label">Map address</label>
                    <input type="text" class="form-control" id="map_address_field" name="map_address_field">
                </div>
                <div class="formGroup">
                    <label for="map_desc_sh" class="form-label">Description</label>
                    <textarea id="map_desc_sh" class="form-control" name="map_desc_sh"></textarea>
                </div>
            </div>
             

           <div class="d-flex btns my-2">

             <a href="./MyfamilyMember.html"  class="btn btn-primary submit">Add</a>
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>

<!-- NAVBAR SEARCH ICON JS  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>
<script>

// DATE 



// let $jqDate = $('.date-slashes');

// $jqDate.bind('keyup', function(ev) {
//   if (ev.which !== 8) {
//     let input = $jqDate.val();
//     let out = input.replace(/\D/g, '');
//     let len = out.length;

//     if (len > 1 && len < 4) {
//       out = out.substring(0, 2) + '/' + out.substring(2, 3);
//     } else if (len >= 4) {
//       out = out.substring(0, 2) + '/' + out.substring(2, 4) + '/' + out.substring(4, len);
//       out = out.substring(0, 10)
//     }
//     else{
//         input = input - 10;
//     }
//     $jqDate.val(out)
//   }
// });

// var date = document.getElementById('date');

// function checkValue(str, max) {
//   if (str.charAt(0) !== '0' || str == '00') {
//     var num = parseInt(str);
//     if (isNaN(num) || num <= 0 || num > max) num = 1;
//     str = num > parseInt(max.toString().charAt(0)) 
//            && num.toString().length == 1 ? '0' + num : num.toString();
//   };
//   return str;
// };

// date.addEventListener('input', function(e) {
//   this.type = 'text';
//   var input = this.value;
//   if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
//   var values = input.split('/').map(function(v) {
//     return v.replace(/\D/g, '')
//   });
//   if (values[0]) values[0] = checkValue(values[0], 12);
//   if (values[1]) values[1] = checkValue(values[1], 31);
//   var output = values.map(function(v, i) {
//     return v.length == 2 && i < 2 ? v + ' / ' : v;
//   });
//   this.value = output.join('').substr(0, 14);
// });


// jQuery('.date').bind('keyup', 'keydown', function(e) {
//   //check for numerics
//   var thisValue = $(this).val();
//   thisValue = thisValue.replace(/[^0-9\//]/g, '');
//   //get new value without letters
//   $(this).val(thisValue);
//   thisValue = $(this).val();
//   var numChars = thisValue.length;
//   $('#keyCount').html(numChars);
//   var thisLen = thisValue.length - 1;
//   var thisCharCode = thisValue.charCodeAt(thisLen);
//   $('#keyP').html(thisCharCode);
//   //To accomdate for backspacing, we detect which key was pressed - if backspace, do nothing:
//   if (e.which !== 8) {
//     if (numChars === 2) {
//       if (thisCharCode == 47) {
//         var thisV = '0' + thisValue;
//         $(this).val(thisV);
//       }
//       else if(thisValue > 12){
//         var thisV = '0' + thisValue;
//         $(this).val(thisV);     
//       }
//        else {
//         thisValue += '/';
//         $(this).val(thisValue);
//       }
//     }
//     if (numChars === 5) {
//       if (thisCharCode == 47) {
//         var a = thisValue;
//         var position = 3;
//         var output = [a.slice(0, position), '0', a.slice(position)].join('');
//         $(this).val(output);
//       } else {
//         thisValue += '/';
//         $(this).val(thisValue);
//       }
//     }
//     if (numChars > 10) {
//       var output2 = thisValue.slice(0, 10);
//       $(this).val(output2);
//     }
//   }
// });
// $('.date').blur(function() {
//   var thisValue = $(this).val();
//   var numChars = thisValue.length;
//   if (numChars < 10) {
//     $(this).addClass('brdErr');
//     $('#dateErr1').slideDown('fast');
//     $(this).select();
//   } else {
//     $(this).removeClass('brdErr');
//     $('#dateErr1').hide();
//   }
// });

// DATE CLOSE





    const loadmore = document.querySelector("#load-more");
    let initialCards = 2
    const Loadcards = ()=>{
        const cards = document.querySelectorAll(".cards")
        initialCards +=2;

for (let index = 0; index < initialCards; index++) {
    const element = cards[index];
    element.style.display = "flex"
    loadmore.style.display = "none";
    console.log("The cards are now scrolled")
    }
}
    


    // The Main Checker
    const p = document.querySelector("#tag");
    let newP;
    if(p.innerText.length > 10){
    newP = p.innerText.substr(0,15) + '...';
    p.innerText = newP;
    }
    else{
        newP = p.innerText.substr(0,15);
    }







    const rlpDrop = (value, text)=>{
        const element = document.querySelector(`.${text}`)
    element.innerText = value
    }
const AorD = (e,value)=>{
const element = document.querySelector(".emailCountry")
const radiobtn =  document.querySelectorAll(".radiobtn")
const mapdesc = document.querySelector(".mapAddress")


if(value == "alive"){
        element.style.display = "flex";
        mapdesc.style.display = "none";
        for (let index = 0; index < radiobtn.length; index++) {
            const el = radiobtn[index];
            el.checked = false        
        }
        e.target.checked = true
        }else{
            mapdesc.style.display = "flex";
            element.style.display = "none";
            for (let index = 0; index < radiobtn.length; index++) {
                const el = radiobtn[index];
                console.log(el.checked)     
                el.checked = false        

            }
            e.target.checked = true
        }
    }


    // Store the relevant element in a variable
  const searchIconParent = document.querySelector(".searchIconParent");
  const searchBar = document.querySelector(".searchBar");
  const navLinksParent = document.querySelector(".main .header .navbar");
  const navLinks = document.querySelectorAll(".main .header .navbar .nav-item");
  const cancelBtn = document.querySelector(".cancelBtn");
  
  // Applying event to that element
  searchIconParent.addEventListener("click", function (e) {
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
  
  cancelBtn.addEventListener("click", function (e) {
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script>



            let zoom = 1
           
                    const Range = (e) => {
            zoom = e.target.value * 0.01
                        document.getElementById("RangVal").innerText = e.target.value
                        if(e.target.value < 90){
            
                            document.getElementById("zoomdiv").style.transformOrigin =  `center 0`
                            document.getElementById("zoomdiv").style.transform =  `scale(${zoom})`
                        }else if(e.target.value > 90){
                            document.getElementById("zoomdiv").style.transformOrigin =  ``
                            document.getElementById("zoomdiv").style.transform =  `scale(${zoom})`
                            document.getElementById("zoomdiv").style.transformOrigin =  `0% 0% 0px`
            
                        }
                    }
                </script>

  <!-- editcal  -->
  <script>
    ;(function($, window, document, undefined) {
  'use strict';
  
  // helpers
  function _id(e) { return document.getElementById(e); }
  function _e(e) { return document.querySelector(e); }
  function _ee(e) { return document.querySelectorAll(e); }
  function _for(e,f) { var i, len=e.length; for(i=0;i<len;i++){ f(e[i]); }}
  function log(e, before) { before=before||''; console.log(before+e); }
  function _hasClass(el, selector) { var className = " " + selector + " "; if ((" " + el.className + " ").replace(/[\n\t]/g, " ").indexOf(className) > -1) { return true;  } else { return false; }}
  
  
  // user select/click action
  function userSelect(e,main,month,year){
          
          var sel1 = _id('sel1'),
                  sel2 = _id('sel2');
         
          
          var isDisabled = _hasClass(e, 'disabled');
              
      
              
              // temp
              _id('editout').innerHTML = e.innerText + '/' + month + '/' + year;
          
          
          
          
          
          
          
      } //userSelect(e);
  
      
  
  
  
  
  
  
  
  /*-----------------------------------------------------
    
    GET MONTH DATA
    
  -----------------------------------------------------*/
  
  function getMonth(year,month){
  
  /* Expects month to be in 1-12 index based. */
  var monthInformation = function(year, month){
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
    if(this.startDay !== 0) {
       prevMonthDays = new Date(year, month - 1, 0).getDate() - this.startDay;
    }
    /* This is placeholder for next month. If month does not end on Saturday, placeholders for next days to fill other cells */
    var count = 0;
    // 42 = 7 columns * 6 rows. This is the standard number. Verify it with any standard Calendar
    for(var i = 0; i < 42; i++) {
        var day = {};
        /* So start day is not Sunday, so we can display previous month dates. For that below we identify previous month dates */
        if(i < this.startDay) {
            day.date = (prevMonthDays = prevMonthDays + 1);
        /* belong to next month dates. So, month does not end on Saturday. So here we get next month dates as placeholders */
        } else if(i > this.totalDays + (this.startDay - 1)) { 
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
          key, str = '', i=0,
          t = $('#t');
  
      //console.clear();
      //console.log(m);
  
      str += '<table>';
      str += '<thead><tr><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr></thead><tbody>';
  
      for(key in days){
        i++;
  
        if(i === 1) str += '<tr>';
        
        //if( key < startDay || key > totalDays ) { str += '<td class="notCurMonth"><i>'+days[key]+'</i></td>'; }
        //else { str += '<td><i>'+days[key]+'</i></td>'; }
        
        str += '<td><i>'+days[key]+'</i></td>';

        if(i === 7) { str += '</tr>'; i=0; }
  
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

//   CALENDER START

  var date = new Date();
  var month = date.getMonth() + 1,
    year = date.getFullYear();
  
  getMonth(month, year);
  console.log(month)
  $('#editmonth').text( monthArr[month - 1] + ' ' + year); // set month text
  
  function bind(month,year){
  var tb = _id('editcal');
  $(tb).on('click', 'td', function(){ userSelect(this,null,month,year); });
  
//   next month
  $('#editdisp').on('click', 'div', function(){
    var t = this;
    if(t.id == 'editnext') {
      month++;
      if(month>12){ year++; month=1; } // switch year and reset month
    }
    else {
      month--;
      if(month<1){ year--; month=12; } // switch year and reset month
    }
    
    $('table').remove();
    getMonth(month,year);
    $('#editmonth').text( monthArr[month-1] + ' ' + year);
  })
  
  };
  
  bind(month,year);
  
  })(jQuery, window, document); // end() init
  </script>




<script>
const DeceasedCard = document.querySelectorAll(".deceasedCard")



console.log(DeceasedCard)


const UsersLocation = [
    {Lat : 39.045753,Lng : -76.641273, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Jocelyn Bergson", email : "jocelynbergson@gmail.com", age : 98},
    {Lat : 39.2, Lng : -76.641, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Maria Levin", email : "marialevin@gmail.com", age : 79},
    {Lat : 39.2,Lng :-76.891, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Alfredo Levin", email : "alfredolevin@gmail.com", age : 76}, 
    {Lat : 39.29,Lng : -76.831, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Erin Levin", email : "erinlevin@gmail.com", age : 50},
    {Lat : 39.29,Lng : -76.831, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Erin Levin", email : "erinlevin@gmail.com", age : 50},
    {Lat : 39.34,Lng : -76.491, PlaceID : "ChIJN1t_tDeuEmsRUsoyG83frY4", fields: ["name", "formatted_address", "place_id", "geometry"], name : "Jakob Levin", email : "jakoblevin@gmail.com", age : 58},
  
    
]
    async function initMap() {
    var MapLocation = {lat : 39.045753, lng : -76.641273}
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom : 10,
        center : MapLocation
    })
    const infowindow = new google.maps.InfoWindow();
    const service = new google.maps.places.PlacesService(map);

for (let index = 0; index < UsersLocation.length; index++) {
    const element = UsersLocation[index];

    let markerOptions = {
        position  : new google.maps.LatLng(element.Lat, element.Lng),
        icon : `./images/marker${index+1}.png`
    }
    let marker = new google.maps.Marker(markerOptions)
    marker.setMap(map)
    
    const request = {
        placeId : element.PlaceID,
        fields : element.fields
    }
    service.getDetails(request, (place, status) => {
      if (
        status === google.maps.places.PlacesServiceStatus.OK &&
        place &&
        place.geometry &&
        place.geometry.location
      ) {
        

          
          const Main = document.createElement("div");
          Main.setAttribute("class", "MarkerPopup")
          const content = document.createElement("div");
          const Country = document.createElement("p");
          const placeIdElement = document.createElement("p");
          const UserName = document.createElement("p");
          const UserEmail = document.createElement("p");
          const UserAge = document.createElement("p");
          const Active = document.createElement("p");
          const SendMessage = document.createElement("button");
          
          Active.setAttribute("class", "activeOnline")
          
          google.maps.event.addListener(marker, "click", async () => {
              
              
              
              const placeAddressElement = document.createElement("p");
              let Location = {}
              fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${element.Lat}&longitude=${element.Lng}&localityLanguage=en`)
              .then((res)=>res.json())
              .then(data=>{
                
                  
                  // placeIdElement.textContent = `${data.principalSubdivision}, ${data.postcode}, ${data.countryCode}`;
                  // content.appendChild(placeIdElement);
                  
                  UserName.innerHTML = `Name : <span> ${element.name} </span>`
                  content.appendChild(UserName);
                  
                  UserEmail.innerHTML = `Email : <span> ${element.email} </span>`
                  content.appendChild(UserEmail);
                  
                  Country.innerHTML = `Country : <span>${data.countryName}<img src="./images/BG.png"> </span> `
                  content.appendChild(Country);

                  UserAge.innerHTML = `Age : <span>${element.age}</span> `
                  content.appendChild(UserAge);

                  Active.innerHTML = "Last Location Updated 9 hr ago"

                  SendMessage.innerHTML = "Send Message"

                  Main.appendChild(content)
                  Main.appendChild(Active)
                  Main.appendChild(SendMessage)

                infowindow.setContent(Main);
                infowindow.open(map, marker);
                setTimeout(() => {
                    console.log("first")
                    const Close = document.querySelector(".gm-ui-hover-effect");
                    Close.innerHTML = "<img src='./images/closemenu.png'>"
                }, 200);
            })
            
            console.log(Location)
        });
      }
    });
}   

    
}

const addline1 = document.querySelector(".addline img")
const addline2 = document.querySelector(".addline2 img")

    addline1.addEventListener("click", function(e){
        e.stopPropagation();
        console.log("this button was pressed")
    })
    addline2.addEventListener("click", function(e){
        e.stopPropagation();
        console.log("this button was pressed")
    })

// CONST MAKER POPUP
// YOUR LOCATION
// UPDATING CARD TO CENTER

const cards = document.querySelectorAll(".cards")
    initialCards +=2;

const markerPopup = document.querySelector(".markerPopup")
const maincard = document.querySelector(".main-card")
const zoomdiv = document.querySelector(".zoomdiv")
var scrollAmount = 0;
var scrollMax = 1000;


const GetLocation = (lat, lng, name, email, age)=>{

    maincard.setAttribute("style" , "animation: pulse-border 1500ms ease-out")
    
    setTimeout(function(){
    maincard.removeAttribute("style" , "animation: pulse-border 1500ms ease-out")}, 2000);

    window.location.href = "#yourCard";


    if(name == "Jakob Levin"){
        for (let index = 0; index < initialCards; index++) {
    const element = cards[index];
    element.style.display = "flex"
    loadmore.style.display = "none";
    console.log("The cards are now scrolled")
    }
    }



    // if(name == "Jakob Levin"){
    //     let index = 0;
    //    if(index < initialCards){
    //     const element = cards[index];
    //     element.style.display = "flex"
    //     // loadmore.style.display = "none";
    //     console.log(cards[index])
    //    }
    // }
    console.log(maincard)
   
    
    

    var MapLocation = {lat, lng}
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom : 15,
        center : MapLocation
    })
    const infowindow = new google.maps.InfoWindow();
    const service = new google.maps.places.PlacesService(map);

for (let index = 0; index < UsersLocation.length; index++) {
    const element = UsersLocation[index];
    let markerOptions = {
        position  : new google.maps.LatLng(element.Lat, element.Lng),
        icon : `./images/marker${index+1}.png`
    }
    let marker = new google.maps.Marker(markerOptions)
    marker.setMap(map)
    
    const request = {
        placeId : element.PlaceID,
        fields : element.fields
    }
    service.getDetails(request, (place, status) => {
      if (
        status === google.maps.places.PlacesServiceStatus.OK &&
        place &&
        place.geometry &&
        place.geometry.location
      ) {
        

          
          const Main = document.createElement("div");
          Main.setAttribute("class", "MarkerPopup")
          const content = document.createElement("div");
          const Country = document.createElement("p");
          const placeIdElement = document.createElement("p");
          const UserName = document.createElement("p");
          const UserEmail = document.createElement("p");
          const UserAge = document.createElement("p");
          const Active = document.createElement("p");
          const SendMessage = document.createElement("button");
          
          Active.setAttribute("class", "activeOnline")
          
          google.maps.event.addListener(marker, "click", async () => {
              
              
              
              const placeAddressElement = document.createElement("p");
              let Location = {}
              fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${element.Lat}&longitude=${element.Lng}&localityLanguage=en`)
              .then((res)=>res.json())
              .then(data=>{
                  console.log(data)
                
                  
                  // placeIdElement.textContent = `${data.principalSubdivision}, ${data.postcode}, ${data.countryCode}`;
                  // content.appendChild(placeIdElement);
                  
                  UserName.innerHTML = `Name : <span> ${(element.lat == lat) ? name : element.name} </span>`
                  content.appendChild(UserName);
                  
                  UserEmail.innerHTML = `Email : <span> ${(element.lat == lat) ? email : element.email} </span>`
                  content.appendChild(UserEmail);
                  
                  Country.innerHTML = `Country : <span>${data.countryName}<img src="./images/BG.png"> </span> `
                  content.appendChild(Country);

                  UserAge.innerHTML = `Age : <span>${(element.lat == lat) ? age : element.age}</span> `
                  content.appendChild(UserAge);

                  Active.innerHTML = "Last Location Updated 9 hr ago"

                  SendMessage.innerHTML = "Send Message"

                  Main.appendChild(content)
                  Main.appendChild(Active)
                  Main.appendChild(SendMessage)

                infowindow.setContent(Main);
                infowindow.open(map, marker);
                setTimeout(() => {
                    console.log("first")
                    const Close = document.querySelector(".gm-ui-hover-effect");
                    Close.innerHTML = "<img src='./images/closemenu.png'>"
                }, 200);
            })
            
            console.log(Location)
        });
      }
    });
  }
}

const OpenMarkerPopup = (value, value1)=>{
    // markerPopup.style.display = "flex"
    console.log(value1)
    if(value1 == true){
        markerPopup.style.display = "flex"
    }else{
        markerPopup.style.display = "none"

    }
}

let menu = false
let zoomToggle = false
let SearchUSer = false
 const OpenMenu = (e)=>{
menu = !menu
console.log(menu)
const sideMenu = document.querySelector(".sideMenuIcons")
const fadeBody = document.querySelector(".fadeBody")
if(menu){
    fadeBody.style.display = "flex"
    document.querySelector(".menu").src = "./images/closemenu.png"
    sideMenu.style.visibility = "visible"
    
    
}else{
    
    fadeBody.style.display = "none"
    document.querySelector(".menu").src = "./images/menu.png"
    sideMenu.style.visibility = "hidden"
    SearchUserInput.style.display = "none"
    zoombutton.style.display = "none"
}
 }


 let zoombutton = document.querySelector(".zoomBtns")
let SearchUserInput = document.querySelector(".SearchUserInput")
const OpenZoom = ()=>{
    zoomToggle = !zoomToggle
    if(zoomToggle){
        zoombutton.style.display = "flex"
        SearchUserInput.style.display = "none"
        SearchUSer = false

    }else{
        zoombutton.style.display = "none"
    }
}

const OpenSearchUser = ()=>{
SearchUSer = !SearchUSer
if(SearchUSer){
    SearchUserInput.style.display = "flex"
    zoombutton.style.display = "none"
    zoomToggle = false
    
}else{
    SearchUserInput.style.display = "none"
}
}

let zoomValue = .75
let TopValue = 0
const zoomIn = ()=>{
    if(zoomValue == 1){
        return
    }
    zoomValue += .25
    TopValue += 150
    document.querySelector("#zoomdiv").style.transform =`scale(${zoomValue})`
    document.querySelector("#zoomdiv").style.transformOrigin = "center center"
    document.querySelector("#zoomdiv").style.top = `${TopValue}px`

}
const zoomOut = ()=>{
    if(zoomValue == .25){
        return
    }
    zoomValue -= .25
    TopValue -= 150
    document.querySelector("#zoomdiv").style.transform = `scale(${zoomValue})`
    document.querySelector("#zoomdiv").style.top = `${TopValue}px`

}



const markers = document.querySelectorAll(" #map ")

for (let index = 0; index < markers.length; index++) {
    const element = markers[index];
//    console.log(element)
}


window.initMap = initMap;
const GetUserLocation = ()=>{
    var loc = ""
    navigator.geolocation.getCurrentPosition((position)=>{
const latitude = position.coords.latitude
const longitude = position.coords.longitude
console.log(latitude, longitude)
// GetLocation(latitude, longitude)
const geoApi = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`


fetch(geoApi)
.then((res)=>res.json())
.then(data=> console.log(data))


    }, ()=>console.log("Invalid Location"))
}

// window.addEventListener("load", GetUserLocation)

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHCtv8Nf7HWwebTl98pcxfIfOkur3t-rg&callback=initMap&libraries=places&v=weekly"></script>


<!-- COUNTRY SELECT  -->
<script src="build/js/countrySelect.js"></script>
<script>
    $("#country_selector").countrySelect({
        // defaultCountry: "jp",
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // responsiveDropdown: true,
        preferredCountries: ['ca', 'gb', 'us']
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
</body>

</html>