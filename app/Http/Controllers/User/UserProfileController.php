<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->except(['_token']));
        return redirect()->back();
    }
}
