
<!-- Message threads -->
@forelse( $threadsLastMessages as $threadLastMessage )

    @if($threadLastMessage)

        <ul class="notification-list chat-message">
            <li>
                <div class="author-thumb">
                    <img src="img/avatar8-sm.jpg" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{ $threadLastMessage->user->name[0] }}</a>
                    <span class="chat-message-item">{{ $threadLastMessage->message }}</span>
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                                                <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                            </span>

                <div class="more">
                    <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                </div>
            </li>
        </ul>
    @endif

@empty

    <div>
        <p class="alert alert-warning">Opps! No Threads.</p>
    </div>

@endforelse
				
<!-- ... end Message threads -->