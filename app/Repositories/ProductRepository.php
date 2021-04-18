<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getRootProducts()
    {
        return $this->product->whereNull('folder_id')
            ->get();
    }
}
