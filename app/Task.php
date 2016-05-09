<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task','complete','user_id'];

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function getCategoriesForThisTask() {
        $categories_for_this_task = [];
        foreach($this->categories as $category) {
            $categories_for_this_task[] = $category->id;
        }
        return $categories_for_this_task;
    }

}
