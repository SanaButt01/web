<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "books";
    protected $primaryKey = "book_id"; // Corrected attribute name
    protected $fillable = [
        'title', 'author', 'category_id', // Add other columns as needed
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

}
