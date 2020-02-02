<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usstocklist extends Model
{
    // 文字列キーの場合、以下の２つの設定が必要
    protected $keyType = 'string';
    protected $primaryKey = 'ticker';

    // created_atやupdated_atを使わない設定
    public $timestamps = false;
}
