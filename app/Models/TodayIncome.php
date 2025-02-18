<?php

namespace App\Models;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodayIncome extends Model
{

    use HasFactory;

    protected $table = 'today_income'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'user_id',
        'amount',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wallet()
        {
            return $this->belongsTo(Wallet::class);
        }
}
