<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatMessage;
use App\Chat;

class ChatController extends Controller
{
  public function sendMessage($text,$username)
  {
    // $username = $request->username;
    // $text = $request->text;

    $chatMessage = new ChatMessage();
    $chatMessage->sender_username = $username;
    $chatMessage->message = $text;
    $chatMessage->save();
  }

  public function isTyping($username)
  {
    // $username = $request->username;

    $chat = Chat::find(1);

    if($chat->user1 == $username)
      $chat->user1_is_typing = true;
    else
      $chat->user2_is_typing = true;

    $chat->save();
  }

  public function notTyping($username)
  {
    // $username = $request->username;

    $chat = Chat::find(1);

    if($chat->user1 == $username)
      $chat->user1_is_typing = false;
    else
      $chat->user2_is_typing = false;

    $chat->save();
  }

  public function retrieveChatMessages($username)
  {
    // $username = $request->username;
    $message = ChatMessage::where('sender_username','!=',$username)->where('read','=',false)->first();

    if(count($message) > 0)
    {
      $message->read = true;
      $message->save();

      return $message->message;
    }
  }

  public function retrieveTypingStatus($username)
  {
    // $username = $request->username;

    $chat = Chat::find(1);
    if($chat->user1 == $username)
    {
      if($chat->user2_is_typing)
        return $chat->user2;
    }
    else{
      if($chat->user1_is_typing)
        return $chat->user1;
    }
  }

}
