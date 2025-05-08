<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();
        $admin = User::factory()->state(['is_admin'=>true])->create();

        $users = User::factory()->count(5)->create();

        Author::factory()->count(15)->create()->each(function (Author $author) {
            Book::factory()->count(3)->create()->each(function (Book $book) use ($author) {
                $book->authors()->saveMany([$author]);
            });
        });

        Book::all()->each(function(Book $book) use ($users){
            $reviewes = BookReview::factory()->count(4)->make();

            $reviewes->each(function (BookReview $review) use ($users){
                $review->user()->associate($users->random());
            });
            $book->reviews()->saveMany($reviewes);
        });
    }
}
