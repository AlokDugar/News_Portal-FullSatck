<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_path' => $this->image_path,
            'type_id' => $this->type_id,
            'type_name' => $this->type ? $this->type->name : null,
            'categories' => $this->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            }),
            'author' => $this->author,
            'publisher' => $this->publisher,
            'published_date' => $this->published_date ? $this->published_date:null,
            'content' => $this->content,
            'state' => $this->state,
        ];
    }
}
