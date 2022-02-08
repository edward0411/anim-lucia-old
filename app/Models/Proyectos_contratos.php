<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyectos_contratos extends Model
{
    use SoftDeletes;

    protected $table = 'proyectos_contratos';
}
