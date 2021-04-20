    <?php
    use App\Category;
    use App\Tag;
    use App\Post;
    use App\Comment;
    use App\User;
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

    // $latest_posts = Post::select('id','title')->latest()->take(5)->withCount('comments')->get();
    // dump($latest_posts);
    // $most_popular_post = Post::select('id','title')->orderByDesc(
    //     Comment::selectRaw('COUNT(post_id) as post_like')
    //     ->whereColumn('comments.post_id','posts.id')
    //     ->orderBy('post_like','desc')
    //     ->limit(1)
    // )->withCount('comments')
    // ->take(5)
    // ->get();
    // dump($most_popular_post);
    // $most_active_user = User::select('id','name')->orderByDesc(
    //         Post::selectRaw('COUNT(user_id) as active_user')
    //         ->whereColumn('posts.user_id','users.id')
    //         ->orderBy('active_user','desc')
    //         ->limit(1)
    //     )->withCount('posts')
    //     ->take(5)
    //     ->get();
    //  dump($most_active_user);   

    // $most_popular_category = Category::select('id','title')
    //                             ->withCount('comments')
    //                          ->orderBy('comments_count','desc')
    //                          ->take(1) 
    //                          ->get();
    // dump($most_popular_category);                                                       
    // $result = Post::with(['comments' => function($q){
    //     $q->select('comments.id','comments.content','comments.post_id');
    // } ])->find(1);
    // dump($result);
    // ========================== full text search ==========================================
    // $search_term = "+molestiae -recusandae";
    // $results = DB::table('posts')->whereRaw('MATCH(title,content) AGAINST(? IN BOOLEAN MODE)',[$search_term])
    //             ->paginate(10);
    // dump($results);
    // ========================== dynamic sorting ===========================================
    // $search_term = "+molestiae -recusandae";
    // $sort_by = 'created_at';
    // $results = DB::table('posts')->whereRaw('MATCH(title,content) AGAINST(? IN BOOLEAN MODE)',[$search_term])
    // ->when($sort_by,function($q,$sort_by){ // when sort by has value it will run like if statement
    //     return $q->orderBy($sort_by);
    // })            
    // ->paginate(10);
    // dump($results);
    // ========================= 
    // $search_term = "+molestiae -recusandae";
    // $sort_by = 'updated_at desc,title asc';
    // $results = DB::table('posts')->whereRaw('MATCH(title,content) AGAINST(? IN BOOLEAN MODE)',[$search_term])
    // ->when($sort_by,function($q,$sort_by){ // when sort by has value it will run like if statement
    //     return $q->orderByRaw($sort_by);
    // },function($q){
    //     return $q->orderBy('title'); // if when fails it will run / null
    // })            
    // ->paginate(10);
    // dump($results);
    //  =================================================== 

    // $search_term = "+molestiae -recusandae";
    // $sort_by = 'updated_at desc,title asc';
    // $sortByCommented = true;
    // $filterBYUserId = 2;
    // $highRating = true;
    // $results = DB::table('posts')->whereRaw('MATCH(title,content) AGAINST(? IN BOOLEAN MODE)',[$search_term]);
    // $results = $results->when($sort_by,function($q,$sort_by){ // when sort by has value it will run like if statement
    //     return $q->orderByRaw($sort_by);
    // },function($q){
    //     return $q->orderBy('title'); // if when fails it will run / null
    // });
    // $results = $results->when($filterBYUserId,function($q,$filterBYUserId){
    //     return $q->where('user_id',$filterBYUserId);
    // });
    // $results = $results->when($sortByCommented,function($q){
    //     return $q->orderByDesc(
    //         DB::table('comments')
    //         ->selectRaw('COUNT(comments.post_id)')
    //         ->whereColumn('comments.post_id','posts.id')
    //         ->orderByRaw('COUNT(comments.post_id) DESC')
    //         ->limit(1)
    //     );
    // }); 

    // $results =  $results->when($highRating,function($q){
    //     $q->whereExists(function($query){
    //         $query->select('*')
    //         ->from('comments')
    //         ->whereColumn('comments.post_id','posts.id')
    //         ->where('comments.content','LIKE',"%excellent%")
    //         ->limit(1);
    //     });
        
    // });           
    // $results = $results->paginate(10);
    // dump($results);

    // ================================ crud eloquent revision

    // $user_id = 1;
    // $category_id = 1;
    // $post = new Post();
    // $post->title = "post_title";
    // $post->content =  "post_content"; 
    // $post->category()->associate($category_id);
    // $result = User::find(1)->posts()->save($post);
    // dump($result);

    // $post_id = 1;
    // $comment = new Comment();
    // $comment->content = "comment_content";
    // $comment->post()->associate($post_id);
    // dump($comment->save());
    $post = Post::find(3);
    // $post->tags()->attach(1);
    // $post->category()->associate(3);   
    $post->category()->dissociate(); 
    dump($post->save());
    });
