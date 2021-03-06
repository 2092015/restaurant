<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Item extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'photo_url' => '/storage/items/'.$this->photo_url,
            'price' => $this->price,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
