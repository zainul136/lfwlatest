<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta content="" name="description" />
  <meta content="greenbrier" name="keywords" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="HandheldFriendly" content="true" />
  <title>Main Page</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="build/css/countrySelect.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                  <a class="nav-link active text-center" aria-current="page" href="./index.html">
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
  <div class="container-fluid p-0" style="
        background-color: rgba(18, 32, 59, 0.09);
        padding: 30px 0px !important;
        min-height: 100vh;
      ">
    <div class="container privateHome">
      <div id="searchModal">
        <div class="tag ms-3">
          <h4>Search Tags</h4>
          <input class="form-control me-2" type="text" placeholder="Search By Tags" />
          <div class="d-flex flex-wrap">
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
            <div class="">
              <button href="">Loremsum<span class="material-symbols-outlined">
                  cancel
                </span></button>
            </div>
          </div>
          <div id="calender" class="search-post" style="padding-bottom: 29px;">
            <div class="d-flex button-box deceased-Person-Top-Btn w-100">
                <a href="" class="btn w-50 public">Public</a>
                <a href="" class="btn w-50 private">Private</a>
              </div>
              <div id="c">
                <div class="btns">
                  <i id="custout1">MM/DD/YY</i>
                  <i style="margin: 0 10px; font-size: 22px;">-</i>
                  <i id="custout2">MM/DD/YY</i>
                </div>
    <div id="custdisp">
      
      <div id="custprev" class="custnav"><img src="./images/clprev.png" alt=""></div><div id="custmonth">Hello world</div><div id="custnext" class="custnav"><img src="./images/Clnext.png" alt=""></div></div>
      <div id="custcal"></div>
     
      <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
        <a href="" class="btn w-50 private">Cancel</a>
        <a href="" class="btn w-50 public">Search</a>
      </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 " id="SearchPost">
          <div class="green-outer me-5">
            <div class="green-box">
              <div class="edit d-flex justify-content-end dropdown">
                <a href="" class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"><span class="material-symbols-outlined " > edit </span></a>
                <form class="dropdown-menu p-4 editDropdown">
                  <p>Edit Info <span>* Indicates required</span></p>
                  <h2>Basic Info</h2>
                  <div class="row">

                  <div class="mb-3 col-lg-6">
                    <label for="exampleDropdownFormEmail2" class="form-label">First Name*</label>
                    <input disabled type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Jenifer" style="background: rgba(153, 153, 153, 0.3);">
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label for="exampleDropdownFormEmail2" class="form-label">Last Name*</label>
                    <input disabled type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Emile" style="background: rgba(153, 153, 153, 0.3);">
                  </div>
                </div>
                <div class="row">
                  <div class="dropdown col-lg-6 mb-3">
                    <label for="exampleDropdownFormEmail2" class="form-label">Gender*</label>

                    <button disabled style="height: 46px; background: rgba(153, 153, 153, 0.3);" class="form-control text-start dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: rgba(153, 153, 153, 0.3);">
                     Male
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Male</a></li>
                      <li><a class="dropdown-item" href="#">Female</a></li>
                    </ul>
                  </div>
                  <div class="mb-3 w-50 col-lg-6">
                    <label for="exampleDropdownFormEmail2" class="form-label">Date of Birth* </label>
                    <div class="dropdown countryDropdown">
                    <button disabled style="background: rgba(153, 153, 153, 0.3);" class="button form-control dropdown-toggle" id="exampleDropdownFormEmail2" placeholder="Jeniferemile126gmail.com" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="./images/caltrans.png" alt="" class="borcer-0" style="border: 0 !important;"> 
                      <p id="editout" style="margin-left: 8px; margin-right: 186px;">
                        02/17/2009
                      </p>
                      <img src="./images/dropdown.png" class="drop" alt="" style="border: 0 !important; width: 11px; height: 6px;">
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
                  <div class=" row">
                    <div class="mb-3 w-50 col-lg-6">
                      <label for="exampleDropdownFormEmail2" class="form-label">Email* </label>
                      <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Jeniferemile126gmail.com">
                    </div>
                    <div class="mb-3 w-50 col-lg-6">
                      <label for="phone" class="form-label">Phone Number* </label>
                      <input type="number" class="form-control" id="phone" placeholder="98xxxxxxxxxxxxxxx">
                    </div>
                    
                   
                 </div>
                 <div class="mb-3 ">
                  <label for="address" class="form-label">Address* </label>
                  <input type="text" class="form-control" id="address" placeholder="1610 County Road 75, Alturas, CA 96101">
                </div>
                <div class="w-100 row">
                  <div class="mb-3 col-lg-6">
                    <label for="city" class="form-label">City* </label>
                    <input type="text" class="form-control" id="city" placeholder="Madrid">
                  </div>
                  <div class=" form-group first col-lg-6">
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
               <div class="d-flex btns">

                <a href="./editProfile.html" class="btn ditPfBtn">Edit Profile</a>
                <button type="submit" class="btn btn-primary submit">Save</button>
               </div>
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
          <div class="search-post me-5">
            <h4>Search Post</h4>
            <p>Last 7 days</p>
            <p>Last 30 days</p>
            <p>Last 3 months</p>
            <p>Last 12 months</p>
            <p onclick="Calender()">Custom
            </p>
            <div id="calendar" class="cusotmCalender search-post" style="padding-bottom: 29px;">
              <div class="d-flex button-box deceased-Person-Top-Btn w-100">
                  <a href="" class="btn w-50 public me-2">Public</a>
                  <a href="" class="btn w-50 private">Private</a>
                </div>
                <div id="c" >
                  <div class="btns">
                    <i id="out1">MM/DD/YY</i>
                    <i style="margin: 0 10px; font-size: 22px;">-</i>
                    <i id="out2">MM/DD/YY</i>
                  </div>
                  <div id="disp">
                    
                    <div id="prev" class="nav"><img src="./images/clprev.png" alt=""></div><div id="month">Hello world</div><div id="next" class="nav"><img src="./images/Clnext.png" alt=""></div></div>
                    <div id="cal"></div>
                   
                    <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                      <a href="" class="btn w-50 private">Cancel</a>
                      <a href="" class="btn w-50 public">Search</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 p-0">
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content post-section p-0">
                <div class="modal-header border-0">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Write Something</h1>
                  <button type="button" class="btn-close" onclick="CloseModal(event, false)" id="closeModal"  aria-label="Close"  data-bs-target="#exampleModal"></button>
                </div>
                <div class="modal-body position-relative">
                  <div id="viewImg" class="viewImg position-absolute left-0"><button onclick="ViewImg('asdasd', false)" class="btn btn-primary">X</button><img src="" alt=""></div>
                  <div class="d-flex first align-items-center">
                    <img src="images/Ellipse 6.png" style="width: 40px; height: 40px; border-radius: 100%;"/>
                    <div class="d-flex justify-content-start align-items-start flex-column">

                      <p class="mb-0" style="color: #090914;">Jenifer emile</p>
                      <div class="dropdown">
                        <div class="position-relative">
                         <div class="ms-2  d-flex justify-content-center align-items-center p-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #F8FAFC;" id="privacy">
                           <img src="./images/earth.png" alt="" class="me-1"> <p  class="mb-0 ms-0"> Public </p> 
                         </div>
                         <ul class="dropdown-menu">
                          <li onclick="PostDD('everyone')"><a class="dropdown-item" href="#">Public</a></li>
                          <li onclick="PostDD('specific')"><a class="dropdown-item" href="#">Private</a></li>
                        </ul>
                      </div>
                      </div>
                    </div>
                    </div>
                  <textarea name="" placeholder="What’s on your mind, Jenifer?" id="CreatePostTextarea" cols="30" rows="10"></textarea>
                    <div class="displayImages" id="display"></div>
                    <!-- <img src="" alt="" id="SelectedImg"  class="mb-3"> -->
                    
                    <input type="text" class="form-control mb-2  py-3 border-1" style="display: none;width: 98%; border-color: #999999;" id="Specific" placeholder="Search People">
                  <div class="bottom align-items-start">
                    <p>Add to your post</p>
                    
                    <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                  <div class="w-75">
                    <div class="d-flex position-relative justify-content-end">
                      <div>
                        <input type="button" class="opacity-0 h-100 position-absolute"  style="width: 100%;" id="voice">
                        <img src="./images/voice2.png" alt="" >
                      </div>
                      <div>
                        <input type="button" class="opacity-0 h-100 position-absolute dropdown-toggle"  style="width: 100%;" id="tagsBtn"  data-bs-toggle="dropdown"  data-bs-auto-close="outside" aria-expanded="false" >
                        <img src="./images/tag.png" alt="" >
                        <div class="dropdown-menu">
                          <form class="px-4 py-3">
                            <div class="mb-3">
                              <label for="exampleDropdownFormEmail1" class="form-label">Select Tags</label>
                              <input type="text" class="form-control" id="tagsInput" placeholder="Lorem Ipsum" >
                            </div>
                            <button class="btn btn-primary" onclick="InputTags(event)">Confirm</button>
                          
                            <div class="tagsrow my-2" id="tagsrow">
                              <div class="" id="tag1">
                                <button href=""  onclick="AddTags(event, 'tag1')">Sample Tag 1 </button>
                                
                              </div>
                              <div class="" id="tag2">
                                <button href=""  onclick="AddTags(event, 'tag2')">Sample Tag 2</button>
                                
                              </div>
                              <div class=""  id="tag3">
                                <button href=""  onclick="AddTags(event, 'tag3')">Sample Tag 1</button>
                                
                              </div>
                              <div class="" id="tag4">
                                <button href=""  onclick="AddTags(event, 'tag4')">Sample Tag 2</button>
                                
                              </div>
                              <div class=""  id="tag5">
                                <button href=""  onclick="AddTags(event, 'tag5')">Sample Tag 1</button>
                               
                              </div>
                              <div class="" id="tag6">
                                <button href=""  onclick="AddTags(event, 'tag6')">Sample Tag 2</button>
                              </div>
                              
                            </div>
                      
                          </form>
                        </div>
                      </div>
                      <!-- <img src="./images/tag.png" alt="" > -->
                     
                      <div>
                        <input type="file"  multiple="multiple" class="opacity-0 h-100 position-absolute"  style="width: 100%;" id="docBtn" value="valueee">
                        <img src="./images/doc.png" alt="" >
                      </div>
                      <div class="d-flex">
                        <input type="file" class="w-100 opacity-0 h-100 position-absolute" id="UploadImages" accept="image/png, image/jpg" multiple="multiple" value="valuee" data-maxFileSize="2">
                        <img src="./images/img.png" alt="">
                      </div>
                    </div>
                    <div class="documents d-flex flex-column" style="width: -webkit-fill-available;" >
                    <div class="voice"></div>
                    <div class="tagsrow" id="tags"></div>
                    <div class="docs" id="docs"></div>
                    </div>
                    <!-- DOCUMENTS DISPLAY AND UPLOAD BTNS -->
                  </div>
                  </div>
                  <div class="d-flex button-box justify-content-end">
                    <a href="" class="btn public" onclick="PublishPost(event)">Publish</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="something">
            <div class="d-flex justify-content-between first-second mb-3">
              <h4>Write Something</h4>
          
            </div>
            <div class="d-flex justify-content-between second" onclick="(CloseModal(event, true))" data-bs-target="#exampleModal">
              <div class="d-flex w-100">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
           
                <p class="input w-100 mb-0 d-flex justify-content-start align-items-center" style="outline: none;">
                  What’s on your mind?
              </p>
              </div>
            </div>
          </div>
          <div class="d-flex button-box">
            <a href="./index.html" class="btn  private">Public</a>
            <a href="./privateHome.html" class="btn public">Private</a>
            <button class="btn"  style="margin-left: auto;" onclick="Search()"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
          <div class="Posts">

          <div class="post-section" id="postId1">
            <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <!-- <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span> -->
                <img src="./images/private.png" alt="" style="width: 20px; height: 20px;">
                <p>Private</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 200px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete" onclick="DeletePost('postId1')">Delete</button>
                      
                     
                      <div class="mb-3">
                        <label for="exampleDropdownFormEmail2" class="form-label">Add Family Member</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Add">
                      </div>
                      <button type="submit" class="btn ">Save</button>
                    </form>
                  </div>
              </div>
            </div>
            <h3 class="mt-4">Peace On Earth A Wonderful Wish But No Way</h3>
            <div class="d-flex links">
              <a href=""># Loremsum</a>
              <a href=""># Loremsum</a>
              <a href=""># Loremsum</a>
            </div>
          </div>
          <div class="post-section" id="postId2">
            <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first ">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Public</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 177px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete"  onclick="DeletePost('postId2')">Delete</button>
                      
                    </form>
                  </div>
              </div>
            </div>
            <div class="tagsrow mb-2">
            </div>
            <!-- <h3 >${CreatePostTextarea.value}</h3> -->
            <div id="carouselExampleCaptions2" class="carousel slide carouselExampleCaptions">
             
                <div class="carousel-indicators">
              <div  alt="" class="imgNavigator active" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0"   aria-label="Slide 1" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1"   aria-label="Slide 2" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2"   aria-label="Slide 3" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="3"   aria-label="Slide 4" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="4"   aria-label="Slide 5" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="5"   aria-label="Slide 6" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="6"   aria-label="Slide 7" style="background: url('./images/slider-image.png');"></div>
              <div  alt="" class="imgNavigator" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="7"   aria-label="Slide 8" style="background: url('./images/slider-image.png');"></div>

             
            </div>
            
        
                   
            <div class="carousel-inner">
              <div class=" carousel-item active">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
              <div class=" carousel-item ">
                <img src="images/slider-image.png" alt="" class="d-block w-100">
              </div>
            </div>
<div class="navigatorScroll d-flex  justify-content-between">
<button onclick="navigatorScroll(false, 'carouselExampleCaptions2')"><i class="fa-solid fa-chevron-left"></i></button>
<button onclick="navigatorScroll(true, 'carouselExampleCaptions2')">    <i class="fa-solid fa-chevron-right"></i></button>
</div>
  
</div>
          </div>
          <div class="post-section" id="postId3">
            <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <img src="./images/private.png" alt="" style="width: 20px; height: 20px;">

                <p>Private</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 200px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete" onclick="DeletePost('postId3')">Delete</button>
                      
                     
                      <div class="mb-3">
                        <label for="exampleDropdownFormEmail2" class="form-label">Add Family Member</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Add">
                      </div>
                      <button type="submit" class="btn ">Save</button>
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
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Private</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 200px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete" onclick="DeletePost('postId4')">Delete</button>
                      
                     
                      <div class="mb-3">
                        <label for="exampleDropdownFormEmail2" class="form-label">Add Family Member</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Add">
                      </div>
                      <button type="submit" class="btn ">Save</button>
                    </form>
                  </div>
              </div>
            </div>
            
          </div>
        </div>

        </div>
        <div class="col-sm-3">
          <div class="tag ms-3">
            <h4>Search Tags</h4>
            <input class="form-control me-2" type="text" placeholder="Search for tags" />
            <div class="tagsrow">
              <div class="">
                <button href="">Loremsum</button>
              </div>
              <div class="">
                <button href="">Loremsum</button>
              </div>
              <div class="">
                <button href="">Loremsum</button>
              </div>
              <div class="">
                <button href="">Loremsum</button>
              </div>
              <div class="">
                <button href="">Loremsum</button>
              </div>
              <div class="">
                <button href="">Loremsum</button>
              </div>
            </div>

          </div>
          <div class="family ms-3">
            <h4>Family Members</h4>
            <input placeholder="search" class="form-control" />
            <div class="SidefamilyMembers">

            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 16.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family1.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family1.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family1.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family2.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family2.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/family2.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 6.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 6.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 6.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 6.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
              <div class="d-flex" style="position: relative">
                <img src="images/Ellipse 6.png" />
                <p>Morgan</p>
                <span>Age: 54</span>
              </div>
              <div style="position: relative" class="second">
                <img src="images/BG.png" class="img-fluid" />
                <span>Uncle</span>
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
    const Search = ()=>{
      if(window.innerWidth <= 1140 && window.innerWidth >=992){
        document.getElementById("SearchPost").classList.toggle("searchpostactive")
      }else if(window.innerWidth <=992){

        const searchModal = document.getElementById("searchModal")
        // searchModal.style.display = "flex"
        searchModal.classList.toggle("searchModalActive")
      }
    }

    const Calender = ()=>{

    document.getElementById("calendar").classList.toggle("cusotmCalenderactive")
    }
  </script>
<!-- cal -->
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
    
  // first doesnt exist
  if( sel1 === null && !isDisabled ) {
    e.id = 'sel1';
    e.classList.add('sel1');
    $(e).parent().prevAll('tr').find('td').addClass('disabled'); // ugly code
    $(e).prevAll('td').addClass('disabled'); // ugly code
    //log('select second option');
    
    // temp
    _id('out1').innerHTML = + e.innerText + '/' + month + '/' + year;
  
  
  }
  
  // second doesnt exist
  else if( sel2 === null ){ // prevent making #2 to #1
    if(isDisabled || e.id == 'sel1') return false;
    e.id = 'sel2';
    e.classList.add('sel2');
      
    // selection is complete
    var par = e.parentNode,			// tr
      parPar = par.parentNode;	// tbody (main)
      
      var td = parPar.querySelectorAll('td'),
        go = false,
        stop = false,
        i=0,
        s1i=0,
        s2i=999;
    
    _for(td, function(e){
      i++;
      
      if( e.id == 'sel1' ) { go=1; s1i = i; }
      if( e.id == 'sel2' ) { stop=1; s2i = i; }
      
      if( s1i < s2i && go ){
        if(go){ e.classList.add('range'); }
        // temp
        _id('out2').innerHTML = + e.innerText + '/' + month + '/' + year;
        
      }
      if(stop){ go=0; }
      
    })			
    
    
  }
  
  // both selections exist
  else {
    var td = e.parentNode.parentNode.querySelectorAll('td');
    _for(td, function(e){ e.classList.remove('range','disabled'); });
    
    sel1.removeAttribute('class');
    sel1.removeAttribute('id');
    if(sel2 !== null){
      sel2.removeAttribute('class');
      sel2.removeAttribute('id');
    }
    
  } //end else/if
  
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
    $('#cal').append(str);
  
  
  
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
$('#month').text( monthArr[month - 1] + ' ' + year); // set month text

function bind(month,year){
var tb = _id('cal');
$(tb).on('click', 'td', function(){ userSelect(this,null,month,year); });

// next month
$('#disp').on('click', 'div', function(){
  var t = this;
  if(t.id == 'next') {
    month++;
    if(month>12){ year++; month=1; } // switch year and reset month
  }
  else {
    month--;
    if(month<1){ year--; month=12; } // switch year and reset month
  }
  
  $('table').remove();
  getMonth(month,year);
  $('#month').text( monthArr[month-1] + ' ' + year);
})

};

bind(month,year);

})(jQuery, window, document); // end() init
</script>

 <!-- custcal  -->
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
    
  // first doesnt exist
  if( sel1 === null && !isDisabled ) {
    e.id = 'sel1';
    e.classList.add('sel1');
    $(e).parent().prevAll('tr').find('td').addClass('disabled'); // ugly code
    $(e).prevAll('td').addClass('disabled'); // ugly code
    //log('select second option');
    
    // temp
			_id('custout1').innerHTML = + e.innerText + '/' + month + '/' + year;
  }
  
  // second doesnt exist
  else if( sel2 === null ){ // prevent making #2 to #1
    if(isDisabled || e.id == 'sel1') return false;
    e.id = 'sel2';
    e.classList.add('sel2');
      
    // selection is complete
    var par = e.parentNode,			// tr
      parPar = par.parentNode;	// tbody (main)
      
      var td = parPar.querySelectorAll('td'),
        go = false,
        stop = false,
        i=0,
        s1i=0,
        s2i=999;
    
    _for(td, function(e){
      i++;
      
      if( e.id == 'sel1' ) { go=1; s1i = i; }
      if( e.id == 'sel2' ) { stop=1; s2i = i; }
      
      if( s1i < s2i && go ){
        if(go){ e.classList.add('range'); }
        // temp
        _id('custout2').innerHTML = + e.innerText + '/' + month + '/' + year;

      }
      if(stop){ go=0; }
      
    })			
    
    
  }
  
  // both selections exist
  else {
    var td = e.parentNode.parentNode.querySelectorAll('td');
    _for(td, function(e){ e.classList.remove('range','disabled'); });
    
    sel1.removeAttribute('class');
    sel1.removeAttribute('id');
    if(sel2 !== null){
      sel2.removeAttribute('class');
      sel2.removeAttribute('id');
    }
    
  } //end else/if
  
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
      console.log(key)
      if(i === 7) { str += '</tr>'; i=0; }

    }
    str += '</tbody></table>';
    $('#custcal').append(str);
  
  
  
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
$('#custmonth').text( monthArr[month -1 ] + ' ' + year); // set month text

function bind(month,year){
var tb = _id('custcal');
$(tb).on('click', 'td', function(){ userSelect(this,null,month,year); });

// next month
$('#custdisp').on('click', 'div', function(){
  var t = this;
  if(t.id == 'custnext') {
    month++;
    if(month>12){ year++; month=1; } // switch year and reset month
  }
  else {
    month--;
    if(month<1){ year--; month=12; } // switch year and reset month
  }
  
  $('table').remove();
  getMonth(month,year);
  $('#custmonth').text( monthArr[month-1] + ' ' + year);
})

};

bind(month,year);

})(jQuery, window, document); // end() init
</script>



  <!-- Carousel  -->
  <script>
    const carouselItem = document.querySelectorAll(".carousel-item")
    const CarouselChange = (id)=>{
      for (let index = 0; index < carouselItem.length; index++) {
        const element = carouselItem[index];
        element.classList.remove("active")
      }
document.getElementById(id).classList.add("active")
// console.log(document.getElementById(id))
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
        console.log(key)
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
  var date = new Date();
  var month = date.getMonth() + 1,
    year = date.getFullYear();
  
  getMonth(month, year);
  console.log(month)
  $('#editmonth').text( monthArr[month - 1] + ' ' + year); // set month text
  
  function bind(month,year){
  var tb = _id('editcal');
  $(tb).on('click', 'td', function(){ userSelect(this,null,month,year); });
  
  // next month
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




<!-- Uplaod Image  -->
<script>
  const input =  document.getElementById("UploadImages")
  const docBtn = document.getElementById("docBtn")
  const Voicebtn = document.getElementById("voice")
  const tagsBtn = document.getElementById("tagsBtn")
  // const tagsbtn = document.querySelectorAll(".tagsrow button")
  
  


  const img = document.createElement("img")
  // POST IMAGE UPLOAD AND DISPLAY 
      
input.addEventListener("click", (e)=>{
e.target.value = null
})
input.addEventListener("change", (e)=>{
  const files = e.target.files
  console.log("afasf")
  const display = document.getElementById("display")
  for (let index = 0; index < files.length; index++) {
    const fileReader = new FileReader()   
    fileReader.addEventListener("load", (e)=>{
const picfile = e.target
const div = document.createElement("div")
div.setAttribute("id",`Image${index+3273}`)
// console.log(picfile)
div.innerHTML = `<p class="closeImg btn-close" onclick="closeImg('Image${index+3273}')" ></p> <img src="${picfile.result}" onclick='ViewImg("${picfile.result}", true)'>`
display.append(div)
    })
    fileReader.readAsDataURL(files[index])
  }
docBtn.disabled = true
Voicebtn.disabled = true

})

const closeImg = (id)=>{
document.getElementById(id).remove()
}

const ViewImg = (src, bool)=>{
  if(bool){

    const div = document.querySelector("#viewImg ")
    const img = document.querySelector("#viewImg img")
    div.style.display = "flex"
    img.src = src
  }else{
    const div = document.querySelector("#viewImg ")
    div.style.display = "none"

  }
}
  // POST IMAGE UPLOAD AND DISPLAY 


// PUBLIC OR SPECIFI POST DROPDOWN 
const PostDD = (value)=>{
  if(value == "specific"){
    document.getElementById("Specific").style.display = "flex"
  document.getElementById("privacy").innerHTML = `<img src="./images/private.png" alt="" class="me-1"> <p  class="mb-0 ms-0"> Private </p> `
  }else{
    document.getElementById("privacy").innerHTML = `<img src="./images/earth.png" alt="" class="me-1"> <p  class="mb-0 ms-0"> Public </p> `
  // document.getElementById("privacy").innerText = event.target.innerText
  document.getElementById("Specific").style.display = "none"
  }
}
// PUBLIC OR SPECIFI POST DROPDOWN 


// POST TAGS 

const AddTags = (e, id)=>{
e.preventDefault()
  const element = document.getElementById(id)
  element.setAttribute("id", `${id+11}`)
 const template = document.createElement("template")
 template.innerHTML = `
 <span class="material-symbols-outlined me-2" onclick="RemoveTag(event, '${id+11}', '${id}')">cancel</span>
 `
 element.append(template.content.firstElementChild)
 document.querySelector("#tags").append(element)
//  element.remove()
}
const RemoveTag = (e, id, orgId)=>{
  const element = document.getElementById(id)
  console.log(id)
  console.log(element)
  element.setAttribute("id", `${orgId}`)
  document.querySelector(`#${orgId} span`).remove()

  document.querySelector(".tagsrow").append(element)
} 
// POST TAGS 


// UPLOAD AND DISPLAY DOCUMENTS 
const docs = document.getElementById("docs")
docBtn.addEventListener("click", (e)=>{
e.target.value = null
})
docBtn.addEventListener("change", (e)=>{
  const files = e.target.files
  for (let index = 0; index < files.length; index++) {
    const fileName = files[index].name
    const ext = fileName.split(".")[1]
    let documentExtImg = "";
if(ext == "doc"){
  documentExtImg = "./images/docicon.png"
}else if(ext == "docx"){
  documentExtImg = "./images/docx.png"
}else if(ext == "rtf"){
  documentExtImg = "./images/rtf.png"
}else if(ext == "pdf"){
  documentExtImg = "./images/pdf.png"
}else if(ext == "xls"){
  documentExtImg = "./images/xls.png"
}else if(ext == "xlsx"){
  documentExtImg = "./images/xls.png"
}else if(ext == "ppt"){
  documentExtImg = "./images/ppt.png"
}else if(ext == "pptx"){
  documentExtImg = "./images/pptx.png"
}else if(ext == "txt"){
  documentExtImg = "./images/txt.png"
}
    const div = document.createElement("div")
    // div.setAttribute("download", "download")
    // div.setAttribute("href", `${fileName}`)
    
    div.setAttribute("class", "docName")
    const random = Math.random(1, 10)
    div.setAttribute("id", `${fileName + random}`)
    // div.setAttribute("onclick", "deleteDoc(event)")
    div.innerHTML = `<div> <img src=${documentExtImg}> ${fileName} </div> <span class="material-symbols-outlined" onclick="deleteDoc('${fileName + random}')">cancel</span>`
    docs.append(div)
    // console.log(div)
  }
input.disabled = true
Voicebtn.disabled = true
})
const deleteDoc = (e)=>{
// e.target.remove()
document.getElementById(e).remove()
}


const InputTags = (e)=>{
  e.preventDefault()
  const tagsInput = document.getElementById("tagsInput")
   const template = document.createElement("template")
const AllTags =  document.querySelectorAll("#tags button")
const AllTagsRow =  document.querySelectorAll("#tagsrow button")
// console.log(AllTags)
if(tagsInput.value == ""){
  return
}
   for (let index = 0; index < AllTags.length; index++) {
    const element1 = AllTags[index];
    if (element1.innerHTML == tagsInput.value ) {
     return
    }
  }
  for (let index2 = 0; index2 < AllTagsRow.length; index2++) {
    const element2 = AllTagsRow[index2];
    if (element2.innerHTML == tagsInput.value) {
   return
    }
  }
   const random = Math.floor(Math.random() * 100)
   template.innerHTML = `
   <div class="" id="tags${random}11">
<button href=""  onclick="AddTags(event, 'tags${random}')">${tagsInput.value}</button>
<span class="material-symbols-outlined me-2" onclick="RemoveTag(event, 'tags${random}11', 'tags${random}')">cancel</span>

</div>
   `
   document.querySelector("#tags").append(template.content.firstElementChild)
}

// UPLOAD AND DISPLAY DOCUMENTS 

// const toggleModal = false

// CLOSE CREATE POST MODAL
const CloseModal = (e, toggle)=>{
  if(toggle){
    const modal = document.querySelector(".modal")
modal.classList.add("show")
modal.style.display = "block"
modal.setAttribute("role", "dialog")
// document.querySelector(body)
document.querySelector("body").style.overflow = "hidden"
document.querySelector("body").classList.add("modal-open")


const div = document.createElement("div")
div.setAttribute("class", "modal-backdrop")
div.classList.add("fade")
div.classList.add("show")
document.querySelector("body").append(div)

  }else{


if(confirm("Are you sure you want to close? All Unsaved Changes will Be Lost")){
document.getElementById("CreatePostTextarea").value = ""
document.querySelector("#display").innerHTML = ""
document.querySelector(".voice").innerHTML = ""

const tagdivs = document.querySelectorAll("#tags button")
console.log(tagdivs[0])
for (let index = 0; index < tagdivs.length; index++) {
  const element = tagdivs[index];
  const div = document.createElement("div")
  div.innerHTML = element
  console.log(element)
  document.querySelector("#tagsrow").append(element)
}

document.querySelector(".docs").innerHTML = ""

docBtn.disabled = false
tagsBtn.disabled = false
Voicebtn.disabled = false
input.disabled = false
const modal = document.querySelector(".modal")
modal.removeAttribute("role")
// document.querySelector(body)
document.querySelector("body").style = ""
document.querySelector("body").classList.remove("modal-open")
modal.classList.remove("show")
modal.style.display = "none"
document.querySelector(".modal-backdrop").remove()
}else{
  console.log("cancel")
}
}

}
// CLOSE CREATE POST MODAL



// DELETE POST 
const DeletePost = (id)=>{
  document.getElementById(id).remove()
}
// DELETE POST 


const PublishPost = (e)=>{
  e.preventDefault()
  const CreatePostTextarea =  document.getElementById("CreatePostTextarea")
  const displayImages =  document.querySelector(".displayImages")
  const voiceValue =  document.querySelector(".documents .voice")
  const TagsValue =  document.querySelector(".documents .tagsrow")
  const DocsValue =  document.querySelector(".documents .docs")
  const Posts =  document.querySelector(".Posts")
  const template = document.createElement("template")
  const TagsValueSpan = document.querySelectorAll(".documents .tagsrow div span")
  const PostTags = document.querySelectorAll(".Posts .post-section .tagsrow div span")

  const RandomPostId = "Post" + Math.floor(Math.random() * 1000)
  const RandomCarouselId = "Carousel" + Math.floor(Math.random() * 1000)

console.log(PostTags)
 for (let index = 0; index < PostTags.length; index++) {
  const element = PostTags[index];
  element.style.display = "none"
 }
  // 1-GET TEXTAREA VALUE 
  


  if(displayImages.innerHTML != ""){
    const imgs = document.querySelectorAll(".displayImages img") //uplosfed Images
    const Imgcontainer = document.createElement("div") //container for images
    const navigatorContainer= document.createElement("div") //navigator
    navigatorContainer.setAttribute("class", "carousel-indicators") 
    Imgcontainer.setAttribute("class", "carousel-inner")


    for (let index = 0; index < imgs.length; index++) {
      const element = imgs[index];


      // DISPLAYING UPLAOD IMAGES N POST 
      const imgdiv = document.createElement("div")
      imgdiv.setAttribute("class",  `carousel-item`)
      imgs[index].setAttribute("class", "d-block w-100")
      imgdiv.append(imgs[index])
      Imgcontainer.append(imgdiv)

      
      // IMAGE NAVIGATOR 
      const imgNavigator = document.createElement("div")
      imgNavigator.style.background =  `url("${imgs[index].src}")`
      // imgNavigator.setAttribute("src", `${imgs[index].src}`) 
      imgNavigator.setAttribute("class", `imgNavigator`) 
      imgNavigator.setAttribute("data-bs-target", "#${RandomCarouselId}")
      imgNavigator.setAttribute("data-bs-slide-to", `${index}`)
      if(index == 0){
        imgNavigator.setAttribute("class", `imgNavigator active`)
        imgNavigator.setAttribute("aria-current", `true`)
      imgdiv.setAttribute("class",  ` carousel-item active`)

      }
        imgNavigator.setAttribute("aria-label", `Slide ${index + 1}`)
      navigatorContainer.append(imgNavigator)
  }

          // POST TEMPLATE 
  template.innerHTML = `<div class="post-section" id="${RandomPostId}">
            <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first ">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Public</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 177px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete"  onclick="DeletePost('${RandomPostId}')">Delete</button>
                      
                    </form>
                  </div>
              </div>
            </div>
            <div class="tagsrow mb-2">
              ${TagsValue.innerHTML}
            </div>
            <h3 >${CreatePostTextarea.value}</h3>
            <div id="${RandomCarouselId}" class="carousel slide carouselExampleCaptions">
           ${navigatorContainer.outerHTML}
${Imgcontainer.outerHTML}
<div class="navigatorScroll d-flex  justify-content-between">
<button onclick="navigatorScroll(false, '${RandomCarouselId}')"><i class="fa-solid fa-chevron-left"></i></button>
<button onclick="navigatorScroll(true, '${RandomCarouselId}')">    <i class="fa-solid fa-chevron-right"></i></button>
</div>
  
</div>
          </div>`
  Posts.append(template.content.firstElementChild)


  }
  else if(voiceValue.innerHTML != ""){

    template.innerHTML = `
    <div class="post-section" id="postId3">
            <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Public</p>
                <div class="dropdown EditPostDropdown">
                  <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    more_horiz
                  </span>
                    <form class="dropdown-menu p-4" style="width: 177px;">
                      <button type="submit" class="btn  edit mb-2">Edit</button>
                      <button type="submit" class="btn  mb-2 delete" onclick="DeletePost('postId3')">Delete</button>
                      
                      
                    </form>
                  </div>
              </div>
            </div>
            <div class="tagsrow mb-2">
              ${TagsValue.innerHTML}
            </div>
            <h3>${CreatePostTextarea.value}</h3>
           ${voiceValue.innerHTML}
          </div>`
    Posts.append(template.content.firstElementChild)

  }
  else if(DocsValue.innerHTML != ""){
    const div = document.createElement("div")
   div.setAttribute("class", "docsContainer")

    const Totaldocuments = document.querySelectorAll(".documents .docs .docName")
    for (let index = 0; index < Totaldocuments.length; index++) {
      const element = Totaldocuments[index];
      const a = document.createElement("a")
      a.setAttribute("download", "download")
      a.setAttribute("href", ``)
      a.append(element)
      div.append(a)
    }
    template.innerHTML = `
<div class="post-section" id="postId1">
            <div class="PostHeader d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Public</p>
                <div class="dropdown EditPostDropdown">
                <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                  more_horiz
                </span>
                  <form class="dropdown-menu p-4" style="width: 177px;">
                    <button type="submit" class="btn  edit mb-2">Edit</button>
                    <button type="submit" class="btn  mb-2 delete"  onclick="DeletePost('postId1')">Delete</button>
                    
                   
                  </form>
                </div>
              </div>
            </div>
            <div class="tagsrow mb-2">
              ${TagsValue.innerHTML}
            </div>
            <h3>${CreatePostTextarea.value}</h3>
            ${div.outerHTML}
             
          </div>`
console.log("hello")
          Posts.append(template.content.firstElementChild)
  
  }
  else{
    if(CreatePostTextarea.value != ""){
      template.innerHTML = `
      <div class="post-section" id="postId1">
            <div class="PostHeader d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
              <div class="d-flex first">
                <div class="postProfileIcon" >
                  <img src="images/profile.png" />
                </div>
                <p>Jenifer emile</p>
                <span>12 April at 09.28 PM</span>
              </div>
              <div class="d-flex second">
                <span class="material-symbols-outlined user">
                  supervised_user_circle
                </span>
                <p>Public</p>
                <div class="dropdown EditPostDropdown">
                <span  class="material-symbols-outlined more" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                  more_horiz
                </span>
                  <form class="dropdown-menu p-4" style="width: 177px;">
                    <button type="submit" class="btn  edit mb-2">Edit</button>
                    <button type="submit" class="btn  mb-2 delete"  onclick="DeletePost('postId1')">Delete</button>
                    
                   
                  </form>
                </div>
              </div>
            </div>
            <div class="tagsrow mb-2">
              ${TagsValue.innerHTML}
            </div>
            <h3 class="mt-4">${CreatePostTextarea.value}</h3>
          </div>
      `
      Posts.append(template.content.firstElementChild)
    }
  }



}

let CarouselImageScrollCount = 0
const navigatorScroll = (value, id)=>{
// const Div = document.querySelector(".carousel-indicators")
const img = document.querySelectorAll(`#${id} .carousel-item`)
const navigators = document.querySelectorAll(`#${id} .carousel-indicators div`)
if(value && CarouselImageScrollCount < img.length -1){
CarouselImageScrollCount++
for (let index = 0; index < img.length; index++) {
  const element = img[index];
  element.classList.remove("active")
  navigators[index].classList.remove("active")
}
img[CarouselImageScrollCount].classList.add("active")
navigators[CarouselImageScrollCount].classList.add("active")
console.log(CarouselImageScrollCount)



}else if (!value && CarouselImageScrollCount > 0){
CarouselImageScrollCount--

const img = document.querySelectorAll(`#${id} .carousel-item`)
for (let index = 0; index < img.length; index++) {
  const element = img[index];
  element.classList.remove("active")
  navigators[index].classList.remove("active")

}
img[CarouselImageScrollCount].classList.add("active")
navigators[CarouselImageScrollCount].classList.add("active")

console.log(CarouselImageScrollCount)

}else{
  return
}
}

const OpenImage = (src, value)=>{
  const div = document.querySelector("#OpenImg")
  if(value){
console.log("Open")
div.style.display = "flex"
const img = document.querySelector("#OpenImg img")
img.src = src
}else{
    console.log("Close")
    div.style.display = "none"
  }

}


</script>



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
</body>

</html>