<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'url' => $this->resource->url,
            'url_parcel_tracking' => $this->resource->url_parcel_tracking,
            'status' => $this->resource->status,
            'status_label' => Product::STATUS_LABELS[$this->resource->status],
        ];
    }
}
