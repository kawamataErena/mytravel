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
}

