<?php

namespace App\Models;


use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTransaction extends Model
{

    use HasFactory;

    protected $table = 'product_transaction'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'product_id',
        'price',
        'daily_income',
        'validity_period',
        'total_income',
        'business_value',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function referral()
{
    return $this->belongsTo(Referral::class, 'user_id', 'user_from');
}

}
