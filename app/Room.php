<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";
    protected $primaryKey = "roomNo";
    public $keyType = "string";
    public $incrementing = false;

}
