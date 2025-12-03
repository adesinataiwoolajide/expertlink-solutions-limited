<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class CourseNotes extends Model
{
    use SoftDeletes;
    protected $table = 'course_notes';
    protected $primaryKey = 'id';
    protected $fillable = [
       'slug', 'topic', 'content', 'title', 'chapter', 'link_one', 'link_two', 'link_three', 'link_four', 
       'status', 'instructorSlug', 'allocatonSlug', 'courseSlug', 'programSlug', 'addedByUserSlug', 'status'
    ];
    protected $dates = ['deleted_at'];

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

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructorSlug', 'slug');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'noteSlug', 'slug');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'noteSlug', 'slug');
    }

     public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class, 'noteSlug', 'slug');
    }

    public function tasksubmission()
    {
        return $this->hasMany(TaskSubmission::class, 'noteSlug', 'slug');
    }

    public function progressForStudent($studentSlug = null, $instructorSlug = null)
    {
        $user = Auth::user();

        // Administrator → cumulative progress across all submissions
        if ($user->hasRole('Administrator')) {
            $totalAssignments = $this->submissions()->count();

            $completedAssignments = $this->submissions()
                ->where(function($q) {
                    $q->where('status', 'submitted')
                    ->orWhere('submission_status', 'graded');
                })->count();
        }

        // Instructor → progress for submissions tied to their instructorSlug
        elseif ($user->hasRole('Instructor')) {
            $instructorSlug = $instructorSlug ?? $user->slug;

            $totalAssignments = $this->submissions()
                ->where('instructorSlug', $instructorSlug)->count();

            $completedAssignments = $this->submissions()
                ->where('instructorSlug', $instructorSlug)
                ->where(function($q) {
                    $q->where('status', 'submitted')
                    ->orWhere('submission_status', 'graded');
                })->count();
        }

        // Student → progress for their own submissions
        else {
            $studentSlug = $studentSlug ?? $user->slug;

            $totalAssignments = $this->submissions()
                ->where('studentSlug', $studentSlug)->count();

            $completedAssignments = $this->submissions()
                ->where('studentSlug', $studentSlug)
                ->where(function($q) {
                    $q->where('status', 'submitted')
                    ->orWhere('submission_status', 'graded');
                })->count();
        }

        if ($totalAssignments === 0) {
            return 0;
        }

        return round(($completedAssignments / $totalAssignments) * 100, 2);
    }

    public function taskProgressForStudent($studentSlug = null)
    {
        $studentSlug = $studentSlug ?? Auth::user()->slug;
        $totalTasks = $this->tasksubmission()->where('studentSlug', $studentSlug)->count();
        $completedTasks = $this->tasksubmission()->where('studentSlug', $studentSlug)->where('status', 'completed')->count();
        if ($totalTasks === 0) {
            return 0;
        }
        return round(($completedTasks / $totalTasks) * 100, 2);
    }

    
}
