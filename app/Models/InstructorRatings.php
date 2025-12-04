<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorRatings extends Model
{
    protected $table = 'instructor_ratings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'slug', 'ratingScore', 'studentSlug', 'courseSlug', 'instructorSlug', 'ratingComment'
    ];
    protected $dates = ['deleted_at'];
}
