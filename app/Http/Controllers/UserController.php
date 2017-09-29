<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
/**
 * @param Request $request
 */
    public function paginate(Request $request)
    {
        $users = User::when($request->keyword, function ($query) use ($request) {
            $query->where('email', 'like', "%{$request->keyword}%")
                ->orWhere('name', 'like', "%{$request->keyword}%");
        })->paginate();

        $users->appends($request->only('keyword'));

        return view('users.paginate', compact('users'));
    }
}
