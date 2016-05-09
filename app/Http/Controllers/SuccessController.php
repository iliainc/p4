<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SuccessController extends Controller
{
    public function getIndex()
    {
        return view('success.index');
    }
}
