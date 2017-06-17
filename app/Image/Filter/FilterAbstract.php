<?php

namespace App\Image\Filter;

use Intervention\Image\Image;

abstract class FilterAbstract
{
    
    /**
     * @var \Intervention\Image\Image
     */
    protected $image;
    
    /**
     * FilterAbstract constructor.
     *
     * @param \Intervention\Image\Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }
    
    protected function notInRange($value, $min, $max)
    {
        if ( ! is_numeric($value)) {
            return false;
        }
        
        return ($value < $min || $value > $max);
    }
    
}