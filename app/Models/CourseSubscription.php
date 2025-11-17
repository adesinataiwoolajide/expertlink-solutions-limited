<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSubscription extends Model
{
    use SoftDeletes;
    protected $table = 'course_subscriptions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userSlug', 'slug', 'paymentSlug', 'courseSlug', 'programSlug', 'course_amount'
    ];

    protected $dates = ['deleted_at'];

    public function program()
    {
        return $this->belongsTo(Programs::class, 'programSlug', 'slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userSlug', 'slug');
    }

   public function allocations()
   {
      return $this->hasMany(CourseAllocation::class, 'courseSlug', 'slug');
   }
}
