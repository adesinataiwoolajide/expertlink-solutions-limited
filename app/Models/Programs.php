<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Programs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'programs';
    protected $primaryKey = 'program_id';

    protected $fillable = [
       'slug', 'program_name', 'banner', 
    ];
}
