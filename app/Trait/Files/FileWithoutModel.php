<?php

namespace App\Trait\Files;

use Illuminate\Support\Facades\Storage;

/**
 * FileWithoutModel Trait
 *
 * This trait provides methods for managing files that are not associated with a model.
 */
trait FileWithoutModel
{
    use ManageAllFile;

    /**
     * Upload a file to a specified path and optionally remove an old file.
     *
     * @param  mixed  $file  The file to be uploaded.
     * @param  string  $path  The path where the file should be uploaded.
     * @param  mixed  $id  The id used to generate the file name.
     * @param  string|null  $oldFile  The old file to be removed, if any.
     * @return string The name of the uploaded file.
     */
    public function uploadFile(
        mixed $file,
        string $path,
        mixed $id,
        ?string $oldFile = null
    ): string {
        $file_name = $this->generateFileName(file: $file, id: $id);
        Storage::disk(name: 'public')->putFileAs(path: $path.'/'.$id, file: $file, name: $file_name);

        $oldFile && $this->removeFile(path: $path, file: $oldFile, id: $id);

        return $file_name;
    }
}
