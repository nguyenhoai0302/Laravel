<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    
    public function post(Request $request){
        $allData = $request->all();
        // echo $allData['id'];
        dd($allData);
    }
}
