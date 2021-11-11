<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    protected $fillable=['track_id','latitude','longitude','accuracy','speed','time_stamps'];

}
