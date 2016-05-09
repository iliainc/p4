<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeleteTaskController extends Controller
{
    public function getIndex($id = null) {
        $task = \App\Task::find($id);
        return view('deletetask.index')->with('task', $task);
    }

    public function getDeleteTask($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            return redirect('/dashboard');
        }
        if($task->categories()) {
            $task->categories()->detach();
        }
        $task->delete();
        # Done
        return redirect('/success');
    }
}
