var username;

$(document).ready(function(){
  username = $('#username').html();
  console.log(username);

  pullData();

  $(document).keyup(function(e){
    if(e.keyCode == 13)
      sendMessage();
    else
      isTyping()
  });
});

function pullData()
{
  retrieveChatMessages();
  retrieveTypingStatus();
  setTimeout(pullData,500);
}

function retrieveChatMessages()
{
  $.get('http://localhost/chat/public/retrieveChatMessages/'+username,function(data){
    if(data.length > 0)
      $('#chat-window').append('<br/><div>'+data+'</div><br/>');
  });
}

function retrieveTypingStatus()
{
  $.get('http://localhost/chat/public/retrieveTypingStatus/'+username,function(username){
    if(username.length > 0)
      $('#typingStatus').html(username+' is typing');
    else
      $('#typingStatus').html('');
  });
}

function sendMessage()
{
  var text = $('#text').val();

  if(text.length > 0)
  {
    $.get('http://localhost/chat/public/sendMessage/'+text+'/'+username,function(){
      $('#chat-window').append('<br/><div style="text-align:right;">'+text+'</div><br/>');
      $('#text').val('');
      notTyping();
    });
  }

}

function isTyping()
{
  $.get('http://localhost/chat/public/isTyping/'+username);
}

function notTyping()
{
  $.get('http://localhost/chat/public/notTyping/'+username);
}
