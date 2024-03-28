<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getAllUsers($filters = [], $keywords=null, $sortByArr = null, $perPage = null){
        //$users = DB::select('SELECT * from users ORDER BY create_at DESC');
        // DB::enableQueryLog();
        $users = DB::table($this->table)
        ->select('users.*', 'groups.name as group_name')
        ->join('groups','users.group_id', '=', 'groups.id');

        $orderBy = 'users.create_at';
        $orderType = 'desc';

        if (!empty($sortByArr) && is_array($sortByArr)){
            if (!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])){
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
        }
        
        $users = $users->orderBy($orderBy, $orderType);         // Sắp xếp thời gian 
        
        if (!empty($filters)){
            $users = $users->where($filters);
        }

        if (!empty($keywords)){
            $users = $users->where(function($query) use ($keywords){
                $query->orWhere('fullname','like', '%'.$keywords.'%');
                $query->orWhere('email','like', '%'.$keywords.'%');
            });
        }
        // $users = $users->get();
        // $sql = DB::getQueryLog();
        // dd($sql);
        if (!empty($perPage)) {
            $users = $users->paginate($perPage)->withQueryString();   // $perPage bản ghi trên 1 trang
        } else {
            $users = $users->get();
        }
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
        // $lists = DB::table($this->table)
        // ->select('email','fullname', 'id', 'update_at', 'create_at')
        // ->where('id', '>', 1) 
        // ->where('id', 3)
        // ->where(function($query){
        //     $query->where('id', '<', 5);
        //     $query->orwhere('id', '>', 5);
        // })

        //->where('fullname', 'like', '%Nguyễn Hoài%')  // truy vấn tìm kiếm "LIKE"
        //->whereBetween('id', [3,6])                   // truy vấn trong khoảng "whereBetween
        //->whereNotBetween('id', [3,6])                // truy vấn không trong khoảng "whereNotBetween -> nằm ngoài

        //->whereIn('id', [3,6])                        // truy vấn toán tử whereIn / whereNotIn
        //->whereNotNull('update_at')                   // truy vấn ktra NULL "whereNull / whereNotNull"
        //->whereYear('create_at', '2024')                   // truy vấn Date (whereDate, whereMonth, whereDay, whereYear)
        
        // 1. So sánh 2 cột bằng nhau & SS với các toán tử so sánh
        //->whereColumn('create_at', '=', 'update_at')
        //->get(); //-> Trả về array
        //->toSql(); //-> debug câu lệnh SQL

        // 2. Nối bảng "join"
        //$lists = DB::table('users')
        //->select('users.*', 'groups.name as group_name')
        //->join('groups', 'users.group_id', '=', 'groups.id')
        //->leftJoin('groups', 'users.group_id', '=', 'groups.id')   // Hiện thị all Dl bên trái "users" -> ngược với rightJoin lấy all DL bên phải "groups"
        
        // 3. Sắp xếp
        // ->orderBy('create_at', 'asc')     
        // ->orderBy('id', 'desc')
        //->inRandomOrder()                                            // Sắp xếp ngẫu nhiên -> mỗi khi load sẽ sắp xếp lại 
        
        //->select(DB::raw('count(id) as email_count'), 'email')
        // ->groupBy('email')                                            // Truy vấn theo nhóm 
        // ->having('email_count', '>=', 2)
        
        // ->limit(2)      // Giới hạn 
        // ->offset(1)    // loại bỏ những bản ghi không muốn hiển thị
        
        // ->take(2)
        // ->skip(2)
        // ->get();
        //dd($lists);

        // 4. Thêm DL vào bảng
        // $status = DB::table('users')->insert([      // chỉ trả về TRUE or FALSE
        //     'fullname' => 'Nguyễn Thị Hoài',
        //     'email' => 'hoainguyen@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);
        //dd($status);

        // 4. Lấy id khi insert
        //$lastId = DB::getPdo()->lastInsertId();
        // $lastId = DB::table('users')->insertGetId([     // sau khi insert -> trả về id luôn
        //     'fullname' => 'Nguyễn Thị Hoài',
        //     'email' => 'hoainguyen@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);
        // dd($lastId);

        // 5. Cập nhật bản ghi -> Trong Th không có where thì sẽ cập nhật all
        // $status = DB::table('users')
        // ->where('id', 11)
        // ->update([
        //     'fullname' => 'Trần Nguyên',
        //     'email' => 'nguyentran@gmail.com',
        //     'update_at' => date('Y-m-d H:i:s')
        // ]);
        // dd($status);

        // 6. Xóa bản ghi
        // $status = DB::table('users')
        // ->where('id', 11)
        // ->delete();

        // 7. Đếm số bản ghi 
        //$count = DB::table('users')->where('id', '>', 5)->count();
        // $count = count($lists);
        // dd($count);

        // 8. DB Raw Query
        $lists = DB::table('users')
        // ->select(
        //     DB::raw('count(id) as email_count')
        // )
        // ->groupBy('email')

        // ->selectRaw('fullname, email')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->whereRaw('id > 20')
        //->orderByRaw('create_at DESC, update_at ASC')

        // ->selectRaw('fullname, email, count(id) as email_count')
        // ->groupByRaw('fullname, email')
        // ->having('email_count', '>=', 2)
        // ->havingRaw('count(id) > ?', [2])

        // ->where(
        //     'group_id', 
        //     '=', 
        //     function($query){
        //         $query->select('id')
        //         ->from('groups')
        //         ->where('name', '=', 'Administrator');
        //     }
        // )

        ->select('email', DB::raw('(SELECT count(id) FROM `groups`) as group_count'))
        ->selectRaw('email, (SELECT count(id) FROM `groups`) as group_count')
        ->get();


        // dd($lists);
        $sql = DB::getQueryLog();
        dd($sql);

        // 2. Lấy 1 bản ghi đầu tiên của bảng (Lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first(); //-> Trả về 1 class
        //dd($detail->email);  //Muốn lấy gtri cụ thể

        // 3. Select cột trong bảng, đặt seclect trước get or first nếu để sau thì bị sẽ không lấy DL đc
        // 4. Truy vấn có ĐK WHERE (>, < , = , <>)
    }
}
