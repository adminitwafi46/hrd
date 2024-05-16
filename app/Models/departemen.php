<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'nama_departemen',
        'deskripsi',
        'manager'
    ];
}
