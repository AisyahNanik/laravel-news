<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Tentukan kolom-kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'title', 
        'content', 
        'reporter', 
        'source', 
        'picture', 
        'post_date'
    ];
}
