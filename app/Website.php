<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Website extends Model
{
    protected $casts = [
        'id' => 'string',
    ];    
    
    protected $fillable = [
        'name',
        'url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($website) {
            $website->{$website->getKeyName()} = (string) Str::uuid();
        });
    }
}
