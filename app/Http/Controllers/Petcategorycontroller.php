<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petcategory;
class Petcategorycontroller extends Controller
{
    public function createpetcategory(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
       
        $petcategory = new Petcategory();

        $petcategory->name = $request->name;

        $petcategory->save();

        return response()->json(['message' => 'Pet category created succesfully'], 200);
    }

    public function updateCategory(Request $request, $id){
        $category = Petcategory::find($id);
 
        if(!$category){
            return response()->json(['message' => 'category not found'], 404);
        }
        $categoryData = $request->all();
        $categoryData = array_filter($categoryData);
        $category->fill($categoryData);

        $category->save();

        return response()->json(['message' => 'category updated successfully'], 200);
    }


    public function deleletcategory(Request $request, $id){
        $petcategory = Petcategory::find($id);
        if(!$petcategory){
            return response()->json(['message' => 'Opps category not found'], 404);
        }

        $petcategory->delete();

        return response()->json(['message' => 'Product deleted succesfully'], 200);
    }

    public function getallcategories(Request $request){
        $petcategory = Petcategory::all();
        return response()->json(['petcategories' => $petcategory], 200);
    }
}
