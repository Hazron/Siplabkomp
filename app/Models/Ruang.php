<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $primarykey = 'id_ruang';
    public $timestamp = true;

    protected $fillable = [
        'nama_lab'
    ];
}
