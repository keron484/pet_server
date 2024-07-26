<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Mail\Messagemail;
use Illuminate\Support\Facades\Mail;

class sendemailController extends Controller
{
  
  //function to send email
  public function sendEmail(Request $request){
      $request->validate([
        "title" => 'required|string',
        'email' => 'required|email',
        'name' => 'required|string',
        "text" => 'required'
      ]);

     $email = new Email();
     $email->email = $request->email;
     $email->title = $request->title;
     $email->text = $request->text;
     $email->name = $request->name;

    // $user_email = $request->input('email');
     //$title = $request->input('title');
     //$text = $request->input('text');
     //$name = $request->input('name');

    //Mail::to($user_email)->send( new Messagemail( $title, $text, $name));

     $email->save();

     return response()->json(['message' => 'Email sent succesfully'], 200);
  }
   
  //method to get the emails sent by a particular user
  public function getmymails(Request $request){
      
  }

  //function to get all mails
  public function getAllmails(Request $request){
      $email = Email::all();
    
      return response()->json(['emails' => $email], 200);
  }
  
  //function to delete email
  public function deleteEmail(Request $request, $id){
      $email = Email::find($id);
      if(!$email){
        return response()->json(['message' => 'email not found'], 400);
      }
      $email->delete();
      return response()->json(['message' => 'email deleted succesfully'], 200);
  }
}
