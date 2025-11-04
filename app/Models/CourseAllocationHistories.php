<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAllocationHistories extends Model
{
    use SoftDeletes;
    protected $table = 'course_allocation_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
       'slug', 'allocationSlug', 'previousUserSlug', 'newUserSlug', 'addedByUserSlug'
    ];
    public function allocations()
    {
        return $this->belongsTo(CourseAllocation::class, 'allocationSlug', 'slug');
    }

    public function previousUser()
    {
        return $this->belongsTo(User::class, 'previousUserSlug', 'slug');
    }

    public function newUser()
    {
        return $this->belongsTo(User::class, 'newUserSlug', 'slug');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'addedByUserSlug', 'slug');
    }

}
