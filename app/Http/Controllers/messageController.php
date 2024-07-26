<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Package;
class messageController extends Controller
{
    public function sendMessage(Request $request){
        $request->validate([
          'username' => 'string|required',
          'email' => 'email|required',
          'message' => 'required' 
        ]);

        $message = new Message();
        $message->email =  $request->email;
        $message->username = $request->username;
        $message->message = $request->message;
  
        $message->save();

        return response()->json(['message' => 'Message sent succesfully we will get back to you shortly'], 200);
        
      }

    public function getallMessages(Request $request){
        $messages = Message::all();
        return response()->json(['messages' => $messages], 200);
    }

    public function deleteMessage(Request $request, $id){
         $message = Message::find($id);
         if(!$message){
            return response()->json(['message' => 'message not found'], 404);
         }
         $message->delete();
         return response()->json(['message' => 'message deleted succesfully'], 200);
    }
}
