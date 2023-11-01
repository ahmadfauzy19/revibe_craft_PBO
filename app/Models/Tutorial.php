<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;
    protected $table = 'tutorial';
    protected $fillable = ['user_id', 'judul_tutorial', 'deskripsi', 'bahan', 'langkah_tutorial' ];
}
