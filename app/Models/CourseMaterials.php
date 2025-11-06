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

    protected $dates = ['deleted_at'];

    public function note()
    {
        return $this->belongsTo(CourseNotes::class, 'noteSlug', 'slug');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }
}
