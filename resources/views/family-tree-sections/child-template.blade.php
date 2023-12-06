<ul>
    @foreach ($children as $child)
        <li>
            <a href="javascript:void(0);">
                <div class="member-view-box">
                    <div class="member-image">
                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Child">
                        <div class="child-details">
                            <p>{{ $child->first_name }}</p>
                        </div>
                    </div>
                </div>
            </a>
            <div class="addline2 memberAdd" data-child-id="{{ $child->id }}">
                <img src="{{ asset('storage/assets/images') }}/add.png" alt=""
                    type="button" data-bs-toggle="modal" data-bs-target="#childModal">
            </div>
            <!-- Check if this child has nested children -->
            @if ($child->children->count() > 0)
                <!-- Recursively render nested children using the same partial -->
                @include('family-tree-sections.child-template', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
