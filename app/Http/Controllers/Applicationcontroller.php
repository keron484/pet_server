<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Mail\applicationmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Pet;
use App\Models\User;

class Applicationcontroller extends Controller
{
    public function createApplication(Request $request){
         $request->validate([
           'user_id' => 'string|required',
           'pet_id' => 'string|required',
           'email' => 'email|required',
           'fullname' => 'string|required',
           'phone_number' => 'string|required',
           'address' => 'string|required',
           'city' => 'string|required',
           'state' => 'string|required',
           'num_kids' => 'required',
           'num_pets' => 'required',
           'payment_method' => 'string|required',
           'reason' => 'required'
         ]);

         $application = new Application();

        $pet_details =  Pet::find($request->pet_id);

         
         $application->user_id = $request->user_id;
         $application->pet_id = $request->pet_id;
         $application->email = $request->email;
         $application->phone_number = $request->phone_number;
         $application->address = $request->address;
         $application->city = $request->city;
         $application->state = $request->state;
         $application->fullname = $request->fullname;
         $application->num_kids = $request->num_kids;
         $application->num_pets = $request->num_pets;
         $application->payment_method = $request->payment_method;
         $application->reason = $request->reason;
         
        $name = $request->fullname;
        $pet_name = $pet_details->pet_name;
        Mail::to($request->email)->send( new applicationmail($name, $pet_name));

         $application->save();

         return response()->json(['message' => 'Application created succesfully'], 200);


    }


    public function deleteApplication($id){
        $application = Application::find($id);
        if(!$application){
           return response()->json(['message' => 'Application not found'], 404);
        }
        $application->delete();

        return response()->json(['message' => 'Application deleted succesfully'], 200);
    }


    public function getallApplication(Request $request){
        $application = Application::with('pet', 'user')->get();
        return response()->json(['applications' => $application], 200);
    }


    public function getUserApplications($userId)
    {
        $user = User::findOrFail($userId);
        $applications = $user->applications()->with('pet')->get();
        return response()->json(['my_applications' => $applications], 200);
    }

    public function updateapplication(Request $request, $id){
        $application = Application::find($id);
 
        if(!$application){
            return response()->json(['message' => 'Application not found'], 404);
        }
        $applicationData = $request->all();
        $applicationData = array_filter($applicationData);
        $application->fill($applicationData);

        $application->save();

        return response()->json(['message' => 'application updated successfully'], 200);
    }
}
