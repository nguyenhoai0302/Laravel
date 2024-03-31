<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Quy ước tên table
    /*
        Tên Model: Post => table: posts
        Tên Model: ProductCategory: product_categories
        
    */

    protected $table = 'posts';

    // Quy ước khóa chính mặc định Laravel sẽ lấy field id làm khóa chính
    protected $primaryKey = 'id';
    // public $incrementing = false;

    // protected $keyType = 'string';

    public $timestamps = true;   // Tự động lưu lại thời gian cập nhật

    // TH muốn đổi tên trường
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    // Cấu hình giá trị mặc định
    protected $attributes = [
        'status' => 0
    ];
}
