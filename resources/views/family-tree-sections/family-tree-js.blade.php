<!-- NAVBAR SEARCH ICON JS  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script type="text/javascript" src="{{ asset('storage/assets') }}/js/script.js"></script>
<script>
    const loadmore = document.querySelector("#load-more");
    let initialCards = 2
    const Loadcards = () => {
        const cards = document.querySelectorAll(".cards")
        initialCards += 2;

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
    if (p.innerText.length > 10) {
        newP = p.innerText.substr(0, 15) + '...';
        p.innerText = newP;
    } else {
        newP = p.innerText.substr(0, 15);
    }







    const rlpDrop = (value, text) => {
        const element = document.querySelector(`.${text}`)
        element.innerText = value
    }


    const AorD = (e, value) => {
        const element = document.querySelector(".emailCountry")
        const radiobtn = document.querySelectorAll(".radiobtn")
        const mapdesc = document.querySelector(".mapAddress")


        if (value == "alive") {
            element.style.display = "flex";
            mapdesc.style.display = "none";
            for (let index = 0; index < radiobtn.length; index++) {
                const el = radiobtn[index];
                el.checked = false
            }
            e.target.checked = true
        } else {
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
    ;
    (function($, window, document, undefined) {
        'use strict';

        // helpers
        function _id(e) {
            return document.getElementById(e);
        }

        function _e(e) {
            return document.querySelector(e);
        }

        function _ee(e) {
            return document.querySelectorAll(e);
        }

        function _for(e, f) {
            var i, len = e.length;
            for (i = 0; i < len; i++) {
                f(e[i]);
            }
        }

        function log(e, before) {
            before = before || '';
            console.log(before + e);
        }

        function _hasClass(el, selector) {
            var className = " " + selector + " ";
            if ((" " + el.className + " ").replace(/[\n\t]/g, " ").indexOf(className) > -1) {
                return true;
            } else {
                return false;
            }
        }


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
            var monthInformation = function(year, month) {
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
                key, str = '',
                i = 0,
                t = $('#t');

            //console.clear();
            //console.log(m);

            str += '<table>';
            str +=
                '<thead><tr><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr></thead><tbody>';

            for (key in days) {
                i++;

                if (i === 1) str += '<tr>';

                //if( key < startDay || key > totalDays ) { str += '<td class="notCurMonth"><i>'+days[key]+'</i></td>'; }
                //else { str += '<td><i>'+days[key]+'</i></td>'; }

                str += '<td><i>' + days[key] + '</i></td>';

                if (i === 7) {
                    str += '</tr>';
                    i = 0;
                }

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
        $('#editmonth').text(monthArr[month - 1] + ' ' + year); // set month text

        function bind(month, year) {
            var tb = _id('editcal');
            $(tb).on('click', 'td', function() {
                userSelect(this, null, month, year);
            });

            //   next month
            $('#editdisp').on('click', 'div', function() {
                var t = this;
                if (t.id == 'editnext') {
                    month++;
                    if (month > 12) {
                        year++;
                        month = 1;
                    } // switch year and reset month
                } else {
                    month--;
                    if (month < 1) {
                        year--;
                        month = 12;
                    } // switch year and reset month
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
    const DeceasedCard = document.querySelectorAll(".deceasedCard")



    console.log(DeceasedCard)


    // const UsersLocation = [{
    //         Lat: 39.045753,
    //         Lng: -76.641273,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Jocelyn Bergson",
    //         email: "jocelynbergson@gmail.com",
    //         age: 98
    //     },
    //     {
    //         Lat: 39.2,
    //         Lng: -76.641,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Maria Levin",
    //         email: "marialevin@gmail.com",
    //         age: 79
    //     },
    //     {
    //         Lat: 39.2,
    //         Lng: -76.891,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Alfredo Levin",
    //         email: "alfredolevin@gmail.com",
    //         age: 76
    //     },
    //     {
    //         Lat: 39.29,
    //         Lng: -76.831,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Erin Levin",
    //         email: "erinlevin@gmail.com",
    //         age: 50
    //     },
    //     {
    //         Lat: 39.29,
    //         Lng: -76.831,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Erin Levin",
    //         email: "erinlevin@gmail.com",
    //         age: 50
    //     },
    //     {
    //         Lat: 39.34,
    //         Lng: -76.491,
    //         PlaceID: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //         fields: ["name", "formatted_address", "place_id", "geometry"],
    //         name: "Jakob Levin",
    //         email: "jakoblevin@gmail.com",
    //         age: 58
    //     },


    // ]
    // async function initMap() {
    //     var MapLocation = {
    //         lat: 39.045753,
    //         lng: -76.641273
    //     }
    //     var map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 10,
    //         center: MapLocation
    //     })
    //     const infowindow = new google.maps.InfoWindow();
    //     const service = new google.maps.places.PlacesService(map);

    //     for (let index = 0; index < UsersLocation.length; index++) {
    //         const element = UsersLocation[index];

    //         let markerOptions = {
    //             position: new google.maps.LatLng(element.Lat, element.Lng),
    //             icon: '{{ asset('storage/assets') }}/images/marker' + (index + 1) + '.png'

    //         }
    //         let marker = new google.maps.Marker(markerOptions)
    //         marker.setMap(map)

    //         const request = {
    //             placeId: element.PlaceID,
    //             fields: element.fields
    //         }
    //         service.getDetails(request, (place, status) => {
    //             if (
    //                 status === google.maps.places.PlacesServiceStatus.OK &&
    //                 place &&
    //                 place.geometry &&
    //                 place.geometry.location
    //             ) {



    //                 const Main = document.createElement("div");
    //                 Main.setAttribute("class", "MarkerPopup")
    //                 const content = document.createElement("div");
    //                 const Country = document.createElement("p");
    //                 const placeIdElement = document.createElement("p");
    //                 const UserName = document.createElement("p");
    //                 const UserEmail = document.createElement("p");
    //                 const UserAge = document.createElement("p");
    //                 const Active = document.createElement("p");
    //                 const SendMessage = document.createElement("button");

    //                 Active.setAttribute("class", "activeOnline")

    //                 google.maps.event.addListener(marker, "click", async () => {



    //                     const placeAddressElement = document.createElement("p");
    //                     let Location = {}
    //                     fetch(
    //                             `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${element.Lat}&longitude=${element.Lng}&localityLanguage=en`
    //                         )
    //                         .then((res) => res.json())
    //                         .then(data => {


    //                             // placeIdElement.textContent = `${data.principalSubdivision}, ${data.postcode}, ${data.countryCode}`;
    //                             // content.appendChild(placeIdElement);

    //                             UserName.innerHTML = `Name : <span> ${element.name} </span>`
    //                             content.appendChild(UserName);

    //                             UserEmail.innerHTML =
    //                                 `Email : <span> ${element.email} </span>`
    //                             content.appendChild(UserEmail);

    //                             Country.innerHTML =
    //                                 `Country : <span>${data.countryName}<img src="{{ asset('storage/assets/images') }}/BG.png"> </span> `
    //                             content.appendChild(Country);

    //                             UserAge.innerHTML = `Age : <span>${element.age}</span> `
    //                             content.appendChild(UserAge);

    //                             Active.innerHTML = "Last Location Updated 9 hr ago"

    //                             SendMessage.innerHTML = "Send Message"

    //                             Main.appendChild(content)
    //                             Main.appendChild(Active)
    //                             Main.appendChild(SendMessage)

    //                             infowindow.setContent(Main);
    //                             infowindow.open(map, marker);
    //                             setTimeout(() => {
    //                                 console.log("first")
    //                                 const Close = document.querySelector(
    //                                     ".gm-ui-hover-effect");
    //                                 Close.innerHTML =
    //                                     '<img src="{{ asset('storage/assets/images') }}/images/closemenu.png">'
    //                             }, 200);
    //                         })

    //                     console.log(Location)
    //                 });
    //             }
    //         });
    //     }


    // }

    // const addline1 = document.querySelector(".addline img")
    // const addline2 = document.querySelector(".addline2 img")

    // addline1.addEventListener("click", function(e) {
    //     e.stopPropagation();
    //     console.log("this button was pressed")
    // })
    // addline2.addEventListener("click", function(e) {
    //     e.stopPropagation();
    //     console.log("this button was pressed")
    // })

    // const cards = document.querySelectorAll(".cards")
    // initialCards += 2;

    // const markerPopup = document.querySelector(".markerPopup")
    // const maincard = document.querySelector(".main-card")
    // const zoomdiv = document.querySelector(".zoomdiv")
    // var scrollAmount = 0;
    // var scrollMax = 1000;







    // const GetLocation = (lat, lng, name, email) => {
    //     alert('good');
    //     alert(lat);

    //     maincard.setAttribute("style", "animation: pulse-border 1500ms ease-out")

    //     setTimeout(function() {
    //         maincard.removeAttribute("style", "animation: pulse-border 1500ms ease-out")
    //     }, 2000);

    //     window.location.href = "#yourCard";


    //     if (name == "Jakob Levin") {
    //         for (let index = 0; index < initialCards; index++) {
    //             const element = cards[index];
    //             element.style.display = "flex"
    //             loadmore.style.display = "none";
    //             console.log("The cards are now scrolled")
    //         }
    //     }



    //     // if(name == "Jakob Levin"){
    //     //     let index = 0;
    //     //    if(index < initialCards){
    //     //     const element = cards[index];
    //     //     element.style.display = "flex"
    //     //     // loadmore.style.display = "none";
    //     //     console.log(cards[index])
    //     //    }
    //     // }
    //     console.log(maincard)




    //     var MapLocation = {
    //         lat,
    //         lng
    //     }
    //     var map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 15,
    //         center: MapLocation
    //     })
    //     const infowindow = new google.maps.InfoWindow();
    //     const service = new google.maps.places.PlacesService(map);

    //     for (let index = 0; index < UsersLocation.length; index++) {
    //         const element = UsersLocation[index];
    //         let markerOptions = {
    //             position: new google.maps.LatLng(element.Lat, element.Lng),
    //             icon: '{{ asset('storage/assets') }}/images/marker' + (index + 1) + '.png'

    //         }
    //         let marker = new google.maps.Marker(markerOptions)
    //         marker.setMap(map)

    //         const request = {
    //             placeId: element.PlaceID,
    //             fields: element.fields
    //         }
    //         service.getDetails(request, (place, status) => {
    //             if (
    //                 status === google.maps.places.PlacesServiceStatus.OK &&
    //                 place &&
    //                 place.geometry &&
    //                 place.geometry.location
    //             ) {



    //                 const Main = document.createElement("div");
    //                 Main.setAttribute("class", "MarkerPopup")
    //                 const content = document.createElement("div");
    //                 const Country = document.createElement("p");
    //                 const placeIdElement = document.createElement("p");
    //                 const UserName = document.createElement("p");
    //                 const UserEmail = document.createElement("p");
    //                 const UserAge = document.createElement("p");
    //                 const Active = document.createElement("p");
    //                 const SendMessage = document.createElement("button");

    //                 Active.setAttribute("class", "activeOnline")

    //                 google.maps.event.addListener(marker, "click", async () => {



    //                     const placeAddressElement = document.createElement("p");
    //                     let Location = {}
    //                     fetch(
    //                             `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${element.Lat}&longitude=${element.Lng}&localityLanguage=en`
    //                         )
    //                         .then((res) => res.json())
    //                         .then(data => {
    //                             console.log(data)


    //                             // placeIdElement.textContent = `${data.principalSubdivision}, ${data.postcode}, ${data.countryCode}`;
    //                             // content.appendChild(placeIdElement);

    //                             UserName.innerHTML =
    //                                 `Name : <span> ${(element.lat == lat) ? name : element.name} </span>`
    //                             content.appendChild(UserName);

    //                             UserEmail.innerHTML =
    //                                 `Email : <span> ${(element.lat == lat) ? email : element.email} </span>`
    //                             content.appendChild(UserEmail);

    //                             Country.innerHTML =
    //                                 `Country : <span>${data.countryName}<img src="./images/BG.png"> </span> `
    //                             content.appendChild(Country);

    //                             UserAge.innerHTML =
    //                                 `Age : <span>${(element.lat == lat) ? age : element.age}</span> `
    //                             content.appendChild(UserAge);

    //                             Active.innerHTML = "Last Location Updated 9 hr ago"

    //                             SendMessage.innerHTML = "Send Message"

    //                             Main.appendChild(content)
    //                             Main.appendChild(Active)
    //                             Main.appendChild(SendMessage)

    //                             infowindow.setContent(Main);
    //                             infowindow.open(map, marker);
    //                             setTimeout(() => {
    //                                 console.log("first")
    //                                 const Close = document.querySelector(
    //                                     ".gm-ui-hover-effect");
    //                                 Close.innerHTML =
    //                                     "<img src='./images/closemenu.png'>"
    //                             }, 200);
    //                         })

    //                     console.log(Location)
    //                 });
    //             }
    //         });
    //     }
    // }

    const OpenMarkerPopup = (value, value1) => {
        // markerPopup.style.display = "flex"
        console.log(value1)
        if (value1 == true) {
            markerPopup.style.display = "flex"
        } else {
            markerPopup.style.display = "none"

        }
    }

    let menu = false
    let zoomToggle = false
    let SearchUSer = false
    const OpenMenu = (e) => {
        menu = !menu
        console.log(menu)
        const sideMenu = document.querySelector(".sideMenuIcons")
        const fadeBody = document.querySelector(".fadeBody")
        if (menu) {
            fadeBody.style.display = "flex"
            document.querySelector(".menu").src = "{{ asset('storage/assets/images/closemenu.png') }}"
            sideMenu.style.visibility = "visible"


        } else {

            fadeBody.style.display = "none"
            document.querySelector(".menu").src = "{{ asset('storage/assets/images/menu.png') }}"
            sideMenu.style.visibility = "hidden"
            SearchUserInput.style.display = "none"
            zoombutton.style.display = "none"
        }
    }


    let zoombutton = document.querySelector(".zoomBtns")
    let SearchUserInput = document.querySelector(".SearchUserInput")
    const OpenZoom = () => {
        zoomToggle = !zoomToggle
        if (zoomToggle) {
            zoombutton.style.display = "flex"
            SearchUserInput.style.display = "none"
            SearchUSer = false

        } else {
            zoombutton.style.display = "none"
        }
    }

    const OpenSearchUser = () => {
        SearchUSer = !SearchUSer
        if (SearchUSer) {
            SearchUserInput.style.display = "flex"
            zoombutton.style.display = "none"
            zoomToggle = false

        } else {
            SearchUserInput.style.display = "none"
        }
    }

    let zoomValue = .75
    let TopValue = 0
    const zoomIn = () => {
        if (zoomValue == 1) {
            return
        }
        zoomValue += .25
        TopValue += 150
        document.querySelector("#zoomdiv").style.transform = `scale(${zoomValue})`
        document.querySelector("#zoomdiv").style.transformOrigin = "center center"
        document.querySelector("#zoomdiv").style.top = `${TopValue}px`

    }

    const zoomOut = () => {
        if (zoomValue == .25) {
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
    const GetUserLocation = () => {
        var loc = ""
        navigator.geolocation.getCurrentPosition((position) => {
            const latitude = position.coords.latitude
            const longitude = position.coords.longitude
            console.log(latitude, longitude)
            // GetLocation(latitude, longitude)
            const geoApi =
                `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`


            fetch(geoApi)
                .then((res) => res.json())
                .then(data => console.log(data))


        }, () => console.log("Invalid Location"))
    }

    // window.addEventListener("load", GetUserLocation)
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHCtv8Nf7HWwebTl98pcxfIfOkur3t-rg&callback=initMap&libraries=places&v=weekly">
</script>


<!-- COUNTRY SELECT  -->
<script src="{{ asset('storage/assets/build/js/countrySelect.js') }}"></script>

<script>
    // $("#country_selector").countrySelect({
    //     preferredCountries: ['ca', 'gb', 'us'],
    //     onSelect: function(countryData) {
    //         // Get the selected country's name or code
    //         var selectedCountry = countryData.countryName;

    //         // Use the Google Maps Geocoding API to get latitude and longitude
    //         var geocoder = new google.maps.Geocoder();
    //         geocoder.geocode({
    //             'address': selectedCountry
    //         }, function(results, status) {
    //             if (status == google.maps.GeocoderStatus.OK && results.length > 0) {
    //                 var location = results[0].geometry.location;
    //                 var latitude = location.lat();
    //                 var longitude = location.lng();
    //                 console.log("Latitude: " + latitude);
    //                 console.log("Longitude: " + longitude);
    //             } else {
    //                 console.error("Geocoding failed: " + status);
    //             }
    //         });
    //     }
    // });

    $("#country_selector").countrySelect({
        preferredCountries: ['ca', 'gb', 'us']
    });

    $("#country_selector").on("change", function() {
        var code = $(this).val();
        getLatLongFor(code);
    });

    function getLatLongFor(Code) {
        var mapboxToken =
            'pk.eyJ1IjoiemFlZW1hc2lmIiwiYSI6ImNsbjkyZXh4dzAwcTcya3BpcnYxbTlrMGIifQ.FWrkMiMyFC792Y3WRfvGXQ';
        var geoUrl =
            `https://api.mapbox.com/geocoding/v5/mapbox.places/${Code}.json?access_token=${mapboxToken}`;

        $.ajax({
            url: geoUrl,
            method: 'GET',
            success: function(data) {
                if (data.features.length > 0) {
                    var coordinates = data.features[0].center;
                    var latp = coordinates[1];
                    var longp = coordinates[0];

                    $("#latp").val(latp);
                    $("#longp").val(longp);

                } else {
                    alert("No coordinates found for the selected country.");
                }
            },
            error: function() {
                alert("An error occurred while fetching coordinates.");
            }
        });
    }

    $("#country_selector_child").countrySelect({
        preferredCountries: ['ca', 'gb', 'us']
    });


    $("#country_selector_child").on("change", function() {
        var selectedCountryCode = $(this).val();
        getLatLongForCountry(selectedCountryCode);
    });

    function getLatLongForCountry(countryCode) {
        var mapboxAccessToken =
            'pk.eyJ1IjoiemFlZW1hc2lmIiwiYSI6ImNsbjkyZXh4dzAwcTcya3BpcnYxbTlrMGIifQ.FWrkMiMyFC792Y3WRfvGXQ';
        var geocodingUrl =
            `https://api.mapbox.com/geocoding/v5/mapbox.places/${countryCode}.json?access_token=${mapboxAccessToken}`;

        $.ajax({
            url: geocodingUrl,
            method: 'GET',
            success: function(data) {
                if (data.features.length > 0) {
                    var coordinates = data.features[0].center;
                    var latitude = coordinates[1];
                    var longitude = coordinates[0];

                    // Display latitude and longitude
                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);

                    $("#latp").val(latitude);
                    $("#longp").val(longitude);

                } else {
                    alert("No coordinates found for the selected country.");
                }
            },
            error: function() {
                alert("An error occurred while fetching coordinates.");
            }
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.memberAdd').click(function() {
            var child_id = $(this).attr('data-child-id');
            $('#parent_id').val(child_id);

        });




    });
</script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
<script>
    function GetLocation(lat, lng, email, name, country) {
        // Create a map using Mapbox
        mapboxgl.accessToken =
            'pk.eyJ1IjoiemFlZW1hc2lmIiwiYSI6ImNsbjkyZXh4dzAwcTcya3BpcnYxbTlrMGIifQ.FWrkMiMyFC792Y3WRfvGXQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [lng, lat], // Set the map center to the user's location
            zoom: 10 // Adjust the zoom level as needed
        });


        // Create a marker for the user's location
        var marker = new mapboxgl.Marker({
            element: createCustomMarkerElement()
        })
            .setLngLat([lng, lat])
            .setPopup(new mapboxgl.Popup().setHTML(`<div><h5>Email: </h5><h6>${email}</h6>
            <h5>Name: </h5><h6>${name}</h6><h5>Country: </h5><h6>${country}</h6></div>`))
            .addTo(map);
    }

    // Function to create a custom marker element

    function getUserLocation() {
        mapboxgl.accessToken =
            'pk.eyJ1IjoiemFlZW1hc2lmIiwiYSI6ImNsbjkyZXh4dzAwcTcya3BpcnYxbTlrMGIifQ.FWrkMiMyFC792Y3WRfvGXQ';
        // Request location permission
        navigator.geolocation.getCurrentPosition(function(position) {
            var latd = position.coords.latitude;
            var lngd = position.coords.longitude;


            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [lngd, latd], // Set the map center to the user's location
                zoom: 10 // Adjust the zoom level as needed
            });

            // Create a marker for the user's location
            var marker = new mapboxgl.Marker({
                element: createCustomMarkerElement()
            })
                .setLngLat([lngd, latd])
                .setPopup(new mapboxgl.Popup().setHTML(`<h6>You</h6>`))
                .addTo(map);

        }, function(error) {
            console.error('Error getting location:', error);
        });
    }

    // Call getUserLocation when the page loads
    window.onload = getUserLocation;

    function createCustomMarkerElement() {
        var markerElement = document.createElement('div');
        markerElement.innerHTML =
            '<img src="{{ asset('storage/assets/images/profile.jpeg') }}" class="marker" alt="Custom Marker">';

        return markerElement;
    }
</script>
