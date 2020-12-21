<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Comment;

class CommentController extends Controller
{
      public function __construct(){
        view()->share([
          'config'=>Config::first()
        ]);
      }
      public function index(){
        $comments     =   Comment::all();
        $commentCount =   Comment::all()->count();    //yorum sayısı
        return view('back.comment.index',compact('comments','commentCount'));
      }
}
