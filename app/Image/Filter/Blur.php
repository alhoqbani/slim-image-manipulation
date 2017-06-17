<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Blur extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        if ($this->notInRange($options[0], 0, 100)) {
            return $this->image;
        }
        $this->image->blur($options[0]);
        
        return $this->image;
    }
}