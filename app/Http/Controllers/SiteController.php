<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Instructor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
// dd(Route::currentRouteName());

class SiteController extends Controller
{
    public function index(){
        $blogs = Blog::all()->sortDesc();
        $tutors = Instructor::all();
        // dd($tutors);
        return view('index',
        [
            'blogs' => $blogs,
            'instructors' => $tutors,
        ]);
    }      

    // $b = Blog::find(1)->type;
    // dd($blogs[3]->getFirstMedia('thumbnail')->getUrl());
    // dd(compact("b")); 
    // dd(compact('blogs'));
    // return  compact('blogs');
    // return view('try.try',['blogs' => $blogs]);

    public function about(){
        $blogs = Blog::all()->sortDesc();

        // return view('try.try-about');
        return view('about',['blogs' => $blogs,]);   
    }

    public function demo_create(){
       
        return view('try.try-form');   
    }

    
    public function demo_store(Request $request){
        //  dd($request->fruits);
        foreach($request->fruits as $fruit){
            print_r($fruit);
        }

    }

    public function course(){
        return view('course');   
    }

    public function detail(){
        // dd(explode('.',Route::currentRouteName())[0]);
        return view('detail');   
    }

    public function feature(){
        return view('feature');   
    }

    public function team(){
        return view('team');   
    }

    public function testimonial(){
        return view('testimonial');   
    }

    public function contact(){
        return view('contact');   
    }
}
