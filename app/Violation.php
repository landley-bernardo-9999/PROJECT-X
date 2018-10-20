<?php

namespace App;
use App\Resident;
use App\Violation;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public function resident(){
        return $this->belongsTo(Resident::class);
    }
}
