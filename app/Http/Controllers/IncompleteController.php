<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class IncompleteController extends Controller
{
    public function getIndex()
    {
        return view('incomplete.index');
    }
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'users'=>'required|numeric|min:1'
        ]);

        $data = $request->all();

      return view('incomplete.postindex')->with(['data'=>$data]);
    }
}
