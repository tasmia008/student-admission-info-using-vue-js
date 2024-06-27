<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory; 
    protected $fillable = ['role', 'password', 'username', 'email'];
    public $timestamps =false ;


}
