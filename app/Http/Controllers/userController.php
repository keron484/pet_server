<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    //function to get all users
    public function getallusers(Request $request){
        $users = User::all();
        

        return response()->json(['users' => $users], 200);
    }

    public function updateusers(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'user not found'], 404);
        }
        
        $user->fill($request->all());
        $user->save();

        return response()->json(['message' => 'user updated succesfully'], 200);
    }

    public function deleteuser(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'user not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'user deleted succesfuly'], 200);
    }

    public function updateprofilepicture(Request $request, $id){
        $user = User::find($id);
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

    public function getAtuthuser(Request $request){
            $userData = auth()->user();
            return response()->json(['auth_user' => $userData], 200);
    }



    
}
