<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseMaterials extends Model
{
    use SoftDeletes;
    protected $table = 'course_materials';
    protected $primaryKey = 'id';
    protected $fillable = [
       'slug', 'course_file', 'courseSlug', 'noteSlug'
    ];
}
