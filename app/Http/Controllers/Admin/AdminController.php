<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $providers)
    {
        $providers = $providers->where('role', '2')->get();
        return view('admins.admin.index', compact('providers'));
    }
}
