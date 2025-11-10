<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use SoftDeletes;
    protected $table =  "blogs";
    protected $primaryKey = 'blog_id';
    protected $fillable = [
        'image', 'heading', 'description', 'slug', 'user_id', 'status',
        'event_date', 'event_gallery'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
