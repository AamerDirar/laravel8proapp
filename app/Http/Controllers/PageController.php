<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::paginate(5);
        if($request->ajax()){
            $view = view('data', compact('pages'))->render();
            return response()->json(['html' => $view]);
        }
        return view('page', compact('pages'));
    }
}
