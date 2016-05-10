<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditTaskController extends Controller
{
    public function getEditTask($id) {
        $task = \App\Task::with('categories')->find($id);
        if(is_null($task)) {
            return redirect('/dashboard');
        }
        $categories_for_checkboxes = \App\Category::getCategoriesForCheckboxes();
        $categories_for_this_task = $task->getCategoriesForThisTask();
        return view('edittask.index')->with('task',$task)->with('categories_for_checkboxes',$categories_for_checkboxes)->with('categories_for_this_task',$categories_for_this_task);
    }

    public function postEditTask(Request $request) {
        $messages = [
            'not_in' => 'You have to choose a selection.',
        ];
        $this->validate($request,[
            'task' => 'required|min:3|string'
        ],$messages);
        $this->validate($request,[
            'categories' => 'required'
        ],$messages);
        $task = \App\Task::find($request->id);
        $task->task = $request->task;
        $task->complete = $request->complete;
        if($request->categories) {
            $categories = $request->categories;
        }
        else {
            $categories = [];
        }
        $task->categories()->sync($categories);
        $task->save();
        return redirect('/edit/'.$request->id);
    }
}
