<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Request;

class ArticleController extends Controller
{
    public function index($artId) {
        
        return view('home.article')
            ->with('menu' , Cache::get('topMenu'));
    }
}
