<?php

use Illuminate\Database\Seeder;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         # Creating an array of all the tasks we want to associate users with
         # The *key* will be the task, and the *value* will be an array of users.
         $tasks =[
             'Create YouTube Video' => [1,2],
             'Update Readme' => [1],
             'Submit project link' => [2]
         ];

         # Now loop through the above array, creating a new pivot for each book to tag
         foreach($tasks as $task => $users) {

             # First get the book
             $task = \App\Task::where('task','like',$task)->first();

             # Now loop through each tag for this book, adding the pivot
             foreach($users as $userId) {
                 $user = \App\User::where('id','LIKE',$userId)->first();

                 # Connect this tag to this book
                 $task->users()->save($user);
             }

         }
     }
}
