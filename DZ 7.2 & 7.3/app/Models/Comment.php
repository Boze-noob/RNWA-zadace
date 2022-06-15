<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $primaryKey = 'cid';

    public $timestamps = false;

    protected $fillable = [
      'ccontent', 'pid', 'rid'
    ];

    public function author()
    {
        return $this->belongsTo(Registration::class, 'rid', 'rid');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'pid', 'pid');
    }
}
