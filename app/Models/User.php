<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Submission;
use App\Models\User;
use App\Models\Wallet;
use App\Models\ContestEntry;
use App\Models\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'other_name',
        'gender',
        'address',
        'country',
        'state',
        'email',
        'phone',
        'password',
        'roles',
        'last_login',
        'invite',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function submission()
    {
        return $this->hasOne(Submission::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    /**
     * Get the contest entries for the user.
     */
    public function contestEntries()
    {
        return $this->hasMany(ContestEntry::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id');
    }

}
