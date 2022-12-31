<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
// dd(Route::currentRouteName());

class SiteController extends Controller
{
    public function index(){
        $blogs = Blog::all()->sortDesc();
        $tutors = Instructor::all();
        // dd($tutors);
        $courses = Course::all()->sortDesc();

        return view('index',
        [
            'blogs' => $blogs,
            'instructors' => $tutors,
            'courses' => $courses,
        ]);
    }      

    public function course_details($id){
        $course = Course::find($id);
        $tags = $course->tags;
        
        $allCourses = Course::all();
        $myarr = [];
        foreach($allCourses as $it){
            $turn = 0;
            foreach($it->tags as $tag){
                foreach($tags as $tg){
                    if($tg->id === $tag->id && !$turn){
                        $turn = 1;
                        // printf($it.'\n');
                        array_push($myarr,$it);
                    }
                }
            }
        }
        // dd($myarr);
        return view('detail',[
            'course' => $course,
            'tags' => $tags,
            'allCourses' => $allCourses,
            'myarr' => $myarr,
        ]);
    }

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
        $courses = Course::all();
        return view('course',
            ['courses' => $courses]);   
    }

    public function detail(){
        // dd(explode('.',Route::currentRouteName())[0]);
        return view('detail');   
    }

    public function taged_courses($id){
        $tag = Tag::find($id);
        // dd($tag->courses());
        $courses = $tag->courses;
        // dd(explode('.',Route::currentRouteName())[0]);
        return view('course',
            [
                'courses' => $courses,
                'tag'=> $tag,
            ]);   
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
