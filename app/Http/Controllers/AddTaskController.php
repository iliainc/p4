<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AddTaskController extends Controller
{
    // public function getAdd()
    // {
    //     return view('addtask.index');
    // }


    public function getAddTask() {
        // if(!\Auth::check()) {
        //     \Session::flash('message','You have to be logged in to create a new book.');
        //     return redirect('/');
        // }
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
          # Add the book (this was how we did it pre-mass assignment)
          // $book = new \App\Book();
          // $book->title = $request->title;
          // $book->author = $request->author;
          // $book->published = $request->published;
          // $book->cover = $request->cover;
          // $book->purchase_link = $request->purchase_link;
          // $book->save();
          # Mass Assignment
          $data = $request->only('task','complete');
          $data['user_id'] = \Auth::id();
          # One way to add the data
          #$book = new \App\Book($data);
          #$book->save();
          # An alternative way to add the data
          $task = \App\Task::create($data);
          # Save Tags
          $categories = ($request->categories) ?: [];
          $task->categories()->sync($categories);
          $task->save();
          return redirect('/success');
    }

}
