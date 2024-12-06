<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";
    protected $primaryKey = "content_id"; 
    protected $fillable = [
        'path', 'description','book_id' 
    ];
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id', 'book_id');
    }

    public function previews()
    {
        return $this->hasMany(Preview::class, 'content_id');
    }

}
    

  
