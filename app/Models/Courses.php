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

   public function students()
{
    return $this->belongsToMany(
        User::class,
        'course_subscriptions',   // pivot table
        'courseSlug',             // foreign key on pivot to Course
        'userSlug',               // foreign key on pivot to User
        'slug',                   // local key on Course
        'slug'                    // local key on User
    );
}


    public function getRevenueAttribute()
   {
      return $this->courseSubscriptions()->sum('course_amount');
   }

   public function getTotalStudentAttribute()
   {
      return $this->courseSubscriptions()->count();
   }

   public function allocation()
   {
      return $this->hasOne(CourseAllocation::class, 'courseSlug', 'slug');
   }

   public function materials()
   {
      return $this->hasMany(CourseMaterials::class, 'courseSlug', 'slug');
   }

   public function getTotalMaterialAttribute()
   {
      return $this->materials()->count();
   }

   public function notes()
   {
      return $this->hasMany(CourseNotes::class, 'courseSlug', 'slug');
   }

   public function getTotalNotesAttribute()
   {
      return $this->notes()->count();
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'user_id', 'id');
   }

   public function tasks()
   {
      return $this->hasMany(Task::class, 'courseSlug', 'slug');
   }  
    public function getTotalTasksAttribute()
   {
      return $this->tasks()->count();
   }

   public function assignments()
   {
      return $this->hasMany(Assignment::class, 'courseSlug', 'slug');
   }

   public function getTotalAssignmentAttribute()
   {
      return $this->assignments()->count();
   }

   public function tasksubmission()
   {
      return $this->hasMany(TaskSubmission::class, 'courseSlug', 'slug');
   }
    public function getTotalTaskSubmissionAttribute()
   {
      return $this->tasksubmission()->count();
   }

   public function submissions()
   {
      return $this->hasMany(AssignmentSubmission::class, 'courseSlug', 'slug');
   }  
   public function getTotalAssignmentSubmissionAttribute()
   {
      return $this->submissions()->count();
   }

      public function ratings()
   {
      return $this->hasMany(CourseRatings::class, 'courseSlug', 'slug');
   }

   public function getAverageRatingAttribute()
   {
      return round($this->ratings()->avg('ratingScore'), 1);
   }

   public function getRatingsCountAttribute()
   {
      return $this->ratings()->count();
   }




   public function progressForStudent($studentSlug = null)
    {
        $studentSlug = $studentSlug ?? Auth::user()->slug;
        $totalAssignments =  $this->submissions()->where('courseSlug', $this->slug)->where('studentSlug', $studentSlug)->count();
        $completedAssignments =  $this->submissions()->where('studentSlug', $studentSlug)
         ->where(function($q) {
               $q->where('status', 'completed')
               ->orWhere('submission_status', 'graded');
         })->count();
        if ($totalAssignments === 0) {
            return 0;
        }
        return round(($completedAssignments / $totalAssignments) * 100, 2);
    }

      public function taskProgressForStudent($studentSlug = null)
      {
        $studentSlug = $studentSlug ?? Auth::user()->slug;
        $totalTasks = $this->tasksubmission()->where('courseSlug', $this->slug)->where('studentSlug', $studentSlug)->count();
        $completedTasks =  $this->tasksubmission()->where('courseSlug', $this->slug)->where('studentSlug', $studentSlug)
         ->where('status', 'completed')->count();

        if ($totalTasks === 0) {
            return 0;
        }

        return round(($completedTasks / $totalTasks) * 100, 2);
      }

    public function progressForAllStudents()
   {
      $totalAssignments = $this->submissions()->where('courseSlug', $this->slug)->count();
      $completedAssignments = $this->submissions()->where('courseSlug', $this->slug)
      ->where(function($q) {
            $q->where('status', 'completed')
            ->orWhere('submission_status', 'graded');
      })->count();
      if ($totalAssignments === 0) {
         return 0;
      }
      return round(($completedAssignments / $totalAssignments) * 100, 2);
   }

   public function taskProgressForAllStudents()
   {
      $totalTasks =  $this->tasksubmission()->where('courseSlug', $this->slug)->count();
      $completedTasks =  $this->tasksubmission()->where('courseSlug', $this->slug)->where('status', 'completed')->count();
      if ($totalTasks === 0) {
         return 0;
      }
      return round(($completedTasks / $totalTasks) * 100, 2);
   }
}

?>
