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
        'ICT1',
        'ICT2',
        'Komputasi Sains'
    ];
}
