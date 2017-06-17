<?php

namespace App\Image;

use Intervention\Image\ImageManager;

class Manipulator
{
    
    /**
     * @var \Intervention\Image\ImageManager
     */
    protected $manger;
    
    /**
     * @var \Intervention\Image\Image
     */
    protected $image;
    
    /**
     * Manipulator constructor.
     *
     * @param \Intervention\Image\ImageManager $manger
     */
    public function __construct(ImageManager $manger)
    {
        $this->manger = $manger;
    }
    
    public function load($file)
    {
        $this->image = $this->manger->make($file);
        
        return $this;
    }
    
    public function stream()
    {
        return $this->image->stream();
    }
    
    
}