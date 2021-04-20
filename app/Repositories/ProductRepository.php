<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @param Product $product
     */
    public function __construct(private Product $product)
    {
    }

    public function getRootProducts()
    {
        return $this->product->whereNull('folder_id')
            ->get();
    }
}
