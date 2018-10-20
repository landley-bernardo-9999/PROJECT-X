<?php

namespace App;
use App\Violation;
use App\Resident;   

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    public function violations(){
        return $this->hasMany(Violation::class);
    }
}
