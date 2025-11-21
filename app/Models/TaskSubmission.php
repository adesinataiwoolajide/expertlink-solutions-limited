<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskSubmission extends Model
{
    use SoftDeletes;

    protected $table = 'task_submissions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'taskSlug', 'studentSlug','response', 'score', 'status', 'remark', 'courseSlug', 'noteSlug', 'instructorSlug', 'status'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'taskSlug', 'slug');
    }
     public function instructor()
    {
        return $this->belongsTo(User::class, 'instructorSlug', 'slug');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'studentSlug', 'slug');
    }

     public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }

    public function note()
    {
        return $this->belongsTo(CourseNotes::class, 'noteSlug', 'slug');
    }

}
