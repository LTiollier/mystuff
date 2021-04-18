<?php

namespace App\Repositories;

use App\Models\Folder;

class FolderRepository
{
    /**
     * @var Folder
     */
    private $folder;

    /**
     * @param Folder $folder
     */
    public function __construct(Folder $folder)
    {
        $this->folder = $folder;
    }

    public function getRootFolders()
    {
        return $this->folder->whereNull('folder_id')
            ->get();
    }
}
