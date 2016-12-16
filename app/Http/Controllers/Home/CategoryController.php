<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index() {

        $num = Request::input('page' , 1);

        return view('home.category')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , Cache::tags(['index' , $num])->get('ArtList'));
    }
}
