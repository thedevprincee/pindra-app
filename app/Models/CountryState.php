<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryState extends Model
{
    use HasFactory;

//    public function country(){
//        return $this->belongsTo(Country::class);
//    }

 //   public function cities(){
 //       return $this->hasMany(City::class);
 //   }


    protected $casts = [
        'status' => 'integer',
//        'country_id' => 'integer'
    ];
}
