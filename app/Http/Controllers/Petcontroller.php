<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Petcategory;
class Petcontroller extends Controller
{
    public function getAllPets(Request $request){
        $pets = Pet::with('category')->get();
        return response()->json(['pets' => $pets], 200);
     }   
  
     public function deletepet(Request $request, $id){
         $pet = Pet::find($id);
         if(!$pet){
            return response()->json(['message' => 'Pet has not been found'], 404);
         }
         $pet->delete();
  
         return response()->json(['message' => 'Pet was deleted succesfuly'], 200);
     }
  
     public function createPet(Request $request){
        $request->validate([
          'name' => 'required|string',
          'species' => 'required|string',
          'breed' => 'required|string',
          'age' => 'required',
          'weight' => 'required',
          'sex' => 'required',
          'price' => "required",
          'petcategory_id' => 'required|string',
          'description' => 'required',
          'pet_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'adoption_status' => 'required|string'
        ]);
  
        $pet = new Pet();
  
        if ($request->hasFile('pet_image')) {
            // Handle the product image upload
            $image = $request->file('pet_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('petimages'), $imageName);
            
            // Update the product image path
            $pet->pet_image = 'petimages/' . $imageName;
        }
        $pet->name = $request->name;
        $pet->species = $request->species;
        $pet->breed = $request->breed;
        $pet->age = $request->age;
        $pet->weight = $request->weight;
        $pet->sex = $request->sex;
        $pet->description = $request->description;
        $pet->petcategory_id = $request->petcategory_id;
        $pet->adoption_status = $request->adoption_status;
        $pet->price = $request->price;
        $pet->pet_image = $imageName;
  
      $pet->save();
  
      return response()->json(['message' => 'Pet created successfully '], 200);
     }

     public function updatePet(Request $request, $id){
                  // Find the product
                  $pet = Pet::find($id);
     
                  if (!$pet) {
                      return response()->json(['message' => 'Pet not found'], 404);
                  }
              
                  // Update the product details
                    $petData = $request->all();
                    $petData = array_filter($petData);
                    $pet->fill($petData);
                  
                  // Check if a product image was uploaded
              if ($request->hasFile('pet_image')) {
                  // Handle the product image upload
                  $image = $request->file('pet_image');
                  $imageName = time().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('petimages'), $imageName);
                  
                  // Update the product image path
                  $pet->pet_image = 'petimages/' . $imageName;
              }
              
                  $pet->save();
              
                  return response()->json(['message' => 'Pet updated successfully'], 200);
     }

     public function search(Request $request){
         $searchQuery = $request->input('search');
         if (!empty($searchQuery)) {
             $products = Pet::where('name', 'LIKE', "%$searchQuery%")
                 ->orWhere('description', 'LIKE', "%$searchQuery%")
                 ->orWhere('breed', 'LIKE', "%$searchQuery%")
                 ->orWhere('species', 'LIKE', "%$searchQuery%")
                 ->orWhere('sex', 'LIKE', "%$searchQuery%")
                 ->get();
         } else {
             $products = Pet::all();
         }
     
         return response()->json($products);
     }
     public function getallwithcategories(Request $request)
     {
   
     // Get all categories
     $categories = Petcategory::all();
 
     // Initialize product array
     $petList = [];
 
     // Loop over the product categories
     foreach ($categories as $category) {
         // Get the pets associated with the category
         $pets = $category->pet()->get();
 
         // Map each product to an array containing its ID, name, image, price, and description
         $pets = $pets->map(function ($pet) {
             return [
                 'id' => $pet->id,
                 'name' => $pet->name,
                 'pet_image' => $pet->pet_image,
                 'price' => $pet->price,
                 'species' => $pet->species,
                 'breed' => $pet->breed,
                 'age' => $pet->age,
                 'weight' => $pet->weight,
                 'sex' => $pet->sex,
                 'adoption_status' => $pet->adoption_status,
                 'description' => $pet->description,
             ];
         })->all();
 
         // Add the category and pets to the product list array
         $petList[] = [
             'name' => $category->name,
             'pets' => $pets,
         ];
     
         return response()->json($petList);
     }
 
}

public function getallpetswithcategory(Request $request){
    $pets_category = Pet::with('category')->get();
    return response()->json(['pets_category' => $pets_category], 200);
}


}