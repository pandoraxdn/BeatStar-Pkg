<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = 'artistas';

	protected $primaryKey = 'id_a';

	protected $fillable = ['nombre','apellido','nacionalidad','activo'];

	public $timestamps = false;
}
