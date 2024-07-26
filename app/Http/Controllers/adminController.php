<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class adminController extends Controller
{
   public function getalladmins(Request $request){
         $admin = Admin::all();

         return response()->json(['admin_user' => $admin ], 200);
   }

   public function updateadmin(Request $request, $id){
       $admin = Admin::find($id);
       if(!$admin){
        return response()->json(['message' => 'admin not found'], 404);
       }

       $adminData = $request->all();
       $adminData = array_filter($adminData);
       $admin->fill($adminData);

       $admin->save();

       return response()->json(['admin updated succesfully'], 200);
   }

   public function deleteadmin(Request $request, $id){
      $admin = Admin::find($id);
      if(!$admin){
        return response()->json(['message' => 'admin not found'], 404);
      }

      $admin->delete();

      return response()->json(['message' => 'admin deleted succesfully'], 200);
   }
  
   public function updateprofilepicture(Request $request, $id){
      $user = Admin::find($id);
      if(!$user){
          return response()->json(['message' => 'user not found'], 404);
      }

      if ($request->hasFile('profile_picture')) {
          $profilePicture = $request->file('profile_picture');
          
          $fileName = time().'.'.$profilePicture->getClientOriginalExtension();
          $profilePicture->storeAs('public/profile_pictures', $fileName);
  
          $user->profile_picture = $fileName;
      }
  
      $user->save();
  
      return response()->json(['message' => 'profile picture added succesfully'], 200);
      
  }

   public function getauthAdmin(Request $request){
    $adminData = auth()->guard('admin')->user();
    return response()->json(['admin_user' => $adminData], 200);
   }
}
