<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar',
        'file1',
        'file2',
        'file3',
    ];

}
