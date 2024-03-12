<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;


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
        $this->data['errorMessage'] = "Vui lòng kiểm tra lại dữ liệu";
        return view('clients.add', $this->data);
    }
    public function postAdd(ProductRequest $request){
        // return 'ok';
        // C2
        $rules =  [
            'product_name' => ['required', 'min:6'], 
            'product_price' => ['required', 'integer']
        ];
        // Cách 2
        $messages = [
            'required' => "Trường :attribute bắt buộc phải nhập",
            'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'integer' => 'Trường :attribute phải là số',
        ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => "Giá sản phẩm"
        ];

        // $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        // $validator->validate();
        // $request->validate($rules, $messages);
        return response()->json(['status'=>'success']);
        // $validator->validate();
        // if ($validator->fails()){  //Ktra xem Validate có thành công hay không 
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
        //     // return 'Validate thất bại';
        // }else{
        //     // return 'Validate thành công';
        //     return redirect()->route('product')->with('msg', 'Validate thành công'); //Khi nhập DL thành công -> trang sản phẩm 
        // }
        // return back()->withErrors($validator);
       
        // Cách 2
        // $message = [
        //     'required' => "Trường :attribute bắt buộc phải nhập",
        //     'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
        //     'integer' => 'Trường :attribute phải là số'
        // ];
        // $request->validate($rules, $message);

        // Xử lý việc thêm DL vào database

    }
    public function putAdd(Request $request){
        return 'Phuong thuc put';
        dd($request);
    }
}
