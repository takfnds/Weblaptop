<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [''];

    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_CANCEL = -1;

    public $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Mặc định',
            'class' => 'muted'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Đã giao dịch',
            'class' => 'success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ bỏ',
            'class' => 'danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status,$this->t_status,[]);
    }
}
