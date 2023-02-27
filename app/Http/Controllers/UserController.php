<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user       = collect();
        $usernames  = ['username', 'email', 'phone'];

        // Confirm username
        foreach ($usernames as $username) {
            if ($user = User::where($username, $request->username)->first()) {
                break;
            }
        }

        // Verify password
        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }
    }
}
