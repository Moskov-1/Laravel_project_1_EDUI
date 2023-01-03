<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Instructor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'field',
        
        'twitter',
        'youtube',
        'instagram',
        'linkedin',
        'facebook',
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    
    public function registerMediaCollections(): void{
        
        $this
            ->addMediaCollection('profile_picture')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void{

        $this->addMediaConversion('card')
            ->performOnCollections('profile_picture')
            ->width(1200)
            ->height(1000)
            ->sharpen(10)
            ->focalCrop(1200,900,1,1,1);
    }
}
