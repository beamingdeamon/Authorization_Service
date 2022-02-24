<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id','first_name','last_name','role_id'
    ];
  #  use HasFactory;
    public $timestamps = false;

    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }

    public function role(){
      return $this->belongsTo(Role::class, 'role_id');
    }

}
