<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Tag;

class AdminController extends Controller
{
    public function show_blogs(){
        $blogs = Blog::all();
        return view('Blog.blog_index',
            ['blogs' => $blogs]);
    }

    public function blog_edit($id){
        $blog = Blog::find($id);
        // dd($blog->content);
        
        return view('Blog.blog_edit',
            ['blog' => $blog]);
    } 

    public function blog_update(Request $request, $id){
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->heading = $request->heading;
        if(isset($request->content)){
            $blog->content = $request->content;
        }
        $blog->type = $request->type;
        $blog->save();
        if(isset($request->image)){
            $blog->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');
        }
        return redirect(route('blog.index'))
        ->with('status','Successfully updated blog 🎉');
    } 

    public function blog_delete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect(route('blog.index'))
        ->with('status','Successfully deleted blog 🎉');
    }

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

    
    public function instructor_show(){
        $instructors = Instructor::withCount('courses')->get();
        return view('Instructor.instructor_index',
            ['instructors'=>$instructors]
        );
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

    public function instructor_edit($id){
        $instructor = Instructor::find($id);
        $tags = Tag::all();
        return view('Instructor.instructor_edit',
            [
                'tags' => $tags,
                'instructor' => $instructor,
            ]
        );
    }

    public function instructor_update(Request $request, $id){
        $instructor = Instructor::find($id);

        $instructor->name = $request->name;
        $instructor->facebook = isset($request->fb)?$request->fb:$instructor->facebook;
        $instructor->youtube = isset($request->yt)?$request->yt:$instructor->youtube;
        $instructor->instagram = isset($request->insta)?$request->insta:$instructor->instagram;
        $instructor->twitter = isset($request->tw)?$request->tw:$instructor->twitter;
        $instructor->linkedin = isset($request->Ln)?$request->Ln:$instructor->linkedin;
        $instructor->save();
       
        $tag = Tag::find($request->field);
        $tag->instructors()->save($instructor);

        if(isset($request->image)){
            $instructor->addMediaFromRequest('image')
                ->toMediaCollection('profile_picture');
        }
        
        return redirect(route('instructor.index'))
            ->with('status','Successfully Updated Account 🎉');
    }

    public function instructor_delete($id){
        Instructor::find($id)->delete();

        return redirect(route('instructor.index'))
        ->with('status','Successfully Deleted Account 🎉');
    }

    
    public function tag_show(){
        $tags = Tag::all();
        return view('Tags.tag_index',
            ['tags' => $tags]);
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
    

    public function tag_delete($id){
        $tag = Tag::find($id)->delete();
        return redirect(route('tag.index'))
        ->with('status','Successfully Deleted tag 🎉');
    }

    public function course_show(){
        $courses = Course::withCount('tags')->get();
        return view('Course.course_index',
            ['courses'=>$courses]);
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
    
    public function course_edit($id){
        $course = Course::find($id);
        $tutors = Instructor::all();
        $tags = Tag::all();
        return view('Course.course_edit',
            [
                'course' => $course,
                'instructors' => $tutors,
                'tags' => $tags,
        ]);
    }
    
    public function course_update(Request $request, $id){
        $course = Course::find($id);
        $course->heading = $request->heading;
        if(isset($request->body)){
        $course->body = $request->body;
        }
        if(isset($request->tags)){
            $course->tags()->attach($request->tags);
        }
        $tutor = Instructor::find($request->instructor);
        $tutor->courses()->save($course);
        $course->lectures = $request->lectures;
        $course->duration = $request->duration;
        $course->skill_level = $request->skill_level;
        $course->language = $request->language;
        $course->price = $request->price;
        if(isset($request->thumbnail)){
            $course->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');
        }
        if(isset($request->banner)){
            $course->addMediaFromRequest('banner')
            ->toMediaCollection('banner');
        }
        $course->save();


        return redirect(route('course.index'))
        ->with('status','Successfully Updated Course 🎉');
    }
    
    public function course_delete($id){
        $course = Course::find($id);
        $course->delete();

        return redirect(route('course.index'))
        ->with('status','Successfully Deleted Course 🎉');
    }

}
