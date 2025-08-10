<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = ['kode_divisi', 'nama_divisi', 'keterangan'];
    protected $table = 'divisis';
    public $timestamps = false;
}
