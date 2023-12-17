<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BackendUserController extends Controller
{
    protected $folder = 'backend.user.';
    public function index()
    {
        $users = User::orderByDesc('id')
            ->get();

        $viewData = [
            'users' => $users
        ];

    	return view($this->folder.'index', $viewData);
    }

    public function create()
    {
    	return view($this->folder.'create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
    	return view($this->folder.'update');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
