<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'file_name',
        'user_id'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
      return $this->belongsToMany(User::class,'likes');
    }
}
