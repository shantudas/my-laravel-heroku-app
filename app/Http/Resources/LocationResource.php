<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'data';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'track_id'=> $this->track_id,
            'latitude'=> $this->latitude,
            'longitude'=> $this->longitude,
            'accuracy'=> $this->accuracy,
            'speed'=> $this->speed,
            'time_stamps'=> $this->time_stamps,
        ];
    }
}
