<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        $slide = Slider::orderBy('id','asc')->get();
        $sector = Sector::orderBy('id', 'asc')->get();
        $blog = Post::orderBy('id', 'asc')->take(3)->get();
        return view('frontend.index', compact('slide','sector', 'blog'));
    }


    public function about(){
       
        return view('frontend.about');
    }

    public function service(){
        $service = Service::orderBy('id', 'asc')->get();
        return view('frontend.service', compact('service'));
    }

    public function portfolio(){
        $portfolio = Portfolio::orderBy('id', 'asc')->get();
        return view('frontend.portfolio', compact('portfolio'));
    }

    public function blog(){
        $blog = Post::orderBy('id', 'asc')->get();
        return view('frontend.blog', compact('blog'));
    }

    public function blogDetails(Post $post){
        $recent = Post::orderBy('id', 'desc')->latest();
        return view('frontend.blogDetails', compact('recent','post'));
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
