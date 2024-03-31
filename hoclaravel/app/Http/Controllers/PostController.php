<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        // $allPosts = Post::all();
        // dd($allPosts);

        // $post = Post::find('c1');
        // dd($post);

        // Khi chạy sẽ add và DB
        // $post = new Post;
        // $post->title = "Bài viết 3";
        // $post->content = "Nội dung 3";
        // $post->status = 1;
        // $post->save();

        echo '<h2>Query Eloquent Model</h2>';
        //$allPosts = Post::all();   // Lấy ra all bản ghi
        // if ($allPosts->count()>0) {
        //     foreach ($allPosts as $item) {
        //         echo $item->title.'<br/>';
        //     }
        // }

        // Lấy ra 1 bản ghi 
        // $detail = Post::find(1);
        // dd($detail);

        // Sử dụng query builder
            // $activePosts =  DB::table('posts')->where('status', 1)->get();
            // $activePosts = Post::where('status', 1)->orderBy('id', 'DESC')->get();
            // if ($activePosts->count()>0) {
            //     foreach ($activePosts as $item) {
            //         echo $item->title.'<br/>';
            //     }
            // }
                
        // $allPosts = Post::all();
        // $activePosts = $allPosts->reject(function ($post) {  //reject -> loại bỏ
        //     return $post->status==0; //boolean
        // });
        // dd($activePosts);

        // Post::chunk(2, function ($posts) {
        //     foreach ($posts as $post) {
        //         echo $post->title. "<br/>";
        //     }
        //     echo 'Kết thúc chunk <br/>';
        // });

        $allPosts = Post::where('status', 1)->cursor();
        foreach ($allPosts as $item) {
            echo $item->title.'<br/>';
        }
    }
}
