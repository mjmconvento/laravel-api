<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request):array
    {
        return parent::toArray($request);
    }

    public function with($request): array
    {
        return [
            'status' => $request['status'],
            'message' => $request['message'],
        ];
    }
}
