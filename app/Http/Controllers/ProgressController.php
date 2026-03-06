<?php

namespace App\Http\Controllers;

use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        return Progress::orderBy('code')->get();
    }
}
