<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAllocation extends Model
{
    use SoftDeletes;
    protected $table = 'course_allocations';
    protected $primaryKey = 'allocation_id';
    protected $fillable = [
       'slug', 'userSlug', 'courseSlug', 'programSlug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userSlug', 'slug');
    }

    // Relationship to Course using slug
    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }

    // Relationship to Program using slug
    public function program()
    {
        return $this->belongsTo(Programs::class, 'programSlug', 'slug');
    }

    public function allocationHistory()
    {
        return $this->hasMany(CourseAllocationHistories::class, 'allocationSlug', 'slug');
    }

}
