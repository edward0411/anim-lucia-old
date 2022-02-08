<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fases_actuales extends Model
{
    use SoftDeletes;

    protected $table = 'uv_fases_no_clonadas';

    public function Proyectos()
    {
        return $this->belongsTo('App\Models\Proyectos', 'id_proyecto');
    }

    public function Fases_planes()
    {
        return $this->hasMany('App\Models\Fases_planes', 'id_fase' );
    }
}