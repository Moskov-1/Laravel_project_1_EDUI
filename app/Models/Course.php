<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'heading',
        'body',
        'instructor_id',
        'lectures',
        'duration',
        'skill_level',
        'language',
        'price',
    ];

    public function registerMediaCollections(): void{
        
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();
        
        $this
            ->addMediaCollection('banner')
            ->singleFile();
    }
    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'course_tags');
    }
}
