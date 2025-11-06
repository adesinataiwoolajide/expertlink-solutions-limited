<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
   use HasFactory;
   use SoftDeletes;
   protected $table = 'courses';
   protected $primaryKey = 'course_id';

   protected $fillable = [
      'slug', 'course_name', 'user_id', 'programSlug', 'course_price', 'banner', 'basic_requirements', 'course_outline', 'learning_module', 
      'course_schedule', 'training_type', 'payment_structure', 'course_overview', 'course_technologies', 'packages_included', 'benefits',
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

}

?>
