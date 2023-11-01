<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;
    protected $table = 'tutorial';
    protected $fillable = ['judul_tutorial', 'deskripsi', 'bahan','alat', 'langkah_tutorial','foto' ];
}
