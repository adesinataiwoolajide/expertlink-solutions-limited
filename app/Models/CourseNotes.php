<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseNotes extends Model
{
    use SoftDeletes;
    protected $table = 'course_notes';
    protected $primaryKey = 'id';
    protected $fillable = [
       'slug', 'topic', 'content', 'title', 'chapter', 'link_one', 'link_two', 'link_three', 'link_four', 
       'status', 'instructorSlug', 'allocatonSlug', 'courseSlug', 'programSlug',
    ];

        public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }

    public function allocation()
    {
        return $this->belongsTo(CourseAllocation::class, 'allocatonSlug', 'slug');
    }

    public function materials()
    {
        return $this->hasMany(CourseMaterials::class, 'noteSlug', 'slug');
    }
}
