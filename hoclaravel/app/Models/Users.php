<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getAllUsers(){
        $users = DB::select('SELECT * from users ORDER BY create_at DESC');
        return $users;
    }
    public function addUser($data){
        DB::insert('INSERT INTO users (fullname, email, create_at) values (?, ?, ?)', $data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
    public function updateUser($data, $id){

        // $data = array_merge($data, [$id]);
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET fullname=?, email=?, update_at=? where id = ?', $data);
    }
    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }
    public function statementUser($sql){
        return DB::statement($sql);
    }
    public function learnQueryBuilder(){
        // 1. Lấy all DL trong bảng
        $lists = DB::table($this->table)
        ->select('email','fullname')
        // ->where('id', '>', 1) 
     
        // ->where('id', '>=', 3)
        // ->where('id', '<=', 5)
        // ->where([ //sd mảng 2 chiều
        //     [
        //         'id','>=', 3
        //     ],
        //     [
        //         'id','<=', 5
        //     ]
        // ])

        ->where('id', 3)
        ->orwhere('id', 5)
        ->get(); //-> Trả về array
        dd($lists);

        // 2. Lấy 1 bản ghi đầu tiên của bảng (Lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first(); //-> Trả về 1 class
        dd($detail->email);  //Muốn lấy gtri cụ thể

        // 3. Select cột trong bảng, đặt seclect trước get or first nếu để sau thì bị sẽ không lấy DL đc
        // 4. Truy vấn có ĐK WHERE (>, < , = , <>)
    }
}
