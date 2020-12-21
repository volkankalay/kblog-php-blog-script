<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use UA;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    public function login(){
      return view('back.auth.login');
    }
    public function loginPost(Request $request){
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        toastr()->success('Başarıyla Giriş Yapıldı.','Hoşgeldiniz '.Auth::user()->name.'!');

        $result = UA::parse($request->server('HTTP_USER_AGENT'));
        $login = new Login;
        $login->ip_address = $_SERVER["REMOTE_ADDR"];
        $login->user_agent = $result->toString();
        $login->giris   = now();
        $login->save();//Giriş Kaydı
        return redirect()->route('admin.dashboard');
      }
      return redirect()->route('admin.login')->withErrors('E-Mail Adresi veya Şifre Hatalı!');
    }

    public function logout(){
      Auth::logout();
      toastr()->info('Başarıyla Çıkış Yapıldı.','Çıkış');
      return redirect()->route('admin.login');
    }

    public function changeName(Request $req){
        $admin        =   Admin::findOrFail($req->id);
        $admin->name  =   $req->name;
        $admin->save();
        toastr()->success('Hoşgeldiniz '.$admin->name);
        return redirect()->route('admin.profile');
    }

    public function changeMail(Request $req){
        $data = $req->validate([
          'mail'=>'email|unique:admins,email|confirmed'
        ]);
        $admin        =   Admin::findOrFail($req->id);
        $admin->email  =   $req->mail;
        $admin->save();
        toastr()->success('E-Posta Kaydedilmiştir.');
        return redirect()->route('admin.profile');
    }

    public function changePass(Request $req){
        $data = $req->validate([
          'pass'=>'confirmed'
        ]);
        $admin        =   Admin::findOrFail(Auth::user()->id);
        if(Hash::check($req['oldpass'],$admin->password)){
          $admin->password  = Hash::make($req->pass);
          $admin->save();
          toastr()->success('Şifre Başarıyla Kaydedilmiştir.');
          return redirect()->route('admin.profile');
        }
        else{
          toastr()->error('Şifre Doğru Değil!');
          return redirect()->route('admin.profile');
        }
    }
}
