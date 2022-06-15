<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    public $timestamps = false;

    protected $primaryKey = 'pid';

    protected $fillable = [
        'pcontent', 'rid'
    ];

    public function author()
    {
        return $this->belongsTo(Registration::class, 'rid', 'rid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'rid', 'rid');
    }

}
