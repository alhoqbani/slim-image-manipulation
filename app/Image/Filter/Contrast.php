<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Contrast extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        if ($this->notInRange($options[0], -100, 100)) {
            return $this->image;
        }
        $this->image->contrast($options[0]);
        
        return $this->image;
    }
}