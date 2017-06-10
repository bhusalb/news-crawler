<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;

use Intervention\Image\ImageManagerStatic as Image;

class RemoveWatermark
{

    public function __construct($path)
    {
        $this->path = storage_app_path($path);

        $this->image = Image::make($this->path);
    }

    public function getCustomHeight()
    {
        return (int)($this->image->height() * 0.91);
    }

    public function crop()
    {
        $this->image->crop($this->image->width(), $this->getCustomHeight(), 0, 0);

        return $this;
    }

    public function save($path = null)
    {
        if (!$path)
            $path = $this->path;
        
        $this->image->save($path);
    }

}