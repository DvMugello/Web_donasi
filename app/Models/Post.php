<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $guarded= ['id'];

    protected $with =['category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('name','like','%' . $search . '%')
                       ->orWhere('slug','like','%' . $search . '%');
            });

        });
    }
    public function category()

    {
        return $this->belongsTo(Category::class);
    }
}
