<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'email',
        'role',
        'age',
        'class_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
     /**
     * Get the class associated with the user.
     */
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    /**
     * Get the enrollments for the user.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }

    /**
     * Get the exams created by the teacher.
     */
    public function createdExams()
    {
        return $this->hasMany(Exam::class, 'creator_user_id');
    }
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }
    /**
     * Get the answers submitted by the user.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get the results of the user.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    // Role-based Helper Methods

    /**
     * Check if the user is a teacher.
     */
    public function isTeacher()
    {
        return $this->role === 1; // Integer value for Teacher
    }

    /**
     * Check if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 0; // Integer value for Student
    }
}
