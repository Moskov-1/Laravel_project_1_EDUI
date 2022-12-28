<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Tag;

class AdminController extends Controller
{
    public function create(){
        return view('Blog.create_blog');
    }

    public function store(Request $request){
        // $user = $request->user();
        // dd($request->all());
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->heading = $request->heading;
        $blog->content = $request->content;
        $blog->type = $request->type;
        $blog->save();

        $blog->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');

        return redirect(route('blog.create'))
            ->with('status','Successfully sent !');
    }

    public function course_create(){
        $tutors = Instructor::all();
        $tags = Tag::all();
        return view('Course.create_course',
            [
                'instructors' => $tutors,
                'tags' => $tags,
            ]
        );
    }

    public function course_store(Request $request){
        // dd($request->body);
        $course = new Course();
        $course->heading = $request->heading;
        $course->body = $request->body;
        $course->lectures = $request->lectures;
        $course->duration = $request->duration;
        $course->skill_level = $request->skill_level;
        $course->language = $request->language;
        $course->price = $request->price;


        $tutor = Instructor::find($request->instructor);
        $tutor->courses()->save($course);
        $course->save();

        $course->tags()->attach($request->tags);

        $course->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');

        $course->addMediaFromRequest('banner')
        ->toMediaCollection('banner');

        return redirect(route('course.create'))
        ->with('status','Successfully Created Course 🎉');
    }
    
    public function tag_create(){
        return view('Tags.create_tag');
    }

    public function tag_store(Request $request){

        $tag = new Tag();

        $tag->title = $request->title;
        $tag->Field = $request->field;
        $tag->save();

        return redirect(route('tag.create'))
        ->with('status','Successfully Created tag 🎉');
    }

    public function instructor_create(){
        $tags = Tag::all();
        return view('Instructor.create_instructor_account',
        ['tags'=>$tags]
        );
    }
    
    public function instructor_store(Request $request){

        // dd($request->field);

        $tutor = new Instructor();
        
        $tutor->name = $request->name;
        
        $tutor->facebook = $request->fb;
        $tutor->youtube = $request->yt;
        $tutor->instagram = $request->insta;
        $tutor->twitter = $request->tw;
        $tutor->linkedin = $request->Ln;
        
        $tag = Tag::find($request->field);
        $tag->instructors()->save($tutor);


        $tutor->addMediaFromRequest('image')
            ->toMediaCollection('profile_picture');

        return redirect(route('instructor.create'))
            ->with('status','Successfully Created Account 🎉');
    }

}
