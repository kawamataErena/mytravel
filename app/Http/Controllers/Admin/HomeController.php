<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shiori;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Shiori::all()->sortByDesc('updated_at');

        if (count($posts) > 0){
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('shiori.index',['headline' => $headline,'posts' => $posts]);
    }
}
