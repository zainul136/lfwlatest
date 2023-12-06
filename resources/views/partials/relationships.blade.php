<!-- partials/relationships.blade.php -->
{{$relationships}}
@php exit;  @endphp
@if($relationships) 
    <ul>
        @foreach($relationships as $relationship)
            <li>
                {{ $relationship}}
                @if($relationship->family->relationships) 
                    @include('partials.relationships', ['relationships' => $relationship->family->relationships])
                @endif
                @if($relationship->family->children)
                    @include('partials.children', ['children' => $relationship->family->children])
                @endif
            </li>
        @endforeach
    </ul>
@endif
