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
        .container {
            max-width: 1637px !important;
        }
    </style>
</head>

<body style="background-color: #12203b17; overflow-x: hidden;">

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
    <div class="container-fluid p-0 " style="">
        <div class="container mobileMapLocation p-0" style=" max-width: 100% !important;">


            <div class="w-100 d-flex justify-content-center align-items-center">
                <div class=" col-sm-3" style="top: 20px; width: 100%; height: 100vh;">
                    <div id="map">
                    </div>
                </div>
                
            </div>
            

        </div>
        
    </div>


<!-- NAVBAR SEARCH ICON JS  -->

<script>



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
        zoom : 9.5,
        center : MapLocation
    })
    const infowindow = new google.maps.InfoWindow();
    const service = new google.maps.places.PlacesService(map);

for (let index = 0; index < UsersLocation.length; index++) {
    const element = UsersLocation[index];
    console.log(element)
    console.log(index+1)

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
const markerPopup = document.querySelector(".markerPopup")
const GetLocation = (lat, lng, name, email, age)=>{
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


</body>

</html>