<?php

use Illuminate\Database\Seeder;

class CategoryTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         # Creating an array of all the tasks we want to associate categories with
         # The *key* will be the task, and the *value* will be an array of categories.
         $tasks =[
             'Create YouTube video' => [1,2],
             'Update Readme' => [1],
             'Submit project link' => [2,3]
         ];

         # Now loop through the above array, creating a new pivot for each task
         foreach($tasks as $task => $categories) {

             # First get the task
             $task = \App\Task::where('task','like',$task)->first();

             # Now loop through each category for this task, adding the pivot
             foreach($categories as $categoryId) {
                 $category = \App\Category::where('id','LIKE',$categoryId)->first();

                 # Connect this category to this task
                 $task->categories()->save($category);
             }

         }

     }
}
