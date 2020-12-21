<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles=Article::orderBy('created_at','DESC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'image'=>'image|max:2048'
      ]);
      $article=new Article;
      $article->title=$request->title;
      $article->category_id=$request->category;
      $article->content=$request->content;
      $article->semicontent=$request->semicontent;
      $article->status=$request->status;
      $article->slug=Str::slug($request->title);
      $article->tags=$request->tags;
      $article->created_at=now();
      $article->updated_at=now();
        if($request->hasFile('image')){
              $date=now();
              $imageName=Str::slug($request->title).'-'.$date->year.'.'.$date->month.'.'.$date->day.'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->image->getClientOriginalExtension();
              $request->image->move(public_path('uploads'),$imageName);
      $article->image=asset('uploads/').'/'.$imageName; // resmin linkini kaydetme
            }        //Resim Upload Tamamlandı
      $article->save();
      toastr()->success('Yazı Başarıyla Eklendi!','Başarılı!');
      return redirect()->route('admin.yazilar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.yazilar.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);

        $categories=Category::all();

        return view('back.articles.edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'image'=>'image|max:2048'
      ]);
      $article=Article::findOrFail($id);
      $article->title=$request->title;
      $article->category_id=$request->category;
      $article->content=$request->content;
      $article->semicontent=$request->semicontent;
      $article->status=$request->status;
      $article->slug=Str::slug($request->title);
      $article->tags=$request->tags;
      $article->updated_at=now();
        if($request->hasFile('image')){
              $date=now();
              $imageName=Str::slug($request->title).'-'.$date->year.'.'.$date->month.'.'.$date->day.'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->image->getClientOriginalExtension();
              $request->image->move(public_path('uploads'),$imageName);
      $article->image=asset('uploads/').'/'.$imageName; // resmin linkini kaydetme
            }        //Resim Upload Tamamlandı
      $article->save();
      toastr()->success('Yazı Başarıyla Güncellendi!','Başarılı!');
      return redirect()->route('admin.yazilar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      Article::find($id)->delete();
      toastr()->success('Yazı Geri Dönüşüm Kutusuna Taşındı!','Başarılı');
      return redirect()->route('admin.yazilar.index');
    }
    public function trashed(){
      $articles=Article::onlyTrashed()->orderBy('deleted_at','DESC')->get();
      return view('back.articles.trashed',compact('articles'));
    }
    public function recover($id){
      Article::onlyTrashed()->find($id)->restore();
      toastr()->success('Yazı Geri Dönüştürüldü.','Başarılı!');
      return redirect()->route('admin.yazilar.geridonusum');

    }
   public function hardDelete($id)
   {
     $article=Article::onlyTrashed()->find($id);
     /*
     if(File::exists($article->image)){
       File::delete(public_path($article->image));
     }*/
     //Yazının Resmini Depolamadan Silme Kodu !
     $article->forceDelete();
     toastr()->success('Yazı Başarıyla Silindi!','Başarılı');
     return redirect()->route('admin.yazilar.index');
   }
    public function destroy($id)
    {
        //
    }
    public function onOff($id){
      $article=Article::findOrFail($id);
      if($article->status==0){
        $article->status=1;
        $article->updated_at=now();
        $article->save();
          toastr()->success($article->title.' Yazısı Başarıyla Aktif Edildi!','Aktif!');
          return redirect()->back();
      }
      elseif($article->status==1){
        $article->status=0;
        $article->updated_at=now();
        $article->save();
          toastr()->success($article->title.' Yazısı Başarıyla Kapatıldı!','Kapalı!');
          return redirect()->back();
      }
      else{
        toastr()->error('Yazı Bulunamadı!');
        return redirect()->back();
      }
    }
    public function quickDraft(Request $request){
      $article=new Article;
      $article->title       = $request->title;
      $article->category_id = $request->category;
      $article->content     = $request->content;
      $article->image       = '#';
      $article->status      = 0;
      $article->slug        = Str::slug($request->title);
      $article->created_at  = now();
      $article->updated_at  = now();
      $article->save();
      toastr()->success('Taslak Başarıyla Oluşturuldu!');
      return redirect()->route('admin.dashboard');
    }
}
