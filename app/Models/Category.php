<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    // Relationships

    /**
     * Get the questions for the category.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the category results for the category.
     */
    public function categoryResults()
    {
        return $this->hasMany(CategoryResult::class);
    }
}