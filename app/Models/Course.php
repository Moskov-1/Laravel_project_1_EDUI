<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\Glide\Manipulators\Crop;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'course_tags');
    }

    public function registerMediaCollections(): void{
        
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();
        
        $this
            ->addMediaCollection('banner')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void{
        
        $this->addMediaConversion('card')
            ->performOnCollections('thumbnail')
            ->width(600)
            ->height(600)
            ->fit(Manipulations::FIT_MAX,640,900)
            ->crop(Manipulations::CROP_CENTER,400,300)
            ->optimize()
            ;
    }
}
