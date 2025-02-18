<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Memo;
class MemoController extends Controller
{
    //
        public function add()
        {
            return view('admin.memo.create');
        }

        public function create(Request $request)
        {
    

            // $this->validate($request, Memo::$rules);

            $memo = new Memo;
            $form = $request->all();

            unset($form['_token']);

            $memo->fill($form);
            $memo->save();

            return redirect('admin/memo/create');
        }

        public function index(Request $request)
        {
            $cond_title = $request->cond_title;
            if ($cond_title != null) {
                $posts = Memo::where('title',$cond_title)->get();
            } else{
                $posts = Memo::all();
            }
            return view('admin.memo.index',['posts' =>$posts,'cond_title'=> $cond_title]);
        }
}

