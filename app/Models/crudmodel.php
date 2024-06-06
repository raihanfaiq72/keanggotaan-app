<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudmodel extends Model
{
    use HasFactory;

    protected $table = 'crud';
    protected $guarded = ['id'];
}
