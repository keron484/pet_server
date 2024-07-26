<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Adoptioncontroller;
use App\Http\Controllers\Auth\Admin\createadmincontroller;
use App\Http\Controllers\Auth\Admin\loginadmincontroller;
use App\Http\Controllers\Auth\Admin\logoutadmincontroller;
use App\Http\Controllers\Auth\User\loginuserController;
use App\Http\Controllers\Auth\User\logoutusercontroller;
use App\Http\Controllers\Auth\User\registerUsercontroller;
use App\Http\Controllers\messageController;
use App\Http\Controllers\sendemailController;
use App\Http\Controllers\packageController;
use App\Http\Controllers\Petcategorycontroller;
use App\Http\Controllers\Petcontroller;
use App\Http\Controllers\userController;
use App\Models\Petcategory;
use Illuminate\Support\Facades\Route;


//authentication routes
Route::post('/create-admin', [createadmincontroller::class, 'createadmin']);
Route::post('/login-admin', [loginadmincontroller::class, 'loginadmin']);
Route::post('/logout-admin', [logoutadmincontroller::class, 'logoutAdmin']);
Route::middleware('auth:sanctum')->get('/admin', [adminController::class, 'getauthAdmin']);

Route::post('/login-user', [loginuserController::class, 'loginuser']);
Route::post('/logout-user', [logoutusercontroller::class, 'logoutuser']);
Route::post('/create-user', [registerUsercontroller::class, 'createadmin']);
Route::middleware('auth:sanctum')->get('/user', [userController::class, 'getAtuthuser']);

Route::group([], function(){
    Route::get('/users', [userController::class, 'getallusers']);
    Route::delete('/delete-user/{id}', [userController::class, 'deleteuser']);
    Route::put('/update-user-profile/{id}', [userController::class, 'updateusers']);
    Route::put('/update-admin-avatar/{id}', [userController::class, 'updateprofilepicture']);
});

Route::group([], function(){
    Route::get('/admins', [adminController::class, 'getalladmins']);
    Route::delete('/delete-admin/{id}', [adminController::class, 'deleteadmin']);
    Route::put('/update-admin-profile/{id}', [adminController::class, 'updateadmin']);
    Route::put('/update-admin-avatar/{id}', [adminController::class, 'updateprofilepicture']);
});


Route::group([], function(){
    Route::post('/send-email', [sendemailController::class, 'sendEmail']);
    Route::get('/getallmails', [sendemailController::class, 'getAllmails']);
    Route::delete('/delete-email/{id}', [sendemailController::class, 'deleteEmail']);
});

Route::group([], function(){
   Route::post('/create-pet', [Petcontroller::class, 'createPet']);
   Route::get('/pets', [Petcontroller::class, 'getAllPets']);
   Route::get('/getallpetscategories', [Petcontroller::class, 'getallwithcategories']);
   Route::put('/update-pet/{id}', [Petcontroller::class, 'updatePet']);
   Route::get('/pets-categories', [Petcontroller::class, 'getallpetswithcategory']);
   Route::get('/search-pet', [Petcontroller::class, 'search']);
   Route::delete('/delete-pet/{id}', [Petcontroller::class, 'deletepet']);
});

Route::group([], function(){
   Route::post('/create-category', [Petcategorycontroller::class, 'createpetcategory']);
   Route::get('/get-petcategory', [Petcategorycontroller::class, 'getallcategories']);
   Route::put('/update-petcategory/{id}', [Petcategorycontroller::class, 'updateCategory']);
   Route::delete('/delete-petcategory/{id}', [Petcategorycontroller::class, 'deleletcategory']);
});


Route::group([], function(){
     Route::get('/getall-messages', [messageController::class, 'getallMessages']);
     Route::delete('/delete-message/{id}', [messageController::class, 'deleteMessage']);
     Route::post('/send-message', [messageController::class, 'sendMessage']);
});