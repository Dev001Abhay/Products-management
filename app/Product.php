<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'max_price', 
        'price',
        'images',
        'description',
        'user_id',
        'zone_id',
        'status'
    ];

     protected $casts = [
        'created_at' => 'date:Y-m-d',
       
    ];

    public function zone()
    {
         return $this->belongsTo(Service::class, 'zone_id', 'id');
    }

}
