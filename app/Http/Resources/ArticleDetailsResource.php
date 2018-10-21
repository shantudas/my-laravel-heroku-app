<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'published_at' => (String)$this->created_at,
            'published_by' => $this->user->name,
            'avg_rating' => $this->ratings->avg('rating'),
            'ratings' => ArticleWithRating::collection($this->ratings)
        ];
    }
}
