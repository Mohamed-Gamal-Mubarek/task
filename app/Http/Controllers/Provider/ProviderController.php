<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $locations = Location::where('provider_id',Auth()->user()->id)->get();
        return view('providers\provider\index',compact('locations'));
    }
}
