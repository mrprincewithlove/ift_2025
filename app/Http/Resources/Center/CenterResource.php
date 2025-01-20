<?php

namespace App\Http\Resources\Center;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterResource extends JsonResource
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
            'name' => $this->{'name_'.app()->currentLocale()},
            'image' => url($this->image),
            'slug' => $this->slug,
            'mobile_image' => url($this->mobile_image),
        ];
    }
}
