<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ConfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $config  = Config::first();
      return view('back.config.index',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        'background'=>'max:2048',
        'favicon'=>'max:512',
        'title'=>'required',
        'status'=>'required',
      ]);
      $config=Config::first();
      $config->title    = $request->title;
      $config->active   = $request->status;
      $config->telefon  = $request->telefon;
      $config->adres    = $request->adres;
      $config->facebook = $request->facebook;
      $config->twitter  = $request->twitter;
      $config->instagram = $request->instagram;
      $config->github   = $request->github;
      $config->linkedin = $request->linkedin;
      $config->youtube  = $request->youtube;
      $config->whatsapp = $request->whatsapp;
      $config->other    = $request->other;
      $config->updated_at=now();
      $date=now();
        if($request->hasFile('background')){
         $background=Str::slug($request->title).'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->background->getClientOriginalExtension();
         $request->background->move(public_path('uploads/background'),$background);
         $config->background=asset('uploads/background/').'/'.$background; // resmin linkini kaydetme
         }
       //Logo Upload Tamamlandı

       if($request->hasFile('favicon')){
         $favicon=Str::slug($request->title).'-'.$date->hour.'.'.$date->minute.'.'.$date->second.'.'.$request->favicon->getClientOriginalExtension();
         $request->favicon->move(public_path('uploads/favicon'),$favicon);
         $config->favicon = asset('uploads/favicon/').'/'.$favicon; // resmin linkini kaydetme
       }  //Favicon Upload Tamamlandı
      $config->save();
      toastr()->success('Sayfa Ayarları Başarıyla Güncellendi!');
      return redirect()->route('admin.ayarlar.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
