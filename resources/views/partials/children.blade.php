<!-- partials/children.blade.php -->
@if($children)
    <ul>
        @foreach($children as $child)
            <li>
                {{ $child->email }}
                @if($child->family->relationships)
                    @include('partials.relationships', ['relationships' => $child->family->relationships])
                @endif
                @if($child->family->children)
                    @include('partials.children', ['children' => $child->family->children])
                @endif
            </li>
        @endforeach
    </ul>
@endif
