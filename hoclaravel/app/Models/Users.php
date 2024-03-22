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
        DB::enableQueryLog();
        // 1. Lấy all DL trong bảng
        $lists = DB::table($this->table)
        ->select('email','fullname', 'id', 'update_at')
        // ->where('id', '>', 1) 
        // ->where('id', 3)
        // ->where(function($query){
        //     $query->where('id', '<', 5);
        //     $query->orwhere('id', '>', 5);
        // })

        //->where('fullname', 'like', '%Nguyễn Hoài%')  // truy vấn tìm kiếm "LIKE"
        //->whereBetween('id', [3,6])                   // truy vấn trong khoảng "whereBetween
        //->whereNotBetween('id', [3,6])                  // truy vấn không trong khoảng "whereNotBetween -> nằm ngoài

        //->whereIn('id', [3,6])                           // truy vấn toán tử whereIn / whereNotIn
        ->whereNotNull('update_at')                        //truy vấn ktra NULL "whereNull / whereNotNull"
        ->get(); //-> Trả về array
        //->toSql(); //-> debug câu lệnh SQL
        dd($lists);
        $sql = DB::getQueryLog();
        dd($sql);

        // 2. Lấy 1 bản ghi đầu tiên của bảng (Lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first(); //-> Trả về 1 class
        //dd($detail->email);  //Muốn lấy gtri cụ thể

        // 3. Select cột trong bảng, đặt seclect trước get or first nếu để sau thì bị sẽ không lấy DL đc
        // 4. Truy vấn có ĐK WHERE (>, < , = , <>)
    }
}
