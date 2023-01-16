<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Heros;
use App\Weapons;
use App\HeroWeapon;
use Eloquent;
class HeroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getHeros(){
       
        $heroid_list=Heros::select('id')->get();
        
        $heros_list=[];
        
        foreach ($heroid_list as $hero_id) {
            $hero['id'] =$hero_id['id'];
           
            $heroName = Heros::find($hero_id)->first();
            $hero['name'] =$heroName['name'];
           
            $hero['total_damage'] =$this->getdamage($hero_id);
            
            array_push($heros_list,$hero);
        }
        
        return Inertia::render('Heros',[
            'heros' => $heros_list
        ]);
    }
   
    public function getWeaponsList(){
        
        $weapons_id_list=Weapons::select('id')->get();
        // dd($heroid_list);
        $weapons_list=[];
        
        foreach ($weapons_id_list as $weapon_id) {
          
            $weapon['id'] =$weapon_id['id'];
            
            $weaponName= Weapons::find($weapon_id)->first();
            $weapon['name'] =$weaponName['name'];
           
            $weapon['total_hero'] =$this->get_total_hero($weapon_id);
            array_push($weapons_list,$weapon);
        }
       
        return Inertia::render('Weapons',[
            'weapons' => $weapons_list
        ]);
       //return Inertia::render('Weapons');
    }
    public function getdamage($id){
        
        
        $total_damage = Heros::where('id', $id['id'])->first();
      
        $damage = $total_damage->weapons()->sum('damage');
        return $damage;

    }
    public function get_total_hero($id){
        
        
      
        $total_hero =Weapons::where('id', $id['id'])->first()->heros()->count();
        
        return $total_hero;

    }
}
