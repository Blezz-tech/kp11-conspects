<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'description',
        'photo_before',
        'photo_after',
        'comment',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.y, H:i');
    }

    public function getSTitleAttribute()
    {
        return Str::limit($this->title, 30);
    }

    public function getSDescriptionAttribute()
    {
        return Str::limit($this->description, 30);
    }

    public function getSCommentAttribute()
    {
        return Str::limit($this->comment, 30);
    }

    /**
     * Get the categories that owns the comment.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
