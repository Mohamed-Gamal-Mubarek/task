<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderAddRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function store(ProviderAddRequest $request)
    {
        try {
            $validated = $request->validated();
            // $user=new User();
            // $user->admin = intval($request->admin);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request['password']);
            // $user->user_name = $request->user_name;
            // $user->save();
            User::create([
                'role'      => 2,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request['password']),
                'user_name' => $request->user_name,
            ]);
            return redirect()->route('admin.dashboard');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
