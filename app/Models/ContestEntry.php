<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'user_id',
        'votes_count',
        'share_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generateShareToken()
    {
        $this->share_token = bin2hex(random_bytes(32));
        $this->save();
        return $this->share_token;
    }

    public function getShareUrl()
    {
        return route('contest.vote', $this->share_token);
    }
}