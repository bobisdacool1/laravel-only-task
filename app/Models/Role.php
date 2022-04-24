<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_role');
    }
}
