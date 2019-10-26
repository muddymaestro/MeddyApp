
<!-- Chat Field -->
						
<div class="chat-field">

    @if($messages)

        <h6 class="title">{{ $message_to->name }}</h6>

        @foreach($messages as $message)
            <div class="ui-block-title">
                <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
            </div>
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list chat-message chat-message-field">
                    @if($message->user_id != auth()->id())
                        <li>
                            <div class="author-thumb" class="receiver">
                                <img src="img/avatar10-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <p class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></p>
                                <p class="chat-message-item" class="receiver">{{ $message->message }}</p>
                            </div>
                        </li>
                    @else
                        <li>
                            <div class="author-thumb">
                                <img src="img/author-page.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <p class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:30pm</time></p>
                                <p class="chat-message-item">{{ $message->message }}
                                </p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        @endforeach

    @endif

    <form action="{{ route('message.create', $message_to->id) }}" method="post">
        @csrf

        <div class="form-group label-floating is-empty">
            <label class="control-label">Write your message here...</label>
            <textarea class="form-control" placeholder=""  name="message"></textarea>
        </div>

        <button class="btn btn-primary btn-sm" id="newMessage">Post</button> 

    </form>

</div>
        
        <!-- ... end Chat Field -->