<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    //
    public function add()
    {
        return view('admin.memo.create');
    }
}
