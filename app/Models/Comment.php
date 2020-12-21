<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getReply($comment_id){
      $reply = Comment::whereId($comment_id)->first();
      return $reply;
    }
    function replyCount(){
      return $this->hasMany('App\Models\Comment','ifConnectedToComment','id')->where('status',1)->count();
    }
    use HasFactory;
}
