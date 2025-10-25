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
       'slug', 'course_name', 'banner', 'basic_requirements', 'course_outline', 'learning_module', 
       'course_schedule', 'training_type', 'payment_structure', 'course_overview', 'course_technologies', 'packages_included', 'benefits',
    ];
}

?>
