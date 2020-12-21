<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct(){
      view()->share([
        'config'=>Config::first()
      ]);
    }
    public function index(){
      $contacts = Contact::whereOkundu(0)->get();
      return view('back.contact.index',compact('contacts'));
    }

    public function read($id){
      $contact = Contact::findOrFail($id);
      ($contact->okundu==0) ? ($contact->okundu=1) : ($contact->okundu=0);  //Okunmuş ise okunmadı; okunmamış ise okundu olur.
      $contact->updated_at=now();
      $contact->save();
      toastr()->success('İşlem Tamamlandı!');
      return redirect()->back();
    }

    public function readedbox(){
      $contacts = Contact::whereOkundu(1)->get();
      return view('back.contact.readed',compact('contacts'));
    }

    public function deleteall(){
      $contacts = Contact::whereOkundu(1)->get();
        foreach ($contacts as $contact) {
          $contact->delete();
        }
      toastr()->success('Okunmuş talepler silindi!');
      return redirect()->route('admin.contact.index');
    }
}
