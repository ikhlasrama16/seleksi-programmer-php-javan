<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table = 'villages';

    protected $fillable = [
        'nama',
        'kode_pos',
        'kecamatan',
        'kabupaten_kota'
    ];
}
