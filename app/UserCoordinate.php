<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCoordinate extends Model
{
    protected $table = 'user_coordinates';

    protected $fillable=['track_id','user_id','latitude','longitude'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function onlineTrack()
    {
        return $this->belongsTo(UserOnlineTrack::class);
    }
}
