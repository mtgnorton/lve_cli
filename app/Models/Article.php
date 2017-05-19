<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'slug', 'summary', 'publish_at'];

    public function admin()
    {
      return $this->belongsTo('App\Models\Admin','user_id','id');
    }
}
