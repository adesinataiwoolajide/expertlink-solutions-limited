<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Courses extends Model
{
   use HasFactory;
   use SoftDeletes;
   protected $table = 'courses';
   protected $primaryKey = 'course_id';

   protected $fillable = [
      'slug', 'course_name', 'user_id', 'programSlug', 'course_price', 'banner', 'basic_requirements', 'course_outline', 'learning_module', 
      'course_schedule', 'training_type', 'payment_structure', 'course_overview', 'course_technologies', 'packages_included', 'benefits',
      'ratings', 'course_discount', 'course_introduction'
   ];

   protected $dates = ['deleted_at'];

   public function program()
   {
      return $this->belongsTo(Programs::class, 'programSlug', 'slug');
   }

   public function allocations()
   {
      return $this->hasMany(CourseAllocation::class, 'courseSlug', 'slug');
   }

   public function courseSubscriptions()
   {
      return $this->hasMany(CourseSubscription::class, 'courseSlug', 'slug');
   }

   public function allocation()
   {
      return $this->hasOne(CourseAllocation::class, 'courseSlug', 'slug');
   }

   public function materials()
   {
      return $this->hasMany(CourseMaterials::class, 'courseSlug', 'slug');
   }

   public function notes()
   {
      return $this->hasMany(CourseNotes::class, 'courseSlug', 'slug');
   }
   public function user()
   {
      return $this->belongsTo(User::class, 'user_id', 'id');
   }

   public function tasks()
   {
      return $this->hasMany(Task::class, 'courseSlug', 'slug');
   }

   public function assignments()
   {
      return $this->hasMany(Assignment::class, 'courseSlug', 'slug');
   }

   public function progressForStudent($studentSlug = null)
    {
        $studentSlug = $studentSlug ?? Auth::user()->slug;

        // Get all assignments tied to this course for the student
        $totalAssignments = Assignment::where('courseSlug', $this->slug)
            ->where('studentSlug', $studentSlug)
            ->count();

        $completedAssignments = Assignment::where('courseSlug', $this->slug)
            ->where('studentSlug', $studentSlug)
            ->where(function($q) {
                $q->where('status', 'completed')
                  ->orWhere('submission_status', 'graded');
            })
            ->count();

        if ($totalAssignments === 0) {
            return 0;
        }

        return round(($completedAssignments / $totalAssignments) * 100, 2);
    }

   public function taskProgressForStudent($studentSlug = null)
    {
        $studentSlug = $studentSlug ?? Auth::user()->slug;

        $totalTasks = Task::where('courseSlug', $this->slug)
            ->where('studentSlug', $studentSlug)
            ->count();

        $completedTasks = Task::where('courseSlug', $this->slug)
            ->where('studentSlug', $studentSlug)
            ->where('status', 'completed')
            ->count();

        if ($totalTasks === 0) {
            return 0;
        }

        return round(($completedTasks / $totalTasks) * 100, 2);
    }




}

?>
