<?php

namespace App\Models;

use App\Models\User;
use App\Models\RechargeTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RechargeTransaction extends Model
{

    use HasFactory;

    protected $table = 'recharge_transaction'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'user_id',
        'amount',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recharge_transaction()
    {
        return $this->belongsTo(RechargeTransaction::class);
    }
}
