<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table   = 'categories';
    protected $guarded =  ['*'];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
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
        return array_get($this->status,$this->c_active,'[N\A]');
    }
    public function gethot()
    {
        return array_get($this->hot,$this->c_hot,'N\A');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
