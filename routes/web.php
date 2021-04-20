<?php
use App\Category;
use App\Tag;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $categories = Category::select('id','title')->orderBy('title')->get();
//    dump($categories);
//    $tags = Tag::select('id','name')->get();
//    dump($tags);
// $tagConditions = Tag::select('id','name')->orderByDesc('id')->get();
// dump($tagConditions);
// $tagConditions = Tag::select('id','name')->orderByDesc(
//     \DB::Table('post_tag')
//     ->selectRaw('COUNT(tag_id) AS tag_count')
//     ->whereColumn('tags.id','post_tag.tag_id')
//     ->orderBy('tag_count','desc')
//     ->limit(1)
// )->get();// Most Used Tags
// dump($tagConditions);

$latest_posts = Post::select('id','title')->latest()->take(5)->withCount('comments')->get();
dump($latest_posts);
});
