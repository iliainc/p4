<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AddTaskController extends Controller
{

    public function getAddTask() {

        $categories_for_checkboxes = \App\Category::getCategoriesForCheckboxes();
        return view('addtask.index')->with([
            'categories_for_checkboxes' => $categories_for_checkboxes,
        ]);
    }


    public function postAddTask(Request $request) {
        $messages = [
            'not_in' => 'You have to make a selection.',
        ];

          $this->validate($request,[
              'task' => 'required|min:3',
          ],$messages);
          # Mass Assignment
          $data = $request->only('task','complete');
          $data['user_id'] = \Auth::id();

          $task = \App\Task::create($data);
          # Save Tags
          $categories = ($request->categories) ?: [];
          $task->categories()->sync($categories);
          $task->save();
          return redirect('/success');
    }

}
