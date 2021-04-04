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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'body',
        'iframe',
        'user_id',
    ];

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

    /**
     * Para hacer las URL amigables, aplicar lo que indica la documentacion de
     * https://github.com/cviebrock/eloquent-sluggable
     */
    public function getTitleAttribute($title)
    {
        return \strtoupper($title);
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if($this->image)
        // Para poder acceder a la carpeta de storage, que es privada,
        // Se mueve a public de forma simbolica mediante un acceso directo y asi poder acceder a ella
        // Esto se logra colocando en la consola: php artisan storage:link
        return url("storage/$this->image");
    }
}


