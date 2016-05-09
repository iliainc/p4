<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public static function getCategoriesForCheckboxes() {
        $categories = \App\Category::orderBy('category','ASC')->get();
        $categories_for_checkboxes = [];
        foreach($categories as $category) {
            $categories_for_checkboxes[$category['id']] = $category['name'];
        }
        return $categories_for_checkboxes;
    }
}
