<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class,60)->create();
    }
}
