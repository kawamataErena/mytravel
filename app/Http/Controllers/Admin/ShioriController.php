<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shiori;

use App\Models\History;
use Carbon\Carbon;

class ShioriController extends Controller
{
    //
    public function add()
    {
        return view('admin.shiori.create');
    }

    public function create(Request $request)
    {

        $this->validate($request, shiori::$rules);

        $shiori = new shiori;
        $form = $request->all();

        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $shiori->image_path = basename($path);
        } else {
            $shiori->image_path = null;
        }

        unset($form['_token']);

        unset($form['image']);

        $shiori->fill($form);
        $shiori->save();

        return redirect('admin/shiori/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null){
            $posts = Shiori::where('title',$cond_title)->get(); 
        } else {
            $posts = Shiori::all();
        }
        return view('admin.shiori.index',['posts' => $posts,'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        $shiori = Shiori::find($request->id);
        if (empty($shiori)) {
            abort(404);
        }
        return view('admin.shiori.edit',['shiori_form' => $shiori]);
    }

    public function update(Request $request)
    {

        $this->validate($request, shiori::$rules);

        $shiori = shiori::find($request->id);

        $shiori_form = $request->all();

        if ($request->remove == 'true') {
            $shiori_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $shori_form['image_path'] = basename($path);
        } else{
            $shiori_form['imag_path'] = $shiori->image_path;
        }

        unset($shiori_form['image']);
        unset($shiori_form['remove']);
        unset($shiori_form['_token']);

        $shiori->fill($shiori_form)->save();

        $history = new History();
        $history->shiori_id = $shiori->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/shiori');
    }

    public function delete(Request $request)
    {
        $shiori = Shiori::find($request->id);

        $shiori->delete();

        return redirect('admin/shiori/');
    }
}
