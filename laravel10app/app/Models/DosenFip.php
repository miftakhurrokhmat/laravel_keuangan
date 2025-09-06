<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenFip extends Model
{
    use HasFactory;

    protected $table = 'dosen_fip';
    protected $primaryKey = 'id';
}
