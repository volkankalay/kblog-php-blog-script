<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
  use SoftDeletes;

  function getCategory(){
    return $this->hasOne('App\Models\Category','id','category_id');
  }
  function commentCount(){
    return $this->hasMany('App\Models\Comment','article_id','id')->where('status',1)->count();
      }
}
