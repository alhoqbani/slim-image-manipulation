<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Pixelate extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        if ( ! is_numeric($options[0])) {
            return $this->image;
        }
        $this->image->pixelate($options[0]);
        
        return $this->image;
    }
}