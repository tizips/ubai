<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index() {
        $title = '资源管理';
        return view('admin.file' , compact('title'));
    }
}
