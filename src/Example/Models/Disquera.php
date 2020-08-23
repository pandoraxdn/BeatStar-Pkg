<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disquera extends Model
{
    protected $table = 'disqueras';

	protected $primaryKey = 'id_d';

	protected $fillable = ['nombre','siglas','activo'];

	public $timestamps = false;
}
