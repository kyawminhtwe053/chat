<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/chat.css')}}" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="chat_window">
      <div class="top_menu">
        <div class="buttons">
          <div class="button close"></div>
          <div class="button minimize"></div>
          <div class="button maximize"></div>
        </div>
        <div class="title">Hello, <span id="username">{{$username}}</span></div>
      </div>
      <ul class="messages" id="messages"></ul>
      <div class="bottom_wrapper clearfix">
        <small id="typingStatus"></small>
        <div class="message_input_wrapper">
          <input type="text" class="message_input" placeholder="Type your message here..." id="text" autofocus="" onblur="notTyping()">
        </div>
        <div class="send_message">
          <div class="icon"></div>
          <div class="text">Send</div>
        </div></div>
      </div>
      <div class="message_template">
        <li class="message">
          <div class="avatar"></div>
          <div class="text_wrapper">
            <div class="text"></div>
          </div>
        </li>
      </div>

      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/chat.js')}}"></script>
      <script type="text/javascript">
      (function () {
        var Message;
        Message = function (arg) {
            this.text = arg.text, this.message_side = arg.message_side;
            this.draw = function (_this) {
                return function () {
                    var $message;
                    $message = $($('.message_template').clone().html());
                    $message.addClass(_this.message_side).find('.text').html(_this.text);
                    $('.messages').append($message);
                    return setTimeout(function () {
                        return $message.addClass('appeared');
                    }, 0);
                };
            }(this);
            return this;
        };
        $(function () {
            var getMessageText, message_side, sendMessage;
            message_side = 'right';
            getMessageText = function () {
                var $message_input;
                $message_input = $('.message_input');
                return $message_input.val();
            };
            sendMessage = function (text) {
                var $messages, message;
                if (text.trim() === '') {
                    return;
                }
                $('.message_input').val('');
                $messages = $('.messages');
                message_side = message_side === 'left' ? 'right' : 'left';
                message = new Message({
                    text: text,
                    message_side: message_side
                });
                message.draw();
                return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
            };
            $('.send_message').click(function (e) {
                return sendMessage(getMessageText());
            });
            $('.message_input').keyup(function (e) {
                if (e.which === 13) {
                    return sendMessage(getMessageText());
                }
            });
            sendMessage('Hello Philip! :)');
            setTimeout(function () {
                return sendMessage('Hi Sandy! How are you?');
            }, 1000);
            return setTimeout(function () {
                return sendMessage('I\'m fine, thank you!');
            }, 2000);
        });
      }.call(this));
      </script>
  </body>
</html>