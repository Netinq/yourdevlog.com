<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'string',
    ];    

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($type) {
            $type->{$type->getKeyName()} = (string) Str::uuid();
        });
    }
}
