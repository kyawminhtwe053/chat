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
  </body>
</html>
