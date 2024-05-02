<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idealike extends Model
{
    use HasFactory;
    public function likes(){
        return $this->hasMany(User::class);
    }
}
