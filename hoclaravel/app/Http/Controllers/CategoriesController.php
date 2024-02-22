<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(){

    }
    
    //Hiển thị danh sách chuyên mục (Phương thức GET)
    public function index(){
        return view('clients/categories/list');
    }

    //Lấy ra một chuyên mục theo id (Phương thức GET)
    public function getCategory($id){
        return view('clients/categories/edit');
    }

    //Sửa một chuyên mục (Phương thức POST)
    public function updateCategory($id){
        return 'Submit sửa chuyên mục: '.$id;
    }

    //Show form thêm DL (Phương thức GET)
    public function addCategory(){
        return view('clients/categories/add');
    }
    
    //Thêm DL vào chuyên mục (Phương thức POST)
    public function handleAddCategory(){
        return 'Submit thêm chuyên mục';
    }

    //Xóa DL (Phương thức DELETE)
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục: '.$id;
    }
}
