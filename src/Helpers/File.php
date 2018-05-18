<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 18.05.18
 * Time: 11:27
 */

namespace App\Helpers;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class File
{
    /**
     * @const
     */
    const BLOG_DIRECTORY = 'blog';

    public static function uploadFile(UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();
        echo '<pre>';
        print_r($file->move('../public/uploads', $file->getClientOriginalName()));
        die();
        echo '<pre>';
        print_r('test');
        die();
    }

}