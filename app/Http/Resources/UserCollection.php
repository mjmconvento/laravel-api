<?php

namespace App\Http\Resources;

use App\Constants\StatusCode;
use App\Constants\StatusMessage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => parent::toArray($request),
            'status' => StatusCode::SUCCESS,
            'message' => StatusMessage::SUCCESS
        ];
    }
}
