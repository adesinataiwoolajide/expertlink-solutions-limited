<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Assignment extends Model
{
    use SoftDeletes;
    protected $table = 'assignments';
    protected $primaryKey = 'id';
    
    // protected $fillable = [
    //     'slug',
    //     'studentSlug', 'instructorSlug', 'noteSlug', 'courseSlug',
    //     'title', 'description', 'due_date', 'max_score', 'score',
    //     'status', 'remark', 'answer_text', 'file_path',
    //     'student_score', 'submission_status', 'submission_remark'
    // ];
    protected $fillable = [
        'slug', 'instructorSlug', 'noteSlug', 'courseSlug',
        'title', 'description', 'due_date', 'max_score', 'status', 'remark'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'studentSlug', 'slug');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructorSlug', 'slug');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseSlug', 'slug');
    }

    public function note()
    {
        return $this->belongsTo(CourseNotes::class, 'noteSlug', 'slug');
    }
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class, 'assignment_id');
    }

    public function scopeForStudent($query, $studentSlug = null)
    {
        return $query->where('studentSlug', $studentSlug ?? Auth::user()->slug);
    }


}
