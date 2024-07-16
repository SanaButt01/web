<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Specify the table name
    protected $table = 'feedbacks';

    // Specify the fillable attributes
    protected $fillable = ['message', 'email'];
}

