<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 18.05.18
 * Time: 11:27
 */

namespace App\Helpers;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class File
 * @package App\Helpers
 */
class File
{
    /**
     * Upload file
     *
     * @param UploadedFile $file
     * @return null|string
     */
    public static function uploadFile(UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();
        $file->move('../public/uploads', $filename);

        return $filename;
    }
}