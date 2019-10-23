
<!-- Chat Field -->
						
<div class="chat-field">

    @if($messages)

        @foreach($messages as $message)
            <div class="ui-block-title">
                <h6 class="title">Elaine Dreyfuss</h6>
                <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
            </div>
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list chat-message chat-message-field">
                    @if($message->user_id != auth()->id())
                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar10-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                                <span class="chat-message-item">Hi James, How are your doing? Please remember that next week we are going to Gotham Bar to celebrate Marina’s Birthday.</span>
                            </div>
                        </li>
                    @else
                        <li>
                            <div class="author-thumb">
                                <img src="img/author-page.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">James Spiegel</a>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:30pm</time></span>
                                <span class="chat-message-item">Hi Elaine! I have a question, do you think that tomorrow we could talk to
                                                        the client to iron out some details before the presentation? I already finished the first screen but
                                                        I need to ask him something before moving on. Anyway, here’s a preview!
                                </span>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        @endforeach

    @endif

    <form action="{{ route('message.create', 1) }}" method="post">
        @csrf

        <div class="form-group label-floating is-empty">
            <label class="control-label">Write your message here...</label>
            <textarea class="form-control" placeholder=""  name="message"></textarea>
        </div>

        <button class="btn btn-primary btn-sm">Post</button>
        </div>

    </form>

</div>
        
        <!-- ... end Chat Field -->