<?php namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Blur implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // resize the image to a height of 1080 and constrain aspect ratio (auto width)
        // prevent possible upsizing
        return $image->resize(1440, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->blur(12);

    }
}
