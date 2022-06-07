<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        if($request->user()->avatar){
            Storage::delete($request->user()->avatar);
        }
        $avatar = $request->file('avatar')->store('avatars');

        $request->user()->update([
            'avatar' => $avatar
        ]);

        return redirect()->back();
    }
}
