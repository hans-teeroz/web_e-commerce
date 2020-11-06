<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    protected $guarded =  ['*'];
    const SLS_ACTIVE = 1;
    const SLS_PRIVATE = 0;
    const SLS_BANNER_ACTIVE = 1;
    const SLS_BANNER_PRIVATE = 0;
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
    protected $hot_banner_home = [
        1 => [
            'name' => 'Home: Hiện',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Home: Không',
            'class' => 'label-default'
        ],
    ];
    protected $hot_banner_cate = [
        1 => [
            'name' => 'Cate: Hiện',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Cate: Không',
            'class' => 'label-default'
        ],
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->sls_active,'N\A');
    }

    public function getbanner_home()
    {
        return array_get($this->hot_banner_home,$this->sls_banner_home,'N\A');
    }
    public function getbanner_cate()
    {
        return array_get($this->hot_banner_cate,$this->sls_banner_category,'N\A');
    }
}
