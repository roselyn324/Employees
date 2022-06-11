<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password(Request $request, User $user)
    {
// dd($request->id);
// $userFound = User::where("id","=",$request->id)->first();

// dd($userFound);



        $request->validate([
            'password' => ['required', 'string', 'confirmed'],
        ]);


        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message', 'User Password Updated Successfully');
    }
}
