<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Support\Str;

class Article extends Model
{
    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'name', 'website_id', 'content',
    ];
        
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->{$article->getKeyName()} = (string) Str::uuid();
        });
    }
}
