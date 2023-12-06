<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta content="" name="description" />
  <meta content="greenbrier" name="keywords" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="HandheldFriendly" content="true" />
  <title>Requests</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Link to the file hosted on your server, -->
  <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    .container {
      max-width: 1637px !important;
    }
  </style>
</head>

<body>
  <!-- Header  -->
  <section class="main">
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
                  <a class="nav-link text-center" aria-current="page" href="./MyfamilyMember.html">
                    <img src="images/familytree.png" /><br />
                    My Family</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-center" href="./message.html">
                    <img src="images/Vector (2).png" /><br />
                    Message</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-center active" href="./RequestPage.html">
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
  <div class="container-fluid p-0" style="
        background-color: rgba(18, 32, 59, 0.09);
        padding: 30px 0px !important;
        min-height: 100vh;
      ">
    <div class="container request mbreqpage">
      <div class="d-flex justify-content-center">
       <div class="col-3 contact  ">
<div class="d-flex w-100 justify-content-between align-items-start">
<h2>Family Requests <span>08</span></h2>
<a href="">(View Sent Requests)</a>
</div>
<div class="requests">
    <div class="r1 d-flex justify-content-between">
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
        <div class="left d-flex w-75">

            <img src="./images/request.png" alt="">
            <div class="name">
                <h2>John cristeno <span>(Brother)</span> </h2>
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
       </div>
       <div class="col9  contact" style="margin-top: 30px;">
<div class="top d-flex flex-column justify-content-center align-items-center">
    <img class="" src="./images/requestlg.png" alt="">
    <h2 class="text-center">John cristeno</h2>
</div>
<p class="d-flex justify-content-between align-items-center w-100">Email: <span>Johncristeno123@gmail.com</span></p>
<p class="d-flex justify-content-between align-items-center w-100">Age: <span>34</span></p>
<p class="d-flex justify-content-between align-items-center w-100">Country: <span>Spain <img src="./images/BG.png" alt=""></span></p>
<div class="box mx-auto d-flex justify-content-between">
<p class="w-50">John cristeno Sent you a request</p>
<div class="d-flex justify-content-center align-items-center">
    <button>Confirm Request</button>
    <button>Delete Request</button>
</div>
</div>       
</div>
      </div>
    </div>
  </div>
  
  <!-- NAVBAR SEARCH ICON JS  -->
  <script>
    window.addEventListener("resize", ()=>{

        if(window.innerWidth >992){
            window.location.href="./RequestPage.html"
        }
    })
  </script>
</body>

</html>