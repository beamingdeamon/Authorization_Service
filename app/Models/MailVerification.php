<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailVerification extends Model
{
    protected $fillable = [
        'user_id','verified'
    ];
  #  use HasFactory;
    public $timestamps = false;
}
