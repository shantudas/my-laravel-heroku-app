<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerInfo extends Model
{
    protected $table = 'workers_info';

    protected $fillable=['type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
