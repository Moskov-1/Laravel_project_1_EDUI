<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
}
