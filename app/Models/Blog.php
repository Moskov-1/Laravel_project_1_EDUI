<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'heading',
        'body',
        'type',
        // 'image_link'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }

    public function registerMediaCollections(): void{
        
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();
    }
    public static function last(){

        return static::all()->last();
    }

}
