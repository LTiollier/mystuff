<?php

namespace App\Repositories;

use App\Models\Folder;

class FolderRepository
{
    /**
     * @param Folder $folder
     */
    public function __construct(private Folder $folder)
    {
    }

    public function getRootFolders()
    {
        return $this->folder->whereNull('folder_id')
            ->get();
    }
}
