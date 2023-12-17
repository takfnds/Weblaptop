<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendProfileController extends Controller
{
    public function index()
    {
    	return view('backend.profile.index');
    }
}
