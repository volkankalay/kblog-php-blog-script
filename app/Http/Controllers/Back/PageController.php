<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Str;
use App\Models\Config;
class PageController extends Controller
{
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    public function index(){
      $pages=Page::orderBy('order','ASC')->get();
      return view('back.pages.index',compact('pages'));
    }
    public function create(){
    return view('back.pages.create');
  }
  public function createPost(Request $request){
    $request->validate([
      'image'=>'image|max:2048'
    ]);
    $enBuyuk= Page::orderBy('order','DESC')->first();

    $page=new Page;
    $page->title      =   $request->title;
    $page->content    =   $request->content;
    $page->slug       =   Str::slug($request->title);
    $page->order      =   ($enBuyuk->order + 1);
    $page->created_at =   now();
    $page->updated_at =   now();
      if($request->hasFile('image')){
            $date=now();
            $imageName=Str::slug($request->title).'-'.$date->year.'.'.$date->month.'.'.$date->day.'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
    $page->image  = asset('uploads/').'/'.$imageName; // resmin linkini kaydetme
          }        //Resim Upload Tamamlandı
    $page->save();
    toastr()->success('Sayfa Başarıyla Eklendi!','Başarılı!');
    return redirect()->route('admin.page.index');
  }

  public function delete(Request $request){
    $page = Page::findOrFail($request->id);
    $page->delete();
    toastr()->success('Sayfa Başarıyla Silindi!');
    return redirect()->route('admin.page.index');
  }

  public function edit($id){
    $page = Page::findOrFail($id);
    return view('back.pages.edit',compact('page'));
  }



  public function update(Request $request){
  //  dd($request);
    $request->validate([
      'image'=>'image|max:2048'
    ]);
    $page= Page::findOrFail($request->id);
    $page->title      =   $request->title;
    $page->content    =   $request->content;
    $page->slug       =   Str::slug($request->title);
      if($request->hasFile('image')){
            $date=now();
            $imageName=Str::slug($request->title).'-'.$date->year.'.'.$date->month.'.'.$date->day.'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
    $page->image  = asset('uploads/').'/'.$imageName; // resmin linkini kaydetme
          }        //Resim Upload Tamamlandı

    $page->order      =   $request->order;
    $page->updated_at =   now();
    $page->save();
    toastr()->success('Sayfa Başarıyla Düzenlendi!','Başarılı!');
    return redirect()->route('admin.page.index');
  }
}
