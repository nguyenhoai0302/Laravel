<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    //Action index()
    public $data = [];
    // public function index(){

    //     // $this->data['welcome'] = 'Học lập trình Laravel tại <b>Unicode</b>';
    //     // $this->data['content'] = '<h3>Chương 1: Nhập môn Laravel</h3>
    //     // <p>Kiến thức 1</p>
    //     // <p>Kiến thức 2</p>
    //     // <p>Kiến thức 3</p>';

    //     // $this->data['index'] = 1;
    //     // $this->data['dataArr'] = [
    //     //     // 'Item 1',
    //     //     // 'Item 2',
    //     //     // 'Item 3'
    //     // ];
    //     // $this->data['number'] = 30;
    //     $this->data['title'] = 'Đào tạo lập trình web';
    //     return view('clients.home', $this->data);
    // }

    public function index(){
        $this->data['title'] = 'Đào tạo lập trình web';
        $this->data['message'] = ' Đăng ký tài khoản thành công';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);

        $this->data['welcome'] = 'Học lập trình Laravel tại <b>Unicode</b>';
        $this->data['content'] = '<h3>Chương 1: Nhập môn Laravel</h3>
        <p>Kiến thức 1</p>
        <p>Kiến thức 2</p>
        <p>Kiến thức 3</p>';

        $this->data['index'] = 1;
        $this->data['dataArr'] = [
            // 'Item 1',
            // 'Item 2',
            // 'Item 3'
        ];
        $this->data['number'] = 30;
        $this->data['message'] = 'Đặt hàng thành công';

        return view('home', $this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'Thêm sản phẩm';
        return view('clients.add', $this->data);
    }
    public function postAdd(Request $request){
        dd($request);
    }
    public function putAdd(Request $request){
        return 'Phuong thuc put';
        dd($request);
    }
    // 1. Stack -> 
}
