<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home1Controller extends Controller
{
    public function getArr(){
        $contentArr = [
            'name' => 'Laravel 8.x',
            'lesson' => 'Khóa học lập trinh Laravel',
            'academy' => 'Unicode Academy'
        ];
        return $contentArr;
    }
}
