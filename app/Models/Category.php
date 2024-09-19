<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function($query,$category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug',$category);
            });
        });
    }

}
