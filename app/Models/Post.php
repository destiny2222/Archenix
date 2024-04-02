<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title',
        'author',
        'slug',
        'content',
        'image',
        'status',
        'category_id',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
