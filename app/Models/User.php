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
        'name',
        'national_id',
        'password',
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

    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }


    /**
     * Check if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 0; // Integer value for Student
    }
    public function mathAnswersFirst()
    {
        return $this->hasMany(AnswersMathFirstKg::class, 'user_id');
    }
    public function mathAnswersSecondThird()
    {
        return $this->hasMany(MathAnswerSecondThird::class, 'user_id');
    }
    public function arabicAnswersSecondThird()
    {
        return $this->hasMany(ArabicAnswerSecondThird::class, 'user_id');
    }
    public function arabicAnswersFirstKg()
    {
        return $this->hasMany(ArabicAnswerSecondThird::class, 'user_id');
    }
    public function scienceAnswers()
    {
        return $this->hasMany(ScienceAnswer::class, 'user_id');
    }
}
