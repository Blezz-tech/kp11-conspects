<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use IntlDateFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    public function getTimeComment(){
        $formatter = new IntlDateFormatter(
            'ru_RU',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Europe/Moscow',
            IntlDateFormatter::GREGORIAN,
            'dd MMM yyyy'
        );
        return $formatter->format($this->created_at);
    }

    protected $fillable = [
        'id',
        'review',
        'rating',
        'book_id',
        'user_id',
        'status'
    ];

    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
