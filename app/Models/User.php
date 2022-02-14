<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User  extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'email','first_name', 'last_name', 'password','role', 'permission'
    ];
    protected $hidden = [
      'password','remember_token'
    ];
   use HasFactory;
  public function getJWTIdentifier()
    {
        return $this->getKey();
    }
  public function getJWTCustomClaims()
  {
      return [];
  }
    public $timestamps = false;
}
