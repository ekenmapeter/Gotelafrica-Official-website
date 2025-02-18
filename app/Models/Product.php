<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;

    protected $table = 'product'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'name',
        'description',
        'price',
        'daily_income',
        'validity_period',
        'total_income',
        'business_value',
        'status',
        'image',
    ];


}
