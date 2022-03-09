<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','verified'
    ];
    
    public function mailVerification(){
      return $this->belongsTo(User::class, 'user_id');
    }
    
    public $timestamps = false;
}
