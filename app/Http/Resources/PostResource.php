<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Ramsey\Collection\Collection;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->description, 
            'status' => $this->status,
            'created_at' => $this->created_at,
            'category' => new CategoryResource($this->whenLoaded('category')),
            
            'author' => new UserResource($this->whenLoaded('user')),
            'images' => ImageResource::collection($this->whenLoaded('images'))
        ];
    }
}
