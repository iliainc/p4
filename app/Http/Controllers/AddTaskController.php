<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AddTaskController extends Controller
{
    public function getIndex()
    {
        return view('addtask.index');
    }
}
