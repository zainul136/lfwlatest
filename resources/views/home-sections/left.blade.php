<div class="col-sm-3" id="SearchPost">
    <div class="green-outer me-5">
        @php
            $backgroundImage = isset($data['user_information']->profile_picture) ?
                asset('user_media/' . $data['user']->id . '/profile_picture/' . $data['user_information']->profile_picture) :
                asset('storage/assets/images/profile.jpeg');

        @endphp
        <div class="green-box" style="background-image: url('{{ $backgroundImage }}');">
            <div class="edit d-flex justify-content-end dropdown">
                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"
                    data-bs-auto-close="outside"><span class="material-symbols-outlined "> edit </span></a>
                    <form class="dropdown-menu p-4 editDropdown" method="POST" action="{{ route('profile.updated') }}" enctype="multipart/form-data">
                        @csrf
                        <p>Edit Info <span>* Indicates required</span></p>
                        <h2>Basic Info</h2>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="first_name" class="form-label">First Name*</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jenifer" disabled value="{{ isset($data['user']->first_name) ? $data['user']->first_name : '' }}" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="last_name" class="form-label">Last Name*</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Emile" disabled value="{{ isset($data['user']->last_name) ? $data['user']->last_name : '' }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="dropdown col-lg-6 mb-3">
                                <label for="gender" class="form-label">Gender*</label>
                                <select class="form-control" id="gender" name="gender" @if (isset($data['user_information']->gender)) disabled @endif>
                                    <option value="Male" @if (isset($data['user_information']->gender) && $data['user_information']->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if (isset($data['user_information']->gender) && $data['user_information']->gender == 'Female') selected @endif>Female</option>
                                </select>
                            </div>
                            <div class="mb-3 w-50 col-lg-6">
                                <label for="date_of_birth" class="form-label">Date of Birth*</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Select date of birth" value="{{ isset($data['user_information']->date_of_birth) ? $data['user_information']->date_of_birth : '' }}" @if (isset($data['user_information']->date_of_birth)) disabled @endif>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 w-50 col-lg-6">
                                <label for="email" class="form-label">Email* </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="{{ isset($data['user']->email) ? $data['user']->email : '' }}" >
                            </div>
                            <div class="mb-3 w-50 col-lg-6">
                                <label for="phone" class="form-label">Phone Number* </label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+1xxxxxxxxxxxxxxx" value="{{ isset($data['user_information']->phone_number) ? $data['user_information']->phone_number : '' }}">
                            </div>
                        </div>
                        <div class="w-100 row">
                            <div class="mb-3 col-lg-6">
                                <label for="city" class="form-label">City* </label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Madrid" value="{{ isset($data['user_information']->city) ? $data['user_information']->city : '' }}" >
                            </div>
                            <div class="form-group first col-lg-6">
                                <label for="country" class="form-label">Country</label>
                                <input id="country_selector" type="text" class="form-group col-lg-12" style=" height: 46px;" value="{{ isset($data['user_information']->country) ? $data['user_information']->country : '' }}">
                                <div class="form-item" style="display:none;">
                                    <input class="form-group border-0" type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
                                    <label for="country_selector_code">...and the selected country code will be updated here</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address* </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1610 County Road 75, Alturas, CA 96101" value="{{ isset($data['user_information']->address) ? $data['user_information']->address : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/jpeg, image/jpg, image/png">
                            @error('profile_picture')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mapouter mb-4">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ isset($data['user_information']->address) ? urlencode($data['user_information']->address) : urlencode('United States') }}&amp;output=embed"></iframe>
                            </div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 272px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 272px;
                                }

                                .gmap_iframe {
                                    height: 272px !important;
                                }
                            </style>
                        </div> --}}
                        <div class="d-flex btns">
                            <a href="{{ route('profile.edit') }}" class="btn ditPfBtn">Edit Profile</a>
                            <button type="submit" class="btn btn-primary submit">Save</button>
                        </div>
                        </form>
                        </div>
                        <!-- <img src="images/Rectangle 387.png"/>
                        <h3>Jenifer Emile</h3> -->
                        </div>
                        <div class="greenemail">
                            <p>
                                Name: <span class="float-end">{{ isset($data['user']->first_name) && isset($data['user']->last_name) ? $data['user']->first_name . ' ' . $data['user']->last_name : '' }}</span>
                            </p>
                            <p>
                                Email: <span class="float-end">{{ isset($data['user']->email) ? $data['user']->email : '' }}</span>
                            </p>
                            <p>Country:
                                <span class="float-end">
                                             @if(isset($data['user_information']->country))
                                            <?php
                                            $countryflag = \App\Models\Country::query()->where('code', $data['user_information']->country)->first();
                                            ?>
                                        @if($countryflag)
                                            <img src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}" width="30">
                                        @else
                                            <!-- Handle the case where no country flag is found -->
                                            No flag found for this country.
                                        @endif
                                    @else
                                        <!-- Handle the case where user_information->country is not set -->

                                    @endif
                                    </span>
                            </p>

                            <p>Age: <span class="float-end">{{ isset($data['age']) ? $data['age'] : '' }}</span></p>
                        </div>
                        </div>

                        <form method="POST" action="{{ route('getPostsByDate') }}" id="searchPostForm">
                            @csrf
                            <div class="search-post me-5">
                                <input type="hidden" name="time_range" value="">
                                <input type="hidden" name="start_date" value="">
                                <input type="hidden" name="end_date" value="">
                                <h4>Search Post</h4>
                                <p onclick="setSearchTimeRange('last7days')">Last 7 days</p>
                                <p onclick="setSearchTimeRange('last30days')">Last 30 days</p>
                                <p onclick="setSearchTimeRange('last3months')">Last 3 months</p>
                                <p onclick="setSearchTimeRange('last12months')">Last 12 months</p>
                                <p onclick="openCustomCalender()">Custom</p>

                                <div id="calendar" class="custom-calendar search-post" style="padding-bottom: 29px; display: none;">
                                    <div class="d-flex button-box deceased-Person-Top-Btn w-100">
                                        <a href="javascript:void(0);" class="btn w-50 public me-2">Public</a>
                                        <a href="javascript:void(0);" class="btn w-50 private">Private</a>
                                    </div>
                                    <div id="c" style="    z-index: 10;position: relative;">
                                        <div class="btns w-100 pb-0">
                                            <input type="date" id="start_date" style="width: 45%; border: 1px solid grey">
                                            <i style="margin: 0 10px; font-size: 22px;">-</i>
                                            <input type="date"  id="end_date" style="width: 45%; border: 1px solid grey">
                                        </div>
                                        <!-- Your custom calendar logic goes here -->
                                        <!-- ... -->

                                        <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                                            <a href="javascript:void(0);" class="btn w-50 private" onclick="cancelCustomDate()">Cancel</a>
                                            <a href="javascript:void(0);" class="btn w-50 public" onclick="searchWithCustomDate()">Search</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <script>
                            function openCustomCalender() {
                                document.getElementById("calendar").style.display = "block";
                            }

                            function searchWithCustomDate() {
                                const startDate = document.getElementById("start_date").value;
                                const endDate = document.getElementById("end_date").value;
                                document.querySelector('input[name="time_range"]').value = 'custom';
                                document.querySelector('input[name="start_date"]').value = startDate;
                                document.querySelector('input[name="end_date"]').value = endDate;
                                // Submit the form to update the posts based on the selected custom dates
                                document.querySelector('#searchPostForm').submit();
                            }

                            function setSearchTimeRange(timeRange) {
                                document.querySelector('input[name="time_range"]').value = timeRange;
                                document.querySelector('input[name="start_date"]').value = '';
                                document.querySelector('input[name="end_date"]').value = '';
                                // Submit the form to update the posts based on the selected time range
                                document.querySelector('#searchPostForm').submit();
                            }

                            function cancelCustomDate() {
                                const calendar = document.getElementById("calendar");
                                calendar.style.display = "none";
                                document.querySelector('input[name="start_date"]').value = '';
                                document.querySelector('input[name="end_date"]').value = '';
                            }
                        </script>


   {{--  <form method="POST" action="{{ route('getPostsByDate') }}" id="searchPostForm">@csrf
    <div class="search-post me-5">
        <input type="hidden" name="time_range" value="">
        <input type="hidden" name="start_date" value="">
        <input type="hidden" name="end_date" value="">
        <h4>Search Post</h4>
        <p onclick="setSearchTimeRange('last7days')">Last 7 days</p>
        <p onclick="setSearchTimeRange('last30days')">Last 30 days</p>
        <p onclick="setSearchTimeRange('last3months')">Last 3 months</p>
        <p onclick="setSearchTimeRange('last12months')">Last 12 months</p>
        <p onclick="CustomCalender()">Custom</p>


        <div id="calendar" class="cusotmCalender search-post" style="padding-bottom: 29px;">
            <div class="d-flex button-box deceased-Person-Top-Btn w-100">
                <a href="" class="btn w-50 public me-2">Public</a>
                <a href="" class="btn w-50 private">Private</a>
            </div>
            <div id="c">
                <div class="btns w-100 pb-0">
                    <i id="custout1" class="text-center w-50">MM/DD/YY</i>
                    <i style="margin: 0 10px; font-size: 22px;">-</i>
                    <i id="custout2" class="text-center w-50">MM/DD/YY</i>
                </div>
                <div id="custdisp">

                    <div id="custprev" class="nav"><img
                            src="{{ asset('storage/assets') }}/images/clprev.png" alt="">
                    </div>
                    <div id="custmonth"><span id="currentDate">Date</span>
                    </div>
                    <div id="custnext" class="nav"><img
                            src="{{ asset('storage/assets') }}/images/Clnext.png" alt="">
                    </div>
                </div>
                <div id="custcal"></div>

                <div class="d-flex my-3 mb-0 button-box deceased-Person-Top-Btn w-100">
                    <a href="javascript:void(0);" class="btn w-50 private" onclick="cancelCustomDate()">Cancel</a>
                    <a href="javascript:void(0);" class="btn w-50 public" onclick="searchWithCustomDate()">Search</a>
                </div>
            </div>
        </div>

    </div>
</form>
<script>
    function setSearchTimeRange(timeRange) {
        document.querySelector('input[name="time_range"]').value = timeRange;
        document.querySelector('input[name="start_date"]').value = '';
        document.querySelector('input[name="end_date"]').value = '';
        // Submit the form to update the posts based on the selected time range
        document.querySelector('#searchPostForm').submit();
    }

    function CustomCalender() {
        const calendar = document.getElementById("calendar");
        calendar.style.display = "block";
        // ... Add your custom calendar logic here ...
    }

    function cancelCustomDate() {
        const calendar = document.getElementById("calendar");
        calendar.style.display = "none";
        document.querySelector('input[name="start_date"]').value = '';
        document.querySelector('input[name="end_date"]').value = '';
    }

    function searchWithCustomDate() {
        const startDate = document.getElementById("custout1").innerText;
        const endDate = document.getElementById("custout2").innerText;
        document.querySelector('input[name="time_range"]').value = 'custom';
        document.querySelector('input[name="start_date"]').value = startDate;
        document.querySelector('input[name="end_date"]').value = endDate;
        // Submit the form to update the posts based on the selected custom dates
        document.querySelector('#searchPostForm').submit();
    }
</script> --}}

</div>
