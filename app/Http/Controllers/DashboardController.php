<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolderResource;
use App\Http\Resources\ProductResource;
use App\Models\Folder;
use App\Models\Product;
use App\Repositories\FolderRepository;
use App\Repositories\ProductRepository;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * @var FolderRepository
     */
    private $folderRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @param FolderRepository $folderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(
        FolderRepository $folderRepository,
        ProductRepository $productRepository
    ) {
        $this->folderRepository = $folderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param Folder|null $folder
     * @return \Inertia\Response
     */
    public function index(Folder $folder = null) {
        $folders = $folder ? $folder->folders : $this->folderRepository->getRootFolders();
        $products = $folder ? $folder->products : $this->productRepository->getRootProducts();

        return Inertia::render('Dashboard', [
            'folders' => FolderResource::collection($folders),
            'products' => ProductResource::collection($products),
            'status' => formatForSelect(Product::STATUS_LABELS),
        ]);
    }
}
