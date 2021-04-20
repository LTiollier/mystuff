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
     * @param FolderRepository $folderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(
        private FolderRepository $folderRepository,
        private ProductRepository $productRepository
    ) {
    }

    /**
     * @param Folder|null $folder
     * @return \Inertia\Response
     */
    public function index(Folder $folder = null)
    {
        $folders = $folder ? $folder->folders : $this->folderRepository->getRootFolders();
        $products = $folder ? $folder->products : $this->productRepository->getRootProducts();
        $parents = $folder ? $folder->getParents() : collect();

        return Inertia::render('Dashboard', [
            'folders' => $folders ? FolderResource::collection($folders) : [],
            'products' => $products ? ProductResource::collection($products) : [],
            'status' => formatForSelect(Product::STATUS_LABELS),
            'parents' => FolderResource::collection($parents),
        ]);
    }
}
