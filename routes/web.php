<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Back Routes Admin Panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('isLogged')->group(function(){
Route::get('/','App\Http\Controllers\Back\AuthController@login')->name('login');
Route::post('/','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
  Route::get('/panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
  Route::get('/profil','App\Http\Controllers\Back\Dashboard@profile')->name('profile');
  Route::post('/profil/adguncelle','App\Http\Controllers\Back\AuthController@changeName')->name('change.name');
  Route::post('/profil/mailguncelle','App\Http\Controllers\Back\AuthController@changeMail')->name('change.mail');
  Route::post('/profil/parolaguncelle','App\Http\Controllers\Back\AuthController@changePass')->name('change.pass');
  // Yazılar Route Başlangıç  ----
  Route::get('yazilar/geri-donusum-kutusu','App\Http\Controllers\Back\ArticleController@trashed')->name('yazilar.geridonusum');
  Route::resource('yazilar','App\Http\Controllers\Back\ArticleController');
  Route::get('yazilar/{id}/onoff','App\Http\Controllers\Back\ArticleController@onOff')->name('onOff.article');
  Route::get('yazilar/{id}/sil','App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
  Route::get('yazilar/{id}/tamamen-sil','App\Http\Controllers\Back\ArticleController@hardDelete')->name('hardDelete.article');
  Route::get('yazilar/{id}/kurtar','App\Http\Controllers\Back\ArticleController@recover')->name('recover.article');
  Route::post('yazilar/hizlitaslak','App\Http\Controllers\Back\ArticleController@quickDraft')->name('article.quick');
  // Yazılar Route Sonu       ----
  Route::get('/yorumlar','App\Http\Controllers\Back\CommentController@index')->name('comment.index');

  // Kategoriler Route        ----
  Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
  Route::post('/kategoriler/durum/{id}','App\Http\Controllers\Back\CategoryController@status')->name('category.status');
  Route::post('/kategoriler/olustur','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
  Route::post('/kategoriler/guncelle','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
  Route::get('/kategoriler/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getData');
  Route::post('/kategoriler/sil','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
  //Bilgi Sayfaları
  Route::get('/sayfalar','App\Http\Controllers\Back\PageController@index')->name('page.index');
  Route::get('/sayfalar/olustur','App\Http\Controllers\Back\PageController@create')->name('page.create');
  Route::post('/sayfalar/olustur','App\Http\Controllers\Back\PageController@createPost')->name('page.store');
  Route::post('/sayfalar/sil','App\Http\Controllers\Back\PageController@delete')->name('delete.page');
  Route::get('/sayfalar/{id}/duzenle','App\Http\Controllers\Back\PageController@edit')->name('page.edit');
  Route::post('/sayfalar/update','App\Http\Controllers\Back\PageController@update')->name('page.update');
  //İletişim Sayfası
  Route::get('/iletisim','App\Http\Controllers\Back\ContactController@index')->name('contact.index');
  Route::get('/iletisim/{id}/read','App\Http\Controllers\Back\ContactController@read')->name('contact.read');
  Route::get('/iletisim/tamamlananlar','App\Http\Controllers\Back\ContactController@readedbox')->name('contact.readedbox');
  Route::get('/iletisim/temizle','App\Http\Controllers\Back\ContactController@deleteall')->name('contact.deleteall');
  //Ayarlar
  Route::resource('ayarlar', App\Http\Controllers\Back\ConfController::class);
  //çıkış
  Route::get('/cikis','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});
/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('Homepage');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactPost')->name('contact.post');
Route::get('/sayfalar/{page}','App\Http\Controllers\Front\Homepage@page')->name('page');
Route::get('/{slug}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/etiket/arama/{tag}','App\Http\Controllers\Front\Homepage@tagSearch')->name('tag');
Route::post('/kelime/arama/{tag}','App\Http\Controllers\Front\Homepage@search')->name('search');
Route::post('/comment/action/add','App\Http\Controllers\Front\Homepage@addComment')->name('comments.add');
Route::get('/comment/action/like','App\Http\Controllers\Front\Homepage@likeComment')->name('comments.like');
Route::get('/comment/action/dislike','App\Http\Controllers\Front\Homepage@dislikeComment')->name('comments.dislike');
