<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssignmentSubmission extends Model
{
    use SoftDeletes;

    protected $table = 'assignment_submissions';
    protected $fillable = [
        'assignmentSlug', 'studentSlug','answer_text', 'file_path','student_score', 'submission_status', 'submission_remark',
        'noteSlug', 'instructorSlug', 'courseSlug', 'status', 'slug'
    ];

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

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignmentSlug', 'slug');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'studentSlug', 'slug');
    }

}
