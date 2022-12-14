<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class WorkShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            "id" => $this->resource->id,
            "start" => $this->start,
            "end" => $this->end,
            "event_id" => $this->event_id,
            "name" => $this->name,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
