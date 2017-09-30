<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
/**
 * @param Request $request
 */
    public function paginate(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $users = User::when($request->keyword, function ($query) use ($request) {
            $query->where('email', 'like', "%{$request->keyword}%") // search by email
                ->orWhere('name', 'like', "%{$request->keyword}%"); // or by name
        })->paginate($request->limit ? $request->limit : 20);

        $users->appends($request->only('keyword'));

        return view('users.paginate', compact('users'));
    }
}
