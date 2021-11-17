<div>
    @foreach ($messages as $message )
    @if($message["get"])
    <div class="msg msg-recipient">
        <div class="bubble m-l-50">
            <div class="bubble-wrapper">
                <span>{{$message['message']}}</span>
                <small class="float-right" style="font-size: 10px">{{$message["date"]}}</small>
            </div>
            </div>
        </div>
    </div>
    @else
    <div class="msg msg-sent">
        <div class="bubble">
            <div class="bubble-wrapper">
                <span>{{$message['message']}}</span>
                <small class="float-right" style="font-size: 10px">{{$message["date"]}}</small>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('633b876a313ef8910447', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
          //alert(JSON.stringify(data));
          window.livewire.emit('getMessage', data)
        });
    </script>
</div>

