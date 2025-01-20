<?php

namespace App\Http\Resources\Center;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllCenterResource extends JsonResource
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
            'slug' => $this->slug,
            'name' => $this->{'name_'.app()->currentLocale()},
            'text' => $this->{'text_'.app()->currentLocale()},
            'iframe' => $this->src,
            'image' => url($this->image),
            'mobile_image' => url($this->mobile_image),
            'work_time_text' => $this->{'work_time_text_'.app()->currentLocale()},
            'mobile_text' => $this->{'mobile_text_'.app()->currentLocale()},
            'activity_text' => $this->{'activity_text_'.app()->currentLocale()},
            'membership_text' => $this->{'membership_text_'.app()->currentLocale()},
            'team_text' => $this->{'team_text_'.app()->currentLocale()},
            'news_text' => $this->{'news_text_'.app()->currentLocale()},
        ];
    }
}
