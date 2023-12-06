<div class="col-sm-3">
    <div class="tag ms-3">
        <h4>Search Tags</h4>
        <div>
            <input type="text" class="form-control mt-4 me-2" id="tagSearchx" placeholder="Search tags">
        </div>
        <div class="tagsrow">
            @foreach ($data['tags'] as $tag)
                <div class="tagx-item">
                    <a style="text-decoration: none;"
                        href="{{ url("tag/$tag->slug") }}"><button>{{ $tag->name }}</button></a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="family ms-3">
        <h4>Family Members</h4>
        <input id="searchInput" placeholder="Search" class="form-control" />
        <div class="SidefamilyMembers" id="defaultFamilyMembers">
            {{-- Relatives Start --}}
            @if ($relative['relationships']->isEmpty())
                <p>No relatives found.</p>
            @else
                @foreach ($relative['relationships'] as $relative)
                        <?php
                        $deceaseduser = \App\Models\DeathConfirmation::query()
                            ->where('user_id', $relative->relative->id)
                            ->where('confirmation_status', 1)
                            ->where('is_alive', 0)
                            ->get();
                        ?>

                    <div class="d-flex justify-content-between mb-4 family-member" style="display: block;">
                        <div class="d-flex" style="position: relative">
                            <div class="postProfileIcon">

                                @if ($relative->relative->userInformation->profile_picture && file_exists(public_path('user_media/' . $relative->relative->userInformation->user_id . '/profile_picture/' . $relative->relative->userInformation->profile_picture)))
                                    <img src="{{ asset('user_media/' . $relative->relative->userInformation->user_id . '/profile_picture/' . $relative->relative->userInformation->profile_picture) }}" />
                                @else
                                    <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                @endif


                            </div>

                            @if (!$deceaseduser->isEmpty()) {{-- Check if the profile is deceased --}}
                            <a href="{{ route('deceasedProfile', $relative->relative->id) }}" style="text-decoration: none;">
                                <p>{{ $relative->relative->first_name }} {{ $relative->relative->last_name }}</p>
                                <span class="mt-3">{{ $relative->relationship->type }}</span>
                            </a>
                            @else
                                <p>{{ $relative->relative->first_name }} {{ $relative->relative->last_name }}</p>
                                <span class="mt-3">{{ $relative->relationship->type }}</span>
                            @endif
                        </div>
                        <div style="position: relative" class="second" style="width: 25%;">
                            @if(isset($relative->relative->userInformation->country))
                                    <?php
                                    $countryflag = \App\Models\Country::query()->where('code', $relative->relative->userInformation->country)->first();
                                    ?>
                                @if($countryflag)
                                    <img src="{{ asset('storage/assets/'.$countryflag->flag_filepath) }}" width="30">
                                @else
                                    <!-- Handle the case where no country flag is found -->

                                @endif
                            @else
                                <!-- Handle the case where user_information->country is not set -->

                            @endif
{{--                            @if(isset($relative->relative->userInformation->city))--}}
{{--                                @if (!is_null($relative->relative->userInformation->city))--}}
{{--                                    <span>{{ $relative->relative->userInformation->city }}</span>--}}
{{--                                @endif--}}
{{--                            @endif--}}
                            {{-- @if(isset($relative->relative->userInformation->date_of_birth))
                            @if (!is_null($relative->relative->userInformation->date_of_birth))
                                <span>Age:
                                    {{ \Carbon\Carbon::parse($relative->relative->userInformation->date_of_birth)->age }}</span>
                            @endif
                            @endif --}}
                        </div>
                    </div>
                @endforeach
            @endif
            {{-- Relative End --}}
        </div>

        {{-- Duplicate the default family members list --}}
        <div class="SidefamilyMembers" id="filteredFamilyMembers" style="display: none;"></div>

        {{-- No results found message --}}
        <p id="noResultsFound" style="display: none;">No results found.</p>
    </div>

    <script>
        const familyMembers = document.querySelectorAll(".family-member");
        const filteredFamilyMembers = document.getElementById("filteredFamilyMembers");
        const noResultsFoundMessage = document.getElementById("noResultsFound");
        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("input", filterFamilyMembers);

        function filterFamilyMembers() {
            const query = searchInput.value.trim().toLowerCase();

            // Variable to track if any relatives are visible after filtering
            let anyRelativeVisible = false;

            // Clear the duplicate list on every search
            filteredFamilyMembers.innerHTML = '';

            // Loop through the family members and show/hide them based on the search input
            familyMembers.forEach(member => {
                const name = member.querySelector("p").textContent.toLowerCase();
                if (name.includes(query)) {
                    member.style.display = "block"; // Show the family member if the search query matches
                    anyRelativeVisible = true;

                    // Add the matching family members to the duplicate list
                    const duplicateMember = member.cloneNode(true);
                    filteredFamilyMembers.appendChild(duplicateMember);
                } else {
                    member.style.display = "none"; // Hide the family member if the search query doesn't match
                }
            });

            // Display "No results found" message if no relatives are visible after filtering
            if (!anyRelativeVisible && query !== "") {
                noResultsFoundMessage.style.display = "block";
            } else {
                noResultsFoundMessage.style.display = "none";
            }

            // Show the duplicate list and hide the default list if the search query is not empty
            if (query !== "") {
                document.getElementById("defaultFamilyMembers").style.display = "none";
                filteredFamilyMembers.style.display = "block";
            } else {
                document.getElementById("defaultFamilyMembers").style.display = "block";
                filteredFamilyMembers.style.display = "none";
            }
        }
    </script>

    {{-- <div class="family ms-3">
        <h4>Family Members</h4>
        <input placeholder="search" class="form-control" />
        <div class="SidefamilyMembers">
            @if ($relative['relationships']->isEmpty())
                <p>No relatives found.</p>
            @else
                @foreach ($relative['relationships'] as $relative)
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex" style="position: relative">
                            <div class="postProfileIcon">
                                @if (isset($relative->relative->userInformation))
                                    <img
                                        src="{{ asset('public/user_media/' . $relative->relative->userInformation->id . '/profile_picture/' . $relative->relative->userInformation->profile_picture) }}" />
                                @else
                                    <img src="{{ asset('storage/assets/images/profile.jpeg') }}" />
                                @endif
                            </div>

                            <p>{{ $relative->relative->first_name }} {{ $relative->relative->last_name }}</p>

                            @if (!is_null($relative->relative->userInformation->date_of_birth))
                                <span>Age:
                                    {{ \Carbon\Carbon::parse($relative->relative->userInformation->date_of_birth)->age }}</span>
                            @endif
                        </div>
                        <div style="position: relative" class="second">
                            <img src="{{ asset('storage/assets') }}/images/BG.png" class="img-fluid" />
                            <span>{{ $relative->relationship->type }}</span>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div> --}}
</div>
