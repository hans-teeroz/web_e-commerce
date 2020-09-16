<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const STATUS_hot = 1;
    const STATUS_nohot = 0;
    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-default'
        ],
    ];
    protected $hot = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-default'
        ],
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->pro_active,'N\A');
    }

    public function gethot()
    {
        return array_get($this->hot,$this->pro_hot,'N\A');
    }
    //show tên danh mục trong ds sản phẩm
    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
}
