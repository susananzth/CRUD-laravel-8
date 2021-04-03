<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    /**
     * Para hacer las URL amigables, aplicar lo que indica la documentacion de
     * https://github.com/cviebrock/eloquent-sluggable
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($title)
    {
        return \strtoupper($title);
    }

    
}


