<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function scopeTitle(Builder $query, String $search){
    //     return $query->where('title', 'like', "%$search%");
    // }

    // public function scopeGetCountAvg(Builder $query){
    //     return $query
    //     ->withCount(['comments' => function (Builder $query) {
    //         $query
    //     }])
    // }
}
