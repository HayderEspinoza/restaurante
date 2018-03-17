<?php

namespace Restaurante\Configuracion;

use Restaurante\Intermediate;

class Role extends Intermediate
{
	protected $table = 'roles';
    protected $fillable = ['name'];
}
