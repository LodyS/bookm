<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $filabble = ['isbn', 'title', 'description', 'published_year'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function reviews()
    {
        return $this->hasMany(BookReview::class);
    }
}
