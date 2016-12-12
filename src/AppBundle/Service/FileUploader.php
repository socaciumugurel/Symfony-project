<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/5/2016
 * Time: 4:32 PM
 */

namespace AppBundle\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function uploadFile(UploadedFile $file)
    {
        $fileName = md5(uniqid()) . "." . $file->guessExtension();

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }
}