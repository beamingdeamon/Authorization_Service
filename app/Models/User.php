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
    public $timestamps = false;

    public function getJWTIdentifier()
      {
          return $this->getKey();
      }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function userInfo(){
      return $this->hasOne(UserInfo::class);
    }

    public function role(){
      return $this->hasOneThrough(Role::class, UserInfo::class);
    }

    public function mailVerification(){
      return $this->hasOne(MailVerification::class);
    }
}
