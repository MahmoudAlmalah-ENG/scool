<?php

namespace App\Trait\Files;

use Illuminate\Support\Facades\Storage;

/**
 * ManageAllFile Trait
 *
 * This trait provides methods for managing all types of files.
 */
trait ManageAllFile
{
    /**
     * Remove a file from a specified path.
     *
     * @param  string  $path  The path where the file is located.
     * @param  string  $file  The name of the file to be removed.
     */
    public function removeFile(
        string $path,
        string $file,
        string $id
    ): void {
        $fullPath = $path.$id.'/'.$file;
        Storage::disk(name: 'public')->delete(paths: $fullPath);
        if (file_exists(filename: $fullPath)) {
            unlink(filename: $fullPath);
        }
    }

    /**
     * Remove multiple files from a specified path.
     *
     * @param  string  $path  The path where the files are located.
     * @param  array  $files  An array of file names to be removed.
     */
    public function removeFiles(
        string $path,
        array $files,
        string $id
    ): void {
        array_map(callback: static fn ($file) => $this->removeFile(path: $path, file: $file, id: $id), array: $files);
    }

    /**
     * Generate a unique file name using a provided id and the original file's extension.
     *
     * @param  mixed  $file  The original file.
     * @param  mixed  $id  The id used to generate the file name.
     * @return string The generated file name.
     */
    private function generateFileName(
        mixed $file,
        mixed $id
    ): string {
        return uniqid(prefix: 'Image-', more_entropy: true).'_'.$id.'.'.$file->getClientOriginalExtension();
    }
}
