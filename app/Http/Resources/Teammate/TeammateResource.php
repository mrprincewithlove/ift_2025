<?php

namespace App\Http\Resources\Teammate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeammateResource extends JsonResource
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
            'center_id' => $this->center_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'fatherName' => $this->fatherName,
            'job' => $this->{'job_'.app()->currentLocale()},
            'text' => $this->{'text_'.app()->currentLocale()},
            'fatherName' => $this->fatherName,
            'image' => url($this->image),
            'position' => $this->position,
        ];
    }
}
