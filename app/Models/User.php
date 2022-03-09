<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User  extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
        'email', 'password'
    ];
    protected $hidden = [
      'password'
    ];
   use HasFactory;
  
    public $timestamps = false;
}
