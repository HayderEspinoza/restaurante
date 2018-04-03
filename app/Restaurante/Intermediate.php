<?php

namespace Restaurante;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DatesTranslator;

class Intermediate extends Model
{
    use DatesTranslator;

    protected $perPage = 30;
}
