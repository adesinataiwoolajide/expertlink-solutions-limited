<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use SoftDeletes;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'slug',
        'studentSlug', 'instructorSlug', 'noteSlug', 'courseSlug',
        'status', 'score', 'response', 'question', 'result', 'remark'
    ];

    // Relationships

    // public function student()
    // {
    //     return $this->belongsTo(User::class, 'studentSlug', 'slug');
    // }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructorSlug', 'slug');
    }

    public function note()
    {
        return $this->belongsTo(CourseNotes::class, 'noteSlug', 'slug');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function submissions()
    {
        return $this->hasMany(TaskSubmission::class, 'task_id');
    }


    public function scopeForStudent($query, $studentSlug = null)
    {
        return $query->where('studentSlug', $studentSlug ?? Auth::user()->slug);
    }


}
