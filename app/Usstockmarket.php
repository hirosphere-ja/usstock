<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Usstocklist;

class Usstockmarket extends Model
{
    protected $fillable = ['market_id', 'market'];

    public function usstocklists(){
        return $this->hasMany(Usstocklist::class);
    }
}
