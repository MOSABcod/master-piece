<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_id',
        'category_id',
        'category_score',
    ];

    // Relationships

    /**
     * Get the result that owns the category result.
     */
    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    /**
     * Get the category associated with the category result.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}