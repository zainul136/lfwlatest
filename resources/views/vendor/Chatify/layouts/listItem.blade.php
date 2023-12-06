{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item" data-contact="{{ Auth::user()->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="saved-messages avatar">
                    <img src="{{ isset(Auth::user()->userInformation->profile_picture) ? asset('user_media/' . Auth::user()->id . '/profile_picture/' . Auth::user()->userInformation->profile_picture) : asset('storage/assets/images/profile.jpeg') }}" class="girl postProfileIcon" />
                </div>
            </td>
            {{-- Center side --}}
            <td>
                <p data-id="{{ Auth::user()->id }}" data-type="user">Saved Messages <span>You</span></p>

                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
    <?php
        $currentUserId = \Illuminate\Support\Facades\Auth::id();
        $friendUserIds = \App\Models\UserRelationship::query()->where('user_id','=',$currentUserId)->pluck('relative_id');

        $friendUserData = \App\Models\User::query()
            ->whereIn('id', $friendUserIds)->with('userInformation')
            ->get();

        ?>
    @foreach($friendUserData as $friendUser)
    <table class="messenger-list-item" data-contact="{{ $friendUser->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="saved-messages avatar">
                    <img src="{{ isset($friendUser->user_information->profile_picture) ? asset('user_media/' . $friendUser->id . '/profile_picture/' . $friendUser->userInformation->profile_picture) : asset('storage/assets/images/profile.jpeg') }}" class="girl postProfileIcon" />
                </div>
            </td>
            {{-- Center side --}}
            <td>
                <p data-id="{{ $friendUser->id }}" data-type="user">{{$friendUser->first_name ??''}} {{$friendUser->last_name ?? ''}} <span>new Message</span></p>

                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
    @endforeach

@endif

{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && !!$lastMessage)
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->userInformation->profile_picture)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m"
        style="background-image: url('{{ asset('user_media/' . $user->id . '/profile_picture/' . $user->userInformation->profile_picture) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name }}
            <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span></p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {!!
                $lastMessageBody
            !!}
            @else
            <span class="fas fa-file"></span> Attachment
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td>
        <div class="avatar av-m"
        style="background-image: url('{{ asset('user_media/' . $user->id . '/profile_picture/' . $user->userInformation->profile_picture) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
            <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name }} {{ strlen($user->last_name) > 12 ? trim(substr($user->last_name,0,12)).'..' : $user->last_name }}
        </td>

    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


