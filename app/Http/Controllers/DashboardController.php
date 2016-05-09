<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Badcow\LoremIpsum\Generator;

class DashboardController extends Controller
{
    public function getIndex()
    {
        // $tasks = \App\Task::all();
        $tasks = \App\Task::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('dashboard.index')->with('tasks',$tasks);
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

         return view('loremipsum.postindex')->with(['textLoremIpsum'=>$textLoremIpsum]);
    }
}
