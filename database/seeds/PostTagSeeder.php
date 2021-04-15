<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<20;$i++){
           \DB::table('post_tag')->insert([
               'tag_id' => mt_rand(1,5),
               'post_id' => mt_rand(1,App\Post::all()->count())
           ]);
       }
    }
}
