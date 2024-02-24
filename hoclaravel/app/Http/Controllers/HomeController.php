<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    //Action index()
    public function index(){
        $title = "Học lập trình web tại Unicode";
        $content = 'Học lập trình Laravel 8.x tại Unicode';
        /*
        [
            'title' => $title,
            'content' => $content
        ]
        compact('title', 'content')
        */
        return view('home')->with(['title'=>$title, 'content'=>$content]);

        // $dataView = [
        //     'titleData' => $title,
        //     'contentData' => $content
        // ];
        // return view('home', $dataView); //load view home.php

        // return View::make('home')->with(['title'=>$title, 'content'=>$content]);

        // $contentView = view('home');
        // // $contentView = $contentView ->render(); //chuyển chuỗi thành html thô -> in pdf
        // dd($contentView);
        // return $contentView;
    }
    
    //Action getNews()
    public function getNews(){
        return 'Danh sách tin tức ';
    }
    public function getCategories($id){
        return 'Chuyên mục: '.$id;
    }

    public function getProductDetail($id){
        return view('clients/products/detail', compact('id'));
    }
}
