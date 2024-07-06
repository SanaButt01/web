<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{
    use HasFactory;
    protected $primaryKey = 'preview_id';
    protected $fillable = ['content_id', 'path'];
    public function content()
    {
        return $this->belongsTo(Content::class,'content_id');
    }
}
