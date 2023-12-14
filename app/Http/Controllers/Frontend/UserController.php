<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.user.profile');
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'username' => ['required','string'],
            'phone' => ['required','digits:10'],
            'pincode' => ['required','digits:6'],
            'address' => ['required','string','max:499'],
        ]);

        $user = User::findOrfail(Auth::user()->id);
        $user->update([
            'name' => $request->username
        ]);

        $user->userDetail()->updateOrcreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'pincode' => $request->pincode,
                'address' => $request->address,
            ]
        );
        return redirect()->back()->with('message','User Profile Updated');
    }

    public function passwordCreate()
    {
        return view('frontend.user.change-password');
    }

    public function ChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required','string','min:8','confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);

        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated successfully');
        }else{
            return redirect()->back()->with('message','Current Password does not match with old password');
        }
    }
}
