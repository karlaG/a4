<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags() {
      return $this->belongsToMany('App\Tag')->withTimestamps();
  }
}
