<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "books";
    protected $primaryKey = "book_id"; 
    protected $fillable = [
        'title', 'author', 'category_id','price'
    ];

    public function category()
    {
        
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'book_id', 'book_id');
    }

}
