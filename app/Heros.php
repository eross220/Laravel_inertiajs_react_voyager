<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Weapons;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Heros extends Model
{
    //
    // use HasFactory;

    protected $table = 'heros';
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    public function weapons()
    {
        return $this->belongsToMany(Weapons::class, 'hero_weapon', 'heros_id', 'weapons_id');
        // return $this->belongsTo(Weapons::class, 'id');
    }
}
