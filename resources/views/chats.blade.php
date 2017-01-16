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

    <div class="col-md-4 col-md-offset-4">
      <h1 id="greeting">Hello, <span id="username">{{$username}}</span></h1>

      <div class="col-md-12" id="chat-window">
        <div class="col-md-12" id="typingStatus" style="padding:15px;"></div>
        <input type="text" id="text" name="" value="" class="form-control" autofocus="" onblur="notTyping()">
      </div>

    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/chat.js')}}"></script>
  </body>
</html>
