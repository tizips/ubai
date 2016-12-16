<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Request;

class MsgController extends Controller
{
    public function index() {
        
        return view('home.msg')
            ->with('menu' , Cache::get('topMenu'));
    }
}
