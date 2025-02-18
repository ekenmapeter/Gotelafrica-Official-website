<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'user_id',
        'name',
        'bankname',
        'bankno',
        'phone',
        'withdrawpassword',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
