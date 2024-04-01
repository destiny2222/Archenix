<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        $slide = Slider::orderBy('id','asc')->get();
        return view('frontend.index', compact('slide'));
    }


    public function about(){
        $sector = Sector::orderBy('id', 'asc')->get();
        return view('frontend.about', compact('sector'));
    }

    public function service(){
        $service = Service::orderBy('id', 'asc')->get();
        return view('frontend.service', compact('service'));
    }

    public function portfolio(){
        $portfolio = Portfolio::orderBy('id', 'asc')->get();
        return view('frontend.portfolio', compact('portfolio'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function StoreContact(Request $request){
        $request->validate([
            'name' => ['required','string'],
            'email' => ['required','string'],
            'subject' => ['required','string'],
            'message'=>['required','string'],
            'phone'=>['required','string'],
        ]);

        $sendmail = Contact::create($request->all());
        $mail = getSocial()->email ?? '';
        if($sendmail->save()){
            Mail::to($mail)->send(new SendMail($sendmail));
            Alert::success('success','Your message has been sent successfully');
            return back();
        }else{
            Alert::error('error','An error has occurred');
            return back();
        }
    }
}
