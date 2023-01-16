<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroWeapon extends Model
{
    //
    protected $table = 'hero_weapon';

    public $fillable = [
        'hero_id',
        'weapon_id'
    ];
}
