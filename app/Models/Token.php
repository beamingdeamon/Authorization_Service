<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'user_id','access_token'
    ];
  #  use HasFactory;
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
