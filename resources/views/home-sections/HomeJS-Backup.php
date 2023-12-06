<script src="{{ asset('storage/assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/popper.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/main.js"></script>
<script src="{{ asset('storage/assets') }}/js/vrecorder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.14/viewer.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<!-- Modal  -->
<script>
    const Search = () => {
        if (window.innerWidth <= 1140 && window.innerWidth >= 992) {
            document.getElementById("SearchPost").classList.toggle("searchpostactive")
        } else if (window.innerWidth <= 992) {

            const searchModal = document.getElementById("searchModal")
            // searchModal.style.display = "flex"
            searchModal.classList.toggle("searchModalActive")
        }
    }
    const Calender = () => {

        const calendar = document.getElementById("calendar")
        calendar.classList.toggle("cusotmCalenderactive")
    }
</script>
<!-- Calender  -->
<!-- cal -->
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
            //console.log(before + e);
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

            // first doesnt exist
            if (sel1 === null && !isDisabled) {
                e.id = 'sel1';
                e.classList.add('sel1');
                $(e).parent().prevAll('tr').find('td').addClass('disabled'); // ugly code
                $(e).prevAll('td').addClass('disabled'); // ugly code
                //log('select second option');

                // temp
                _id('out1').innerHTML = e.innerText + '/' + month + '/' + year;

            }

            // second doesnt exist
            else if (sel2 === null) { // prevent making #2 to #1
                if (isDisabled || e.id == 'sel1') return false;
                e.id = 'sel2';
                e.classList.add('sel2');

                // selection is complete
                var par = e.parentNode, // tr
                    parPar = par.parentNode; // tbody (main)

                var td = parPar.querySelectorAll('td'),
                    go = false,
                    stop = false,
                    i = 0,
                    s1i = 0,
                    s2i = 999;

                _for(td, function(e) {
                    i++;

                    if (e.id == 'sel1') {
                        go = 1;
                        s1i = i;
                    }
                    if (e.id == 'sel2') {
                        stop = 1;
                        s2i = i;
                    }

                    if (s1i < s2i && go) {
                        if (go) {
                            e.classList.add('range');
                        }
                        // temp
                        _id('out2').innerHTML = e.innerText + '/' + month + '/' + year;

                    }
                    if (stop) {
                        go = 0;
                    }

                })

            }

            // both selections exist
            else {
                var td = e.parentNode.parentNode.querySelectorAll('td');
                _for(td, function(e) {
                    e.classList.remove('range', 'disabled');
                });

                sel1.removeAttribute('class');
                sel1.removeAttribute('id');
                if (sel2 !== null) {
                    sel2.removeAttribute('class');
                    sel2.removeAttribute('id');
                }

            } //end else/if

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
            ////console.log(m);

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
        $('#month').text(monthArr[month - 1] + ' ' + year); // set month text

        function bind(month, year) {
            var tb = _id('cal');
            $(tb).on('click', 'td', function() {
                userSelect(this, null, month, year);
            });

            // next month
            $('#disp').on('click', 'div', function() {
                var t = this;
                if (t.id == 'next') {
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
                $('#month').text(monthArr[month - 1] + ' ' + year);
            })

        };

        bind(month, year);

    })(jQuery, window, document); // end() init
</script>

<!-- custcal  -->
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
            //console.log(before + e);
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

            // first doesnt exist
            if (sel1 === null && !isDisabled) {
                e.id = 'sel1';
                e.classList.add('sel1');
                $(e).parent().prevAll('tr').find('td').addClass('disabled'); // ugly code
                $(e).prevAll('td').addClass('disabled'); // ugly code
                //log('select second option');

                // temp
                _id('custout1').innerHTML = e.innerText + '/' + month + '/' + year;
            }

            // second doesnt exist
            else if (sel2 === null) { // prevent making #2 to #1
                if (isDisabled || e.id == 'sel1') return false;
                e.id = 'sel2';
                e.classList.add('sel2');

                // selection is complete
                var par = e.parentNode, // tr
                    parPar = par.parentNode; // tbody (main)

                var td = parPar.querySelectorAll('td'),
                    go = false,
                    stop = false,
                    i = 0,
                    s1i = 0,
                    s2i = 999;

                _for(td, function(e) {
                    i++;

                    if (e.id == 'sel1') {
                        go = 1;
                        s1i = i;
                    }
                    if (e.id == 'sel2') {
                        stop = 1;
                        s2i = i;
                    }

                    if (s1i < s2i && go) {
                        if (go) {
                            e.classList.add('range');
                        }
                        // temp
                        _id('custout2').innerHTML = +e.innerText + '/' + month + '/' + year;

                    }
                    if (stop) {
                        go = 0;
                    }

                })

            }

            // both selections exist
            else {
                var td = e.parentNode.parentNode.querySelectorAll('td');
                _for(td, function(e) {
                    e.classList.remove('range', 'disabled');
                });

                sel1.removeAttribute('class');
                sel1.removeAttribute('id');
                if (sel2 !== null) {
                    sel2.removeAttribute('class');
                    sel2.removeAttribute('id');
                }

            } //end else/if

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
            ////console.log(m);

            str += '<table>';
            str +=
                '<thead><tr><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr></thead><tbody>';

            for (key in days) {
                i++;

                if (i === 1) str += '<tr>';

                //if( key < startDay || key > totalDays ) { str += '<td class="notCurMonth"><i>'+days[key]+'</i></td>'; }
                //else { str += '<td><i>'+days[key]+'</i></td>'; }

                str += '<td><i>' + days[key] + '</i></td>';
                //console.log(key)
                if (i === 7) {
                    str += '</tr>';
                    i = 0;
                }

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
        //console.log(month)
        $('#custmonth').text(monthArr[month - 1] + ' ' + year); // set month text

        function bind(month, year) {
            var tb = _id('custcal');
            $(tb).on('click', 'td', function() {
                userSelect(this, null, month, year);
            });

            // next month
            $('#custdisp').on('click', 'div', function() {
                var t = this;
                if (t.id == 'custnext') {
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
                $('#custmonth').text(monthArr[month - 1] + ' ' + year);
            })

        };

        bind(month, year);

    })(jQuery, window, document); // end() init
</script>

<!-- Carousel  -->
<script>
    const carouselItem = document.querySelectorAll(".carousel-item")
    const CarouselChange = (id) => {
        for (let index = 0; index < carouselItem.length; index++) {
            const element = carouselItem[index];
            element.classList.remove("active")
        }
        document.getElementById(id).classList.add("active")
        // //console.log(document.getElementById(id))
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
            //console.log(before + e);
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
            ////console.log(m);

            str += '<table>';
            str +=
                '<thead><tr><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr></thead><tbody>';

            for (key in days) {
                i++;

                if (i === 1) str += '<tr>';

                //if( key < startDay || key > totalDays ) { str += '<td class="notCurMonth"><i>'+days[key]+'</i></td>'; }
                //else { str += '<td><i>'+days[key]+'</i></td>'; }

                str += '<td><i>' + days[key] + '</i></td>';
                //console.log(key)
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
        var date = new Date();
        var month = date.getMonth() + 1,
            year = date.getFullYear();

        getMonth(month, year);
        //console.log(month)
        $('#editmonth').text(monthArr[month - 1] + ' ' + year); // set month text

        function bind(month, year) {
            var tb = _id('editcal');
            $(tb).on('click', 'td', function() {
                userSelect(this, null, month, year);
            });

            // next month
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

<!-- Uplaod Image  -->
<script>
    const imagesBtn = document.getElementById("UploadImages")
    const docBtn = document.getElementById("docBtn")
    const Voicebtn = document.getElementById("voice")
    const tagsBtn = document.getElementById("tagsBtn")
    const uploadVideo = document.getElementById("uploadVideo")
    // const tagsbtn = document.querySelectorAll(".tagsrow button")

    const img = document.createElement("img")
    // POST IMAGE UPLOAD AND DISPLAY

    imagesBtn.addEventListener("click", (e) => {
        e.target.value = null
    })
    imagesBtn.addEventListener("change", (e) => {
        const files = e.target.files
        //console.log("afasf")
        const display = document.getElementById("display")
        for (let index = 0; index < files.length; index++) {
            const fileReader = new FileReader()
            fileReader.addEventListener("load", (e) => {
                const picfile = e.target
                const div = document.createElement("div")
                div.setAttribute("id", `Image${index+3273}`)
                // //console.log(picfile)
                div.innerHTML =
                    `<p class="closeImg btn-close" onclick="closeImg('Image${index+3273}')" ></p> <img src="${picfile.result}" onclick='ViewImg("${picfile.result}", true)'>`
                display.append(div)
            })
            fileReader.readAsDataURL(files[index])
        }
        docBtn.disabled = true
        Voicebtn.disabled = true

    })

    const closeImg = (id) => {
        document.getElementById(id).remove()
    }

    const ViewImg = (src, bool) => {
        if (bool) {

            const div = document.querySelector("#viewImg ")
            const img = document.querySelector("#viewImg img")
            div.style.display = "flex"
            img.src = src
        } else {
            const div = document.querySelector("#viewImg ")
            div.style.display = "none"

        }
    }
    // POST IMAGE UPLOAD AND DISPLAY

    // PUBLIC OR SPECIFI POST DROPDOWN
    const PostDD = (value) => {
        if (value == "specific") {
            document.getElementById("Specific").style.display = "flex"
            document.getElementById("privacy").innerHTML =
                `<img src="{{ asset('storage/assets') }}/images/private.png" alt="" class="me-1"> <p  class="mb-0 ms-0"> Private </p> `
        } else {
            document.getElementById("privacy").innerHTML =
                `<img src="{{ asset('storage/assets') }}/images/earth.png" alt="" class="me-1"> <p  class="mb-0 ms-0"> Public </p> `
            // document.getElementById("privacy").innerText = event.target.innerText
            document.getElementById("Specific").style.display = "none"
        }
    }
    // PUBLIC OR SPECIFI POST DROPDOWN

    // POST TAGS
    const AddTags = (e, id) => {
        e.preventDefault();
        const element = document.getElementById(id);
        element.setAttribute("id", `${id}`);

        const template = document.createElement("template");
        template.innerHTML = `
            <span class="material-symbols-outlined me-2" onclick="RemoveTag(event, '${id}', '${id}')">cancel</span>
        `;
        element.append(template.content.firstElementChild);
        document.querySelector("#tags").append(element);

        // Update the hidden input field.
        var tagInput = document.getElementById('tag-input');
        var currentTags = tagInput.value.split(',').filter(tag => tag.trim() !==
            ''); // Remove any empty or whitespace-only values
        currentTags.push(id.replace('tag', '')); // Remove the 'tag' prefix
        tagInput.value = currentTags.join(',');
    };

    const RemoveTag = (e, id, orgId) => {
        const element = document.getElementById(id)
        element.setAttribute("id", `${orgId}`)
        document.querySelector(`#${orgId} span`).remove()

        document.querySelector(".tagsrow").append(element)

        // Update the hidden input field.
        var tagInput = document.getElementById('tag-input');
        var currentTags = tagInput.value.split(',');
        var tagIndex = currentTags.indexOf(id);
        if (tagIndex > -1) {
            currentTags.splice(tagIndex, 1);
        }
        tagInput.value = currentTags.join(',');
    }

    const InputTags = (e) => {
    e.preventDefault();

    const tagsInput = document.getElementById("tagsInput");
    const tagName = tagsInput.value;

    if (tagName === "") {
        return;
    }

    // Send an AJAX request to submit the form
    const formData = new URLSearchParams();
    formData.append('tagName', tagName);

    // Construct the absolute URL for the AJAX request
    const url = `${window.location.origin}/addTag`;

    // Fetch API
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            return response.json(); // Parse the response as JSON
        } else {
            throw new Error('Network response was not ok.');
        }
    })
    .then(data => {
        // Response received successfully
        const newTagId = data.id;
        console.log("New tag ID:", newTagId);

        // Continue with adding the new tag
        addNewTag(newTagId);
    })
    .catch(error => {
        // Error occurred
        console.error('An error occurred:', error);
    });

    tagsInput.value = '';

    const AllTagsRow = document.querySelectorAll("#tagsrow button");

    for (let index2 = 0; index2 < AllTagsRow.length; index2++) {
        const element2 = AllTagsRow[index2];
        if (element2.innerHTML === tagName) {
            return;
        }
    }

    function addNewTag(newTagId) {
        const template = document.createElement("template");
        template.innerHTML = `
            <div class="" id="tag${newTagId}">
                <button href="" onclick="AddTags(event, 'tag${newTagId}')">${tagName}</button>
            </div>
        `;

        document.querySelector("#tagsrow").append(template.content.firstElementChild);
    }

        // UPLOAD AND DISPLAY DOCUMENTS
        const docs = document.getElementById("docs")
        docBtn.addEventListener("click", (e) => {
            e.target.value = null
        })
        var filesArr = []
        docBtn.addEventListener("change", (e) => {
            const files = e.target.files
            filesArr.push(files)
            for (let index = 0; index < files.length; index++) {
                let fileName = files[index].name
                const ext = fileName.split(".")[1]
                if (fileName.length >= 25) {
                    fileName = fileName.substr(0, 25) + "..." + ext
                } else {

                }
                let documentExtImg = "";
                if (ext == "doc") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/docicon.png"
                } else if (ext == "docx") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/docx.png"
                } else if (ext == "rtf") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/rtf.png"
                } else if (ext == "pdf") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/pdf.png"
                } else if (ext == "xls") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/xls.png"
                } else if (ext == "xlsx") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/xls.png"
                } else if (ext == "ppt") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/ppt.png"
                } else if (ext == "pptx") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/pptx.png"
                } else if (ext == "txt") {
                    documentExtImg = "{{ asset('storage/assets') }}/images/txt.png"
                }
                const div = document.createElement("div")
                // div.setAttribute("download", "download")
                // div.setAttribute("href", `${fileName}`)

                div.setAttribute("class", "docName")
                const random = Math.random(1, 10)
                div.setAttribute("id", `${fileName + random}`)
                // div.setAttribute("onclick", "deleteDoc(event)")
                div.innerHTML =
                    `<div> <img src=${documentExtImg}> ${fileName} </div> <span class="material-symbols-outlined" onclick="deleteDoc('${fileName + random}')">cancel</span>`
                docs.append(div)
                // //console.log(div)
            }
            imagesBtn.disabled = true
            Voicebtn.disabled = true
        })
        const deleteDoc = (e) => {
            // e.target.remove()
            document.getElementById(e).remove()
        }
    };

    // Tags Search
    $(document).ready(function() {
        $('#tagSearchInput').on('input', function() {
            const searchValue = $(this).val().toLowerCase();

            $('.tag-item').each(function() {
                const tagText = $(this).text().toLowerCase();
                if (tagText.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

    //Tag Search on the Right
    $(document).ready(function() {
        $('#tagSearchx').on('input', function() {
            const searchValue = $(this).val().toLowerCase();

            $('.tagx-item').each(function() {
                const tagText = $(this).text().toLowerCase();
                if (tagText.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

    // UPLOAD AND DISPLAY DOCUMENTS

    // const toggleModal = false

    // CLOSE CREATE POST MODAL
    const CloseModal = (e, toggle) => {
        if (toggle) {
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

        } else {

            if (confirm("Are you sure you want to close? All Unsaved Changes will Be Lost")) {
                document.getElementById("CreatePostTextarea").value = ""
                document.querySelector("#display").innerHTML = ""
                document.querySelector(".voice").innerHTML = ""

                const tagdivs = document.querySelectorAll("#tags button")
                //console.log(tagdivs[0])
                for (let index = 0; index < tagdivs.length; index++) {
                    const element = tagdivs[index];
                    const div = document.createElement("div")
                    div.innerHTML = element
                    //console.log(element)
                    document.querySelector("#tagsrow").append(element)
                }

                document.querySelector(".docs").innerHTML = ""

                docBtn.disabled = false
                tagsBtn.disabled = false
                Voicebtn.disabled = false
                imagesBtn.disabled = false
                const modal = document.querySelector(".modal")
                modal.removeAttribute("role")
                // document.querySelector(body)
                document.querySelector("body").style = ""
                document.querySelector("body").classList.remove("modal-open")
                modal.classList.remove("show")
                modal.style.display = "none"
                document.querySelector(".modal-backdrop").remove()
            } else {
                //console.log("cancel")
            }
        }

    }
    // CLOSE CREATE POST MODAL

    // Tags Form Submit AJAX
    function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the form data
        var formData = $('#tagForm').serialize();

        // Send an AJAX request
        $.ajax({
            url: $('#tagForm').attr('action'), // Form action URL
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle the response here
                console.log(response);
                // Update the UI if needed
            },
            error: function(xhr, status, error) {
                // Handle the error
                console.log(error);
            }
        });
    }

    // DELETE POST
    /* const DeletePost = (id) => {
        document.getElementById(id).remove()
    } */
    // DELETE POST

    const OpenVideoDiv = () => {
        document.querySelector(".UploadVideoContainer").style.display = "flex"
    }
    const PublishPost = (e) => {
        e.preventDefault()
        const CreatePostTextarea = document.getElementById("CreatePostTextarea")
        const displayImages = document.querySelector(".displayImages")
        const voiceValue = document.querySelector(".documents .voice")
        const TagsValue = document.querySelector(".documents .tagsrow")
        const DocsValue = document.querySelector(".documents .docs")
        const Posts = document.querySelector(".Posts")
        const template = document.createElement("template")
        const TagsValueSpan = document.querySelectorAll(".documents .tagsrow div span")
        const PostTags = document.querySelectorAll(".Posts .post-section .tagsrow div span")

        const RandomPostId = "Post" + Math.floor(Math.random() * 1000)
        const RandomCarouselId = "Carousel" + Math.floor(Math.random() * 1000)

        //console.log(PostTags)
        for (let index = 0; index < PostTags.length; index++) {
            const element = PostTags[index];
            element.style.display = "none"
        }
        // 1-GET TEXTAREA VALUE

        if (displayImages.innerHTML != "") {
            const imgs = document.querySelectorAll(".displayImages img") //uplosfed Images
            const Imgcontainer = document.createElement("div") //container for images
            const navigatorContainer = document.createElement("div") //navigator
            navigatorContainer.setAttribute("class", "carousel-indicators")
            Imgcontainer.setAttribute("class", "carousel-inner")

            for (let index = 0; index < imgs.length; index++) {
                const element = imgs[index];

                // DISPLAYING UPLAOD IMAGES N POST
                const imgdiv = document.createElement("div")
                imgdiv.setAttribute("class", `carousel-item`)
                imgdiv.style.width = "100%"
                imgdiv.style.height = "500px"
                imgdiv.style.maxWidth = "100%"
                imgdiv.style.maxHeight = "100%"

                imgs[index].setAttribute("class", "d-block w-100")
                imgs[index].style.width = "100%"
                imgs[index].style.height = "100%"
                imgs[index].style.objectFit = "contain"
                imgdiv.append(imgs[index])
                Imgcontainer.append(imgdiv)

                // IMAGE NAVIGATOR
                const imgNavigator = document.createElement("div")
                imgNavigator.style.background = `url("${imgs[index].src}")`
                // imgNavigator.setAttribute("src", `${imgs[index].src}`)
                imgNavigator.setAttribute("class", `imgNavigator`)
                imgNavigator.setAttribute("data-bs-target", "#${RandomCarouselId}")
                imgNavigator.setAttribute("data-bs-slide-to", `${index}`)
                if (index == 0) {
                    imgNavigator.setAttribute("class", `imgNavigator active`)
                    imgNavigator.setAttribute("aria-current", `true`)
                    imgdiv.setAttribute("class", ` carousel-item active`)

                }
                imgNavigator.setAttribute("aria-label", `Slide ${index + 1}`)
                navigatorContainer.append(imgNavigator)
            }

            // POST TEMPLATE
            template.innerHTML = `<div class="post-section" id="${RandomPostId}">
        <div class=" d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
          <div class="d-flex first ">
            <div class="postProfileIcon" >
    profile_pictures" />
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
        <div id="${RandomCarouselId}" class="carousel slide carouselExampleCaptions" style="height:590px; padding-bottom:0;">
       ${navigatorContainer.outerHTML}
${Imgcontainer.outerHTML}
<div class="navigatorScroll d-flex  justify-content-between">
<button onclick="navigatorScroll(false, '${RandomCarouselId}')"><i class="fa-solid fa-chevron-left"></i></button>
<button onclick="navigatorScroll(true, '${RandomCarouselId}')">    <i class="fa-solid fa-chevron-right"></i></button>
</div>

</div>
      </div>`
            Posts.insertBefore(template.content.firstElementChild, Posts.childNodes[2])

        } else if (voiceValue.innerHTML != "") {

            template.innerHTML = `
<div class="post-section" id="postId3">
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
          <div class="d-flex first">
            <div class="postProfileIcon" >
    profile_pictures" />
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

        } else if (DocsValue.innerHTML != "") {
            const div = document.createElement("div")
            div.setAttribute("class", "docsContainer")
            div.style.width = "100%"
            div.style.height = "500px"

            console.log(filesArr[0][0])
            const Totaldocuments = document.querySelectorAll(".documents .docs .docName")
            for (let index = 0; index < Totaldocuments.length; index++) {
                const element = Totaldocuments[index];
                const i = document.createElement("i")

                const previewBtn = document.createElement("template")
                previewBtn.innerHTML = `<a href="" style="padding-right:1rem; border-right: 1px solid black;  font-size:1.6rem; font-size: 1.2rem; margin-left: auto; margin-right: 1rem; display:flex;justify-content: center;align-items: center; display: flex;justify-content: center;
    align-items: center;"> Preview <i class="fa-regular fa-eye" style="font-size:1.6rem; margin-left:.5rem;"></i> </a>`

                i.setAttribute("class", "fa-solid fa-download fa-2x")
                i.style.fontSize = "1.6rem"
                element.append(previewBtn.content.firstElementChild)
                element.append(i)
                const a = document.createElement("a")
                a.setAttribute("download", "download")
                a.setAttribute("href", ``)
                a.append(element)
                const pdfCanvas = document.createElement("canvas")
                pdfCanvas.id = "pdfCanvas"
                pdfCanvas.style.maxWidth = "100%"
                pdfCanvas.style.maxHeight = "80%"
                div.append(a)
                div.append(pdfCanvas)

            }
            template.innerHTML = `
<div class="post-section" id="postId1">
        <div class="PostHeader d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
          <div class="d-flex first">
            <div class="postProfileIcon" >
            <img src="https://lfw.synet.com.pk/profile_pictures/64ac0862d4c92.png">
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
            //console.log("hello")
            Posts.insertBefore(template.content.firstElementChild, Posts.childNodes[2])
            // viewPDF(filesArr[0][0])
            // renderDocument(filesArr[0][0])

        } else {
            if (CreatePostTextarea.value != "") {
                template.innerHTML = `
  <div class="post-section" id="postId1">
        <div class="PostHeader d-flex justify-content-between pb-4" style="border-bottom: 1px solid #f7f6f6">
          <div class="d-flex first">
            <div class="postProfileIcon" >
    profile_pictures" />
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
                Posts.insertBefore(template.content.firstElementChild, Posts.childNodes[2])

            }
        }

    }

    async function getPDFFileByLink(pdfLink) {
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
        // Fetch the PDF file
        pdfjsLib.getDocument(pdfLink)
            .promise
            .then(function(pdf) {
                // Fetch the first page of the PDF
                pdf.getPage(1).then(function(page) {
                    var canvas = document.getElementById("pdfCanvas");
                    var context = canvas.getContext("2d");

                    var viewport = page.getViewport({
                        scale: 1
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the PDF page on the canvas
                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    });
                });
            })
            .catch(function(error) {
                console.log("Error loading PDF:", error);
            });
    }
    const openPreview = (e, id, doc) => {
        document.querySelector(".documentPreview").style.display = "flex"
        getPDFFileByLink(doc)
        console.log(doc)

    }
    const ClosePreview = () => {
        document.querySelector(".documentPreview").style.display = "none"

    }
    let CarouselImageScrollCount = 0
    let EnableScrollNavigator = false
    const navigatorScroll = (value, id) => {
        // const Div = document.querySelector(".carousel-indicators")
        const img = document.querySelectorAll(`#${id} .carousel-item`)
        const navigators = document.querySelectorAll(`#${id} .carousel-indicators div`)
        if (value && CarouselImageScrollCount < img.length - 1) {
            CarouselImageScrollCount++

            for (let index = 0; index < img.length; index++) {
                const element = img[index];
                element.classList.remove("active")
                navigators[index].classList.remove("active")
            }
            img[CarouselImageScrollCount].classList.add("active")
            navigators[CarouselImageScrollCount].classList.add("active")

            if (CarouselImageScrollCount >= 3) {
                EnableScrollNavigator = !EnableScrollNavigator
                if (EnableScrollNavigator) {
                    document.querySelector(`#${id} .carousel-indicators`).scrollBy({
                        left: 100,
                        top: 0,
                        behavior: 'smooth'
                    })
                }
            }

        } else if (!value && CarouselImageScrollCount > 0) {
            CarouselImageScrollCount--

            const img = document.querySelectorAll(`#${id} .carousel-item`)
            for (let index = 0; index < img.length; index++) {
                const element = img[index];
                element.classList.remove("active")
                navigators[index].classList.remove("active")

            }
            img[CarouselImageScrollCount].classList.add("active")
            navigators[CarouselImageScrollCount].classList.add("active")

            //console.log(CarouselImageScrollCount)

            document.querySelector(`#${id} .carousel-indicators`).scrollBy({
                left: -100,
                top: 0,
                behavior: 'smooth'
            })

        } else {
            return
        }
    }

    const OpenImage = (src, value) => {
        const div = document.querySelector("#OpenImg")
        if (value) {
            //console.log("Open")
            div.style.display = "flex"
            const img = document.querySelector("#OpenImg img")
            img.src = src
        } else {
            //console.log("Close")
            div.style.display = "none"
        }

    }

    let SearchBarToggle = false
    const SearchBar = document.querySelector(".SearchbarMb")
    const navItem = document.querySelector(".navbar-nav")
    const OpenSearchBar = (value) => {
        if (value) {
            SearchBar.style.display = "flex"
            SearchBar.style.display = "100"

            navItem.style.display = "none"
        } else {
            SearchBar.style.display = "none"

            navItem.style.display = "flex"

        }
    }

    /*  const videoButton = document.getElementById('main__video-button');
     const video = document.getElementById('main__video');

     let videoRecorder;

     async function init() {

         try {
             const windowStream = await navigator.mediaDevices.getUserMedia({
                 audio: true,
                 video: true
             });
             const videoStream = await navigator.mediaDevices.getUserMedia({
                 audio: false,
                 video: true
             });
             startWebcam(windowStream, videoStream);
         } catch (err) {
             alert('Error retrieving a media device.');
             console.log(err);
         }
     }

     function startWebcam(windowStream, videoStream) {
         window.stream = windowStream;
         video.srcObject = videoStream;
     }

     videoButton.onclick = () => {
         video.removeAttribute("controls", "")

         video.style.display = "block"
         document.querySelector("#videoElement").style.display = "none"
         switch (videoButton.textContent) {
             case 'Record':
                 startRecording();
                 videoButton.textContent = 'Stop';
                 break;
             case 'Stop':
                 videoButton.textContent = 'Record';
                 videoRecorder.stop();
                 video.setAttribute("controls", "")
                 break;
         }

     }

     function startRecording() {
         if (video.srcObject === null) {
             video.srcObject = window.stream;
         }
         videoRecorder = new MediaRecorder(window.stream, {
             mimeType: 'video/webm;codecs=vp9,opus'
         });
         videoRecorder.start();
         videoRecorder.ondataavailable = recordVideo;
     }

     function recordVideo(event) {
         if (event.data && event.data.size > 0) {
             video.srcObject = null;
             let videoUrl = URL.createObjectURL(event.data);
             video.src = videoUrl;
         }
     }

     function stopRecording() {
         videoRecorder.stop();
     }

     init();

     function uploadVideoFunc(event) {
         const file = event.files[0];
         const reader = new FileReader();

         reader.onload = function(e) {

             console.log(reader)
             const src = e.target.result
             const videoElement = document.getElementById('videoElement');
             document.getElementById('main__video').style.display = "none"
             videoElement.style.display = "block"
             videoElement.src = src;
             videoElement.load();
             videoElement.play();
         };
         reader.readAsDataURL(file);

     }*/

    function uploadVideoFunc(input) {
    const file = imagesBtn.files[0];

    const uploadButton = document.querySelector('#upload-button');
    const recordButton = document.querySelector('#record-button');
    const cancelButton = document.querySelector('#cancel-button');
    const uploadProgress = document.querySelector('#upload-progress');
    const fileNameDisplay = document.querySelector('#file-name-display');
    const trashBinIcon = document.querySelector('#trash-bin-icon');

    uploadButton.style.display = 'none';
    recordButton.style.display = 'none';
    cancelButton.style.display = 'block';
    uploadProgress.style.display = 'block';

    // Display the name of the selected file and the trash bin icon
    fileNameDisplay.textContent = file.name;
    fileNameDisplay.style.display = 'block';
    trashBinIcon.style.display = 'block';

    // Convert the File object to a Base64 string
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onprogress = function(event) {
        if (event.lengthComputable) {
            const percentCompleted = Math.round((event.loaded * 100) / event.total);
            uploadProgress.value = percentCompleted;
        }
    };
    reader.onloadend = function() {
        const base64 = reader.result;

        // Set the Base64 string and the filename as the value of a hidden input field
        const videoInput = document.querySelector('#video-input');
        videoInput.value = JSON.stringify({ base64, filename: file.name });
        const videoFilenameInput = document.querySelector('#video-filename');
        videoFilenameInput.value = file.name;

        uploadProgress.style.display = 'none';
        cancelButton.style.display = 'none';
    };
    reader.onerror = function() {
        console.error('File reading failed');
    };

    cancelButton.onclick = function() {
        reader.abort();
    };
}

    function removeFile() {
    const uploadButton = document.querySelector('#upload-button');
    const recordButton = document.querySelector('#record-button');
    const fileNameDisplay = document.querySelector('#file-name-display');
    const trashBinIcon = document.querySelector('#trash-bin-icon');
    const videoInput = document.querySelector('#video-input');

    // Clear the value of the hidden input field
    videoInput.value = '';

    // Hide the file name display and the trash bin icon
    fileNameDisplay.style.display = 'none';
    trashBinIcon.style.display = 'none';

    // Show the upload and record buttons
    uploadButton.style.display = 'block';
    recordButton.style.display = 'block';
}

    function showSpinner() {
        const spinner = document.querySelector('#spinner');
        spinner.style.display = 'block';
    }
</script>

<!-- COUNTRY SELECT  -->
<script src="{{ asset('storage/assets') }}/build/js/countrySelect.js"></script>
<script>
    $("#country_selector").countrySelect({
        // defaultCountry: "jp",
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // responsiveDropdown: true,
        preferredCountries: ['ca', 'gb', 'us']
    });
</script>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.14/viewer.min.js"></script>
<script>
    /* VIDEO RECORDING */
    let myMediaRecorder;
    let recordedBlobs;

    const startRecordingButton = document.querySelector('#start-recording-button');
    const stopRecordingButton = document.querySelector('#stop-recording-button');
    const recordButton = document.querySelector('#record-button');
    const closeRecorderButton = document.querySelector('#close-recorder-button');
    const mainVideo = document.querySelector('#main__video');
    const videoElement = document.querySelector('#videoElement');
    const saveVideoButton = document.querySelector('#save-video-button');
    const uploadButton = document.querySelector('#upload-button');
    let stream;

    saveVideoButton.addEventListener('click', function () {

    });
    recordButton.addEventListener('click', async () => {
        recordButton.style.display = 'none';
        startRecordingButton.style.display = 'block';
        mainVideo.style.display = 'block';
        videoElement.style.display = 'none';
        uploadButton.style.display = 'none';
        stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        });
        mainVideo.srcObject = stream;
        mainVideo.play();
    });

    startRecordingButton.addEventListener('click', () => {
        startRecordingButton.style.display = 'none';
        stopRecordingButton.style.display = 'block';
        mainVideo.style.display = 'block';
        videoElement.style.display = 'none';
        //closeRecorderButton.style.display = 'block';
        startRecording();
    });

    stopRecordingButton.addEventListener('click', () => {
        stopRecordingButton.style.display = 'none';
        startRecordingButton.style.display = 'block';
        startRecordingButton.innerHTML = "Start New Recording";
        closeRecorderButton.style.display = 'block';
        mainVideo.style.display = 'none';
        stopRecording();
    });

    closeRecorderButton.addEventListener('click', () => {
        closeRecorderButton.style.display = 'none';
        stopRecordingButton.style.display = 'none';
        startRecordingButton.style.display = 'none';
        mainVideo.style.display = 'none';
        videoElement.style.display = 'none';
        recordButton.style.display = 'block';
    });

    function startRecording() {
        recordedBlobs = [];
        myMediaRecorder = new MediaRecorder(stream);
        myMediaRecorder.ondataavailable = handleDataAvailable;
        myMediaRecorder.start();
    }

    function handleDataAvailable(event) {
        if (event.data && event.data.size > 0) {
            recordedBlobs.push(event.data);
        }
    }

    function blobToBase64(blob) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onloadend = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsDataURL(blob);
        });
    }

    function stopRecording() {
        myMediaRecorder.onstop = async (event) => {
            const blob = new Blob(recordedBlobs, {
                type: 'video/webm'
            });
            const url = window.URL.createObjectURL(blob);
            videoElement.src = url;
            videoElement.style.display = 'block'; // Show the videoElement

            // Convert the Blob data to a Base64 string
            const base64 = await blobToBase64(blob);

            // Set the Base64 string as the value of a hidden input field
            const videoInput = document.querySelector('#video-input');
            videoInput.value = base64;

            // Show the "Save Video" button

            saveVideoButton.style.display = 'block';
            mainVideo.srcObject = null;
            var tracks = stream.getTracks();  // get all tracks from the MediaStream

            tracks.forEach(function(track) {
                track.stop();
            });

            const audioContext = new AudioContext()
                audioContext.close
                const microphone = audioContext.createMediaStreamSource(stream)
                microphone.disconnect



        };

        myMediaRecorder.stop();
    }

    /* function myUploadVideo(blob) {
        const formData = new FormData();
        formData.append('video', blob, 'recorded.webm');
        formData.append('_token', '{{ csrf_token() }}'); // Add the CSRF token

        fetch('/upload-video', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error(error));
    } */
    function openVideoDiv() {
        var videoContainer = document.getElementById("UploadVideoContainer");
        if (videoContainer.style.display === "none") {
            videoContainer.style.display = "block";
        } else {
            videoContainer.style.display = "none";
        }
    }



</script>

<script>
// UPLOAD AND DISPLAY DOCUMENTS
const docs = document.getElementById("docs")
docBtn.addEventListener("click", (e) => {
  e.target.value = null
})
docBtn.addEventListener("change", (e) => {
  const files = e.target.files
  for (let index = 0; index < files.length; index++) {
    const fileName = files[index].name
    const ext = fileName.split(".")[1]

    let documentExtImg = "";
    if (ext == "doc") {
      documentExtImg = "{{ asset('storage/assets/images') }}/docicon.png"
    } else if (ext == "docx") {
      documentExtImg = "{{ asset('storage/assets/images') }}/docx.png"
    } else if (ext == "rtf") {
      documentExtImg = "{{ asset('storage/assets/images') }}/rtf.png"
    } else if (ext == "pdf") {
      documentExtImg = "{{ asset('storage/assets/images') }}/pdf.png"
    } else if (ext == "xls") {
      documentExtImg = "{{ asset('storage/assets/images') }}/xls.png"
    } else if (ext == "xlsx") {
      documentExtImg = "{{ asset('storage/assets/images') }}/xls.png"
    } else if (ext == "ppt") {
      documentExtImg = "{{ asset('storage/assets/images') }}/ppt.png"
    } else if (ext == "pptx") {
      documentExtImg = "{{ asset('storage/assets/images') }}/pptx.png"
    } else if (ext == "txt") {
      documentExtImg = "{{ asset('storage/assets/images') }}/txt.png"
    } else if (ext == "png") {
      documentExtImg = "{{ asset('storage/assets/images') }}/png.png"
    } else if (ext == "jpg") {
      documentExtImg = "{{ asset('storage/assets/images') }}/jpg.png"
    } else {
      documentExtImg = "{{ asset('storage/assets/images') }}/unknown.png"
    }

    const div = document.createElement("div")
    // div.setAttribute("download", "download")
    // div.setAttribute("href", `${fileName}`)

    div.setAttribute("class", "docName")
    const random = Math.random(1, 10)
    div.setAttribute("id", `${fileName + random}`)


    // div.setAttribute("onclick", "deleteDoc(event)")
    div.innerHTML = `<div> <img src=${documentExtImg}> ${fileName.substr(0, 10)} </div> <span class="material-symbols-outlined" onclick="deleteDoc('${fileName + random}')">cancel</span>`
    docs.append(div)


    // console.log(div)
  }
  imagesBtn.disabled = true
  Voicebtn.disabled = true
})





const deleteDoc = (e) => {
  // e.target.remove()
  document.getElementById(e).remove()
}

</script>
<script>
   const deletePost = (postId) => {
    document.getElementById(postId).remove();
        // Make an AJAX request to delete the post
        fetch(`/delete-post/${postId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Replace with your CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                console.log(data.success);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    // Prevent default form submission behavior
    const form = document.querySelector('.dropdown-menu');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
    });
</script>

<script>
    let recording_element = document.getElementById('voice-recording');
    document.getElementById('voice').addEventListener('click', () => {
        if (recording_element.style.display === 'none') {
            recording_element.style.display = 'block';
        } else {
            recording_element.style.display = 'none';
        }
    });

    let video_element = document.getElementById('videosection');
    document.getElementById('uploadVideo').addEventListener('click', () => {
        if (video_element.style.display === 'none') {
            video_element.style.display = 'block';
        } else {
            video_element.style.display = 'none';
        }
    });

    document.getElementById("post-form").addEventListener("submit", function (event) {
    var contentTextarea = document.getElementById("CreatePostTextarea");
    var errorMessage = document.getElementById("error-message");

    if (contentTextarea.value.trim() === "") {
        // Prevent the form from submitting
        event.preventDefault();

        // Show the error message
        errorMessage.style.display = "block";
        contentTextarea.classList.add("error-border");
    } else {
        // Hide the error message if content is not empty
        errorMessage.style.display = "none";
        contentTextarea.classList.remove("error-border");
    }
});

</script>
