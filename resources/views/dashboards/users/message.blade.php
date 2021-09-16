

<div class="messages-wrapper">
                <ul class="messages">
                    @foreach($messages as $message)
                    <li class="messages clearfix">
                        <div class="{{($message->from == Auth::id()) ? 'sent' : 'received' }}">
                            <p>{{ $message->messages}}</p>
                            <p class="date">{{date('d M y, h:i a',strtotime($message->created_at)) }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
<div class="input-text">
    <input type="text" name="message" class="submit">
</div>
