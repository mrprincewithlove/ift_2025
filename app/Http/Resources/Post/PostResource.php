<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'center_id' => $this->cloud_center_id,
            'slug' => $this->slug,
            'name' => $this->{'name_'.app()->currentLocale()},
            'text' => $this->{'text_'.app()->currentLocale()},
            'image' => url($this->image),
            'position' => $this->position,
            'type' => $this->type
        ];
    }
}
