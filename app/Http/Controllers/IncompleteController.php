<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class IncompleteController extends Controller
{
    public function getIndex()
    {
        $openTasks = \App\Task::where('user_id','=',\Auth::id())->where('complete','=','0')->orderBy('created_at','ASC')->get();
        $completeTasks = \App\Task::where('user_id','=',\Auth::id())->where('complete','=','1')->orderBy('created_at','ASC')->get();

        return view('incomplete.index')->with('openTasks',$openTasks)->with('completeTasks',$completeTasks);
        
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
