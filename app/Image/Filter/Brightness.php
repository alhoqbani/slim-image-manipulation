<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Brightness extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        $value = $options[0];
        
        if ($this->notInRange($value, -100, 100)) {
            return $this->image;
        }
        $this->image->brightness($options[0]);
        
        return $this->image;
    }
}