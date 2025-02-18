<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

     protected $table="referral";

    public $fillable = [
        'user_id',
        'phone',
        'email',
        'user_from',
        'status',
        'updated_at',
        'created_at',
    ];
}
