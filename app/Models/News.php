<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public static function newFactory()
    {
        return NewsFactory::new();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'news_role');
    }
}
