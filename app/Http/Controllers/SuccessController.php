<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SuccessController extends Controller
{
    public function getIndex()
    {
        return view('success.index');
    }
    public function getAddIndex()
    {
        return view('success.successadd');
    }
}
