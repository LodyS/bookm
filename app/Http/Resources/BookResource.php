<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'isbn'=>$this->isbn,
            'title'=>$this->title,
            'description'=>$this->description,
            'published_year'=>$this->published_year,
            'author'=>$this->authors->map(fn($author)=>[
                'id'=>$author->id,
                'name'=>$author->name,
                'surname'=>$author->surname
            ]),
            'review'=>[
                'avg'=>round($this->reviews->avg('review'), 2) ?? 0,
                'count'=>$this->reviews->count() ?? 0,
            ],
        ];
    }
}
