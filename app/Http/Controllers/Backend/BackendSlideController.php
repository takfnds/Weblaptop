<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendSlideController extends Controller
{
    protected $folder = 'backend.slide.';

    public function index()
    {
        $slides   = Slide::orderByDesc('id')->get();
        $viewData = [
            'slides' => $slides
        ];
        return view($this->folder . 'index', $viewData);
    }


    public function store(Request $request)
    {
        $data               = $request->except('_token', 's_banner');
        $data['created_at'] = Carbon::now();
        if ($request->s_banner) {
            $image = upload_image('s_banner');
            if (isset($image['code'])) {
                $data['s_banner'] = $image['name'];
            }
        }
        $slide = Slide::create($data);
        $this->clearCache('SLIDE_HOME');
        return redirect()->back();
    }

    public function edit($id)
    {
        $slide    = Slide::find($id);
        $slides   = Slide::orderByDesc('id')->get();
        $viewData = [
            'slide'  => $slide,
            'slides' => $slides
        ];

        return view($this->folder . 'update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $data               = $request->except('_token', 's_banner');
        $data['updated_at'] = Carbon::now();
        if ($request->s_banner) {
            $image = upload_image('s_banner');
            if (isset($image['code'])) {
                $data['s_banner'] = $image['name'];
            }
        }
        Slide::find($id)->update($data);
        $this->clearCache('SLIDE_HOME');
        return redirect()->back();
    }

    public function delete($id)
    {
        \DB::table('slides')->where('id', $id)->delete();
        $this->clearCache('SLIDE_HOME');
        return redirect()->route('get_backend.slide.index');
    }
}
