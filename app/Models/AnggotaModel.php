<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'idJabatan', 'id');
    }
}
