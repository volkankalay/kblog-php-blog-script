<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Config;
class CategoryController extends Controller
{
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    public function index(){
      $categories=Category::all();
      return view('back.categories.index',compact('categories'));
    }
    public function status(Request $request){
      $category=Category::findOrFail($request->ackapa);
      if($category->status==0){
        $category->status=1;
        $category->updated_at=now();
        $category->save();
          toastr()->success('Aktif!',$category->name.' Kategorisi Başarıyla Aktif Edildi!');
          return redirect()->back();
      }
      elseif($category->status==1){
        $category->status=0;
        $category->updated_at=now();
        $category->save();
          toastr()->success('Kapalı!',$category->name.' Kategorisi Başarıyla Kapatıldı!');
          return redirect()->back();
      }
      else{
        toastr()->error('Kategori Bulunamadı!');
        return redirect()->back();
      }
    }

    public function getData(Request $request){
      $category=Category::findOrFail($request->id);
      return response()->json($category);
    }

    public function create(Request $request){
        $isExist=Category::whereSlug(Str::slug($request->name))->first();
        if($isExist){
          toastr()->error($request->name.' adında bir kategori mevcut!','Kategori oluşturulamadı!');
          return redirect()->back();
        }
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();
        toastr()->success('Başarılı!',$category->name.' Kategorisi Başarıyla Oluşturuldu!');
        return redirect()->back();
    }

    public function update(Request $request){
      $isSlug=Category::whereSlug(Str::slug($request->slug))->whereNotIn('id', [$request->id])->first();
      $isName=Category::whereName($request->name)->whereNotIn('id', [$request->id])->first();
        if($isSlug or $isName){
          toastr()->error($request->name.' adına veya '.$request->slug.' URL\'ine sahip bir kategori mevcut!');
          return redirect()->back();
        }
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->updated_at = now();
        $category->save();
        toastr()->success('Başarılı!',$category->name.' Kategorisi Başarıyla Güncellendi!');
        return redirect()->back();
    }

    public function delete(Request $request){
      if(Category::count()==1){
        toastr()->error('Sistem üzerinde en az bir adet kategori bulunmalıdır!');
        return redirect()->back();
      }//kategori sayısı 1 ise silme. son kategori silinemez!
      /*    $category -> silinecek kategori
            $cat      -> default kategori   */
      $category = Category::findOrFail($request->id);             //silinecek kategoriyi bul   !
      $cat    =  Category::orderBy('id','asc')->first();          //default kategoriyi seç     !
      if($cat->id==$category->id){
        $cat  =  Category::orderBy('id','asc')->skip(1)->first(); //default kategori silinecekse, default kategoriyi değiştir !
        }
          //yazı varsa uygulanacak kısım:
          if($category->articleCountWithDisabled()>0){
            $articles = Article::where('category_id',$category->id)->get();
            foreach($articles as $article){
              $article->category_id=$cat->id;
              $article->save();
            }
          }
          $category->delete();
          toastr()->success('Kategori Silindi!');
          return redirect()->back();

    }
}
