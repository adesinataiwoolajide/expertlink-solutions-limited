<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\CourseNotesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable; use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'slug',
        'email','password', 'role', 'status', 'change_password', 'branchSlug', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function courseSubscriptions()
    {
        return $this->hasMany(CourseSubscription::class, 'userSlug', 'slug');
    }

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }

    public function notes()
    {
        return $this->hasMany(CourseNotes::class);
    }

    public function courseAllocations()
    {
        return $this->hasMany(CourseAllocation::class);
    }

    public function studentTasks()
    {
        return $this->hasMany(Task::class, 'studentSlug', 'slug');
    }

    // Tasks where this user is the instructor
    public function instructorTasks()
    {
        return $this->hasMany(Task::class, 'instructorSlug', 'slug');
    }

    // Notes authored/allocated to this instructor (optional, if you use instructorSlug)
    public function authoredNotes()
    {
        return $this->hasMany(CourseNotes::class, 'instructorSlug', 'slug');
    }

    public function assignmentsAsStudent()
    {
        return $this->hasMany(Assignment::class, 'studentSlug', 'slug');
    }

    // Inverse of Assignment::instructor()
    public function assignmentsAsInstructor()
    {
        return $this->hasMany(Assignment::class, 'instructorSlug', 'slug');
    }



}
