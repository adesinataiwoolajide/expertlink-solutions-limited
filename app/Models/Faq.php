<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Faq extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table =  "faqs";
    protected $primaryKey = 'id';
    protected $fillable = [
        'question', 'answer', 'user_id','slug'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
