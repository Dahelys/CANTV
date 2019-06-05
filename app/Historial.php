<?php

namespace reporte_red_datos_cantv;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historials';

    protected $fillable = ['actividad','id_user'];
public function scopeSearch($query, $create_at)
	{
    $date = date('Y-m');
		return $query

          ->where('id_user', 'LIKE', "%${create_at}%");

      }
  



}
