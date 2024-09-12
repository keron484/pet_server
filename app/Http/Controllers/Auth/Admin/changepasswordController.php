<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class changepasswordController extends Controller
{
    //
    public function change_admin_password(Request $request){
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $authenticated_admin = auth()->guard('admin')->user();

        
        if (!$this->checkCurrentPassword($authenticated_admin, $request->current_password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Current password is incorrect.'],
            ]);
        }

        

        if ($this->updatePassword($authenticated_admin, $request->new_password)) {
            return response()->json(['message' => 'Password changed successfully.'], 200);
        }
    }

    protected function checkCurrentPassword($authenticated_admin, string $currentPassword): bool
    {
        return Hash::check($currentPassword, $authenticated_admin->password);
    }

    protected function updatePassword($authenticated_admin, string $newPassword): bool
    {

        $authenticated_admin->password = Hash::make($newPassword);
        return $authenticated_admin->save(); 
    }
}
