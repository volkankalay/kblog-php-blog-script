<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Admin;
use App\Models\Login;
use App\Models\Comment;


class Dashboard extends Controller
{
  //Global Değişken Tanımlama... Çok aradım seni :(
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    public function index(){
      $articles     =   Article::all()->count();  //yazı sayısı
      $article      =   Article::all()->count();  //yazı sayısı?
      $hit          =   Article::sum('hit');      //toplam hit
      $categories   =   Category::all();          //kategoriler
      $category     =   Category::all()->count(); //kategori sayısı
      $contacts     =   Contact::whereOkundu(0)->orderBy('id','desc')->limit(3)->get(); //son 3 iletişim mesajı
      $contact      =   Contact::whereOkundu(0)->count();  //tüm iletişim mesajları
      $commentCount =   Comment::all()->count();    //yorum sayısı
      $commentZero  =   Comment::whereStatus(0)->count();    // izin bekleyen yorum sayısı
      return view('back.dashboard',compact(
        'article','articles','categories','category','hit','contact','contacts','commentCount','commentZero'
      ));
    }

    public function profile(){
      $admin = Admin::first();
      $logins = Login::orderBy('id','desc')->limit(100)->get();
      return view('back.profile',compact('admin','logins'));
    }
}
