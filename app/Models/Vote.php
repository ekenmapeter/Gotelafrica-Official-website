<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'contest_entry_id',
        'voter_ip',
        'voter_fingerprint'
    ];

    public function contestEntry()
    {
        return $this->belongsTo(ContestEntry::class);
    }
}