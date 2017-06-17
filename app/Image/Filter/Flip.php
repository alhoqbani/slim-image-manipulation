<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Flip extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        $this->image->flip($options[0]);
        
        return $this->image;
    }
}