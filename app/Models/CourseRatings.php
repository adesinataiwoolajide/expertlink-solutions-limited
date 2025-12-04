<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRatings extends Model
{
    protected $table = 'course_ratings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'slug', 'ratingScore', 'studentSlug', 'courseSlug', 'ratingComment'
    ];
    protected $dates = ['deleted_at'];

    public function student()
    {
        return $this->belongsTo(User::class, 'studentSlug', 'slug');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }


}
