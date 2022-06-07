<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $avatar = $request->file('avatar')->store('avatars');

        $request->user()->update([
            'avatar' => $avatar
        ]);

        return redirect()->back();
    }
}
