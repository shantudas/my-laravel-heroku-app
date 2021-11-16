<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOnlineTrack extends Model
{
    protected $table = 'user_online_tracks';

    protected $fillable=['user_id','online_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
