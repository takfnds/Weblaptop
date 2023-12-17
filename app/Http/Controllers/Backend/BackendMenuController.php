<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendMenuRequest;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendMenuController extends Controller
{
    protected $folder = 'backend.menu.';

    public function index()
    {
        $menus    = Menu::orderByDesc('id')->get();
        $viewData = [
            'menus' => $menus
        ];
        return view($this->folder . 'index', $viewData);
    }


    public function store(BackendMenuRequest $request)
    {
        $data               = $request->except('_token');
        $data['mn_slug']     = Str::slug($request->mn_name);
        $data['created_at'] = Carbon::now();
        $menu               = Menu::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $menus    = Menu::orderByDesc('id')->get();
        $menu     = Menu::find($id);

        $viewData = [
            'menus' => $menus,
            'menu'  => $menu
        ];

        return view($this->folder . 'update', $viewData);
    }

    public function update(BackendMenuRequest $request, $id)
    {
        $data               = $request->except('_token');
        $data['mn_slug']     = Str::slug($request->mn_name);
        $data['updated_at'] = Carbon::now();
        Menu::find($id)->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        \DB::table('menus')->where('id', $id)->delete();
        return redirect()->route('get_backend.menu.index');
    }
}
