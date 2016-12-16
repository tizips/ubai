<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Request;

class LinkController extends Controller
{
    public function index() {
        return view('home.link')
            ->with('menu' , Cache::get('topMenu'))
            ->with('link' , Cache::get('link'));
    }
}
