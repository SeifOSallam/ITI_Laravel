<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function comments(): HasMany {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }

    protected $fillable = ['title', 'body', 'image', 'author'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
