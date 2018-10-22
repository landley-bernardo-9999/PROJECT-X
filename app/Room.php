<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";
    public $primaryKey = "roomNo";
    public $incrementing = "false";
    public $keyType = "string";
}
