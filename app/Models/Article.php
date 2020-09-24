<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table   = 'articles';
    protected $guarded =  ['*'];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT = 1;
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
        return array_get($this->status,$this->a_active,'[N\A]');
    }
    public function gethot()
    {
        return array_get($this->hot,$this->a_hot,'N\A');
    }
}
