<?php

namespace App\Http\Resources\Tariff;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TariffResource extends JsonResource
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
            'text' => $this->{'text_'.app()->currentLocale()},
            'with_trainer' => $this->type,
            'price' => $this->price,
            'month' => $this->days_in_month,
            'week' => $this->days_in_week,
        ];
    }
}
