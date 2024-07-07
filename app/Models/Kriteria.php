<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'tb_kriteria';
    protected $guard = ['id'];
}
