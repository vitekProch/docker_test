<?php

namespace App\EasyAdmin\Fields;

use Symfony\Component\HttpKernel\KernelInterface;

class ImageUploadHelper
{
    private KernelInterface $appKernel;

    public function __construct(KernelInterface $appKernel)
    {
        $this->appKernel = $appKernel;
    }

    public function generateUniqueFileName(string $currentFileName): string
    {
        $fileSplit = explode('.', $currentFileName);
        return $fileSplit[0] . '-' . md5(microtime())  . '.' . end($fileSplit);
    }

    public function deletePhotoFromDirectory(string $reviewToRemovePath): void
    {
        $deleteImgPath = $this->appKernel->getProjectDir() .
            '/public' . $reviewToRemovePath;
        if (file_exists($deleteImgPath)) {
            unlink($deleteImgPath);
        }
    }

    public function upload($file, $uniqueImageName, $uploadDirectory): void
    {
        $file->move($uploadDirectory, $uniqueImageName);
    }
}
