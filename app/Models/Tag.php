<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'Field'
    ];

    public function blogs(){
        return $this->belongsToMany(Blog::class,'blog_tags');
    }

    public function instructors(){
        return $this->hasMany(Instructor::class);
    }
    
    public function courses(){
        return $this->belongsToMany(Course::class,'course_tags');
    }
}
