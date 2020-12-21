<?php

namespace App\Http\Controllers\Front;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use App\Models\Comment;
use Str;
class Homepage extends Controller
{
  //Global Değişken Tanımlama... Çok aradım seni :(
    public function __construct(){
      view()->share([
        'config'=>Config::first(),
        'pages'=>Page::orderBy('order','asc')->get(),
        'categories'=>Category::orderBy('id', 'asc')->whereStatus(1)->get(),
        'mostviews'=>Article::orderBy('hit', 'desc')->where('status',1)->limit(5)->get(),
      ]);
    }

    public function index()
    {
        $data['articles']=Article::orderBy('id', 'desc')->where('status',1)->paginate(10);

        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category=Category::whereSlug($category)->first() ?? abort(403, 'Kategori Bulunamadı.');
        $article=Article::where('slug', $slug)->whereCategoryId($category->id)->where('status',1)->first() ?? abort(403, 'Yazı Bulunamadı.');
        $article->increment('hit');
        $comments=Comment::where('article_id',$article->id)->whereStatus(1)->paginate(50);
        return view('front.single', compact('article','comments'));
    }

    public function category($slug){
      $category=Category::whereSlug($slug)->whereStatus(1)->first() ?? abort(403, 'Kategori Bulunamadı.');
      $data['category']=$category;
      $data['articles']=Article::whereCategoryId($category->id)->where('status',1)->orderBy('id','desc')->paginate(10);
      return view('front.category',$data);
    }
    public function page($slug){
      $page=Page::whereSlug($slug)->first() ?? abort(403, 'Sayfa Bulunamadı.');
      $data['page']=$page;
      return view('front.pages',$data);
    }
    public function contact(){
      return view('front.contact');
    }
    public function contactPost(Request $request){

      $validateData= Validator::make($request->all(), [
        'adsoyad'=>'required',
        'email'=>'required',
        'konu'=>'required',
        'mesaj'=>'required'
      ]);

      if($validateData->fails()){
        return redirect() ->route('contact')
                          ->withErrors($validateData)
                          ->withInput();
      }

      $contact = new Contact;
      $contact->name=$request->adsoyad;
      $contact->email=$request->email;
      $contact->topic=$request->konu;
      $contact->message=$request->mesaj;
      $contact->save();
      return redirect()->route('contact')->with('success','Mesajınız iletildi. Teşekkür Ederiz.');
    }
    public function tagSearch(Request $req){
      $tag=$req->tag;
      $c = Str::of($tag)->trim();             // boşlukları silip değer atama.
      if(Str::length($c)==0)
      {
        return redirect()->route('Homepage'); // değer yoksa anasayfaya yönlendir.
      }
      $articles=Article::orderBy('created_at','DESC')
                        ->whereStatus(1)->where('tags', 'like', '%'.$tag.'%')
                        ->paginate(10);
      return view('front.tags',compact('articles','tag'));
    }
    public function search(Request $req){
      $tag=$req->tag;
      $c = Str::of($tag)->trim();             // boşlukları silip değer atama.
      if(Str::length($c)==0)
      {
        return redirect()->route('Homepage'); // değer yoksa anasayfaya yönlendir.
      }
      $articles=Article::orderBy('created_at','DESC')
                        ->whereStatus(1)->where('title', 'like', '%'.$c.'%')
                        ->orWhere('tags', 'like', '%'.$c.'%')
                        ->paginate(10);
      return view('front.search',compact('articles','tag'));
    }

    public function likeComment(Request $request){
        $comment = Comment::findOrFail($request->id);
        $comment->like+=1;
        $comment->save();
        return $comment;
    }
    public function dislikeComment(Request $request){
      $comment = Comment::findOrFail($request->id);
      $comment->dislike+=1;
      $comment->save();
      return $comment;
    }
    public function addComment(Request $request){
      $comment = new Comment;
      $comment->article_id            =   $request->article;
      $comment->ifConnectedToComment  =   $request->replyto;
      $comment->name                  =   $request->adsoyad;
      $comment->email                 =   $request->email;
      $comment->comment               =   $request->mesaj;
      $comment->created_at            =   now();
      $comment->updated_at            =   now();
      $comment->save();
      return redirect()->back()->with('success','Yorumunuz iletildi. Onay verildiğinde yayınlanacaktır.');
    }

}
