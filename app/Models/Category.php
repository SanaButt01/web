<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'type','icon'
    ];

    public function books()
    {
       
        return $this->hasMany(Books::class, 'category_id', 'category_id');
    }
   
  
     public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucwords($value);
    }
}
