<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone', 
        'latitude', 
        'longitude',
        'services',
        'user_id',
        
    ];

     protected $casts = [
        'created_at' => 'date:Y-m-d',
       
    ];
     public function product()
    {
         return $this->hasMany(Product::class, 'zone_id', 'id');
    }
}
