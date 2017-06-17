<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Colorize extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        foreach ($options as $value) {
            if ($this->notInRange($value, 0, 100)) {
                return $this->image;
            }
        }
        
        $this->image->colorize($options[0] ?: 0, $options[1] ?: 0, $options[2] ?: 0);
        
        return $this->image;
    }
}