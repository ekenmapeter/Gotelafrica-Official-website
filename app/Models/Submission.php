<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'full_name',
        'phone',
        'email',
        'description',
        'payment_proof'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}