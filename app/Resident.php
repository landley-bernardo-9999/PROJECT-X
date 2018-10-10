<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = "residents";
    protected $primaryKey = "id";
    public $incrementing = true;

}
