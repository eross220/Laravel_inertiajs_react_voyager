<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    //
    protected $table = 'weapon';
    public function heros()
    {
        return $this->belongsToMany(Heros::class, 'hero_weapon', 'weapons_id', 'heros_id');
    }
}
