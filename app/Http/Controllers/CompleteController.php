<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CompleteController extends Controller
{
    public function getIndex()
    {
        $openTasks = \App\Task::where('user_id','=',\Auth::id())->where('complete','=','0')->orderBy('created_at','ASC')->get();
        $completeTasks = \App\Task::where('user_id','=',\Auth::id())->where('complete','=','1')->orderBy('created_at','ASC')->get();

        return view('complete.index')->with('openTasks',$openTasks)->with('completeTasks',$completeTasks);
    }
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'paragraphs'=>'required|numeric|min:1'
        ]);

        $data = $request->all();

        $gen = new Generator;

        $textLoremIpsum = $gen->getParagraphs($data['paragraphs']);

        if(!$textLoremIpsum) {
            dd("Error generating LoremIpsum text");
        }

         return view('complete.postindex')->with(['textLoremIpsum'=>$textLoremIpsum]);
    }
}
